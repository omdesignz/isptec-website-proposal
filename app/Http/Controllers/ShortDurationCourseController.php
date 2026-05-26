<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortDurationCourse;
use App\Models\Department;
use App\Models\Employee;
use App\Http\Requests\ShortDurationCourseRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Support\MediaStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class ShortDurationCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.shortdurationcourse.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'courses' => ShortDurationCourse::with('department', 'employee')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.shortdurationcourse.create', [
            'departments' => Department::all(),
            'employees' => Employee::all(),
        ]);
    }

    public function store(ShortDurationCourseRequest $request)
    {
        DB::transaction(function () use ($request) {
            $course = ShortDurationCourse::create([
                'name' => $request->name,
                'slug' => str($request->name)->slug('-')->__toString(),
                'description' => $request->description,
                'department_id' => $request->department_id,
                'employee_id' => $request->employee_id,
                'external_employee' => $request->external_employee,
                'status' => $request->status ?? true,
                // 'user_id' => auth()->guard('website')->user()->id
            ]);

            // Add Possible Featured Image
            if(isset($request->featured_image)){

                $fileAdders = $course
                    ->addMultipleMediaFromRequest(['featured_image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_image');
                    });
            }

            // Add Possible Documets
            if(isset($request->documents)){

                $fileAdders = $course
                    ->addMultipleMediaFromRequest(['documents'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('documents');
                    });
            }
        });

        return redirect()->route('shortdurationcourses.index')->with('notification',[
            'title' => 'Cadastramento de Item',
            'time' => now()->diffForHumans(),
            'message' => 'Item cadastrado com êxito.'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param $id
     */
    public function show(Request $request, $id)
    {
        $course = ShortDurationCourse::withTrashed()->findOrFail($id);

        return view('admin.shortdurationcourse.show', [
            'course' => [
                'id' => $course->id,
                'name' => $course->name,
                'description' => $course->description,
                'external_employee' => $course->external_employee,
                'employee_id' => $course->employee?->full_name,
                'department_id' => $course->department?->name,
                'status' => $course->status,
            ],
        ]);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function destroy(Request $request, $id)
    {
        $course = ShortDurationCourse::findOrFail($id);

        $course->delete();

        return back()->with('notification',[
            'title' => 'Remoção de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo removido com êxito.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function restore(Request $request, $id)
    {
        $course = ShortDurationCourse::withTrashed()->findOrFail($id);

        $course->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $course = ShortDurationCourse::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.shortdurationcourse.lang', [
            'lang' => $request->lang,
            'departments' => Department::all(),
            'employees' => Employee::all(),
            'course' => [
                'id' => $course->id,
                'name' => $course->name,
                'description' => $course->description,
                'status' => $course->status,
                'department_id' => $course->department_id,
                'employee_id' => $course->employee_id,
                'external_employee' => $course->external_employee,
                'featured_image' => collect($course->getMedia('featured_image')),
                'documents' => collect($course->getMedia('documents')),
            ],
        ]);
    }

    /**
     * Set the specified resource translation.
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function settranslation(Request $request, $id)
    {

        DB::transaction(function () use ($request, $id) {
            $course = ShortDurationCourse::findOrFail($id);

            $course->setTranslation('name', strtolower($request->lang), $request->name);
            $course->setTranslation('description', strtolower($request->lang), $request->description);

            $course->employee_id = $request->employee_id;
            $course->department_id = $request->department_id;
            $course->external_employee = $request->external_employee;
            $course->status = $request->status ?? false;

            $course->save();


            // Add Possible Featured Image
            if(isset($request->featured_image)){

                $fileAdders = $course
                    ->addMultipleMediaFromRequest(['featured_image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_image');
                    });
            }

            // Add Possible Documets
            if(isset($request->documents)){

                $fileAdders = $course
                    ->addMultipleMediaFromRequest(['documents'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('documents');
                    });
            }
        });

        return redirect()->route('shortdurationcourses.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }

    public function downloadallattachments()
    {
        // Get all Media
        $attachments = ShortDurationCourse::findOrFail(request()->model_id)->getMedia('attachments');

        return MediaStream::create('attachments.zip')->addMedia($attachments);
    }

    public function downloadsingleattachment()
    {
        return Media::findOrFail(request()->model_id);
    }

    public function deletesingleattachment(Request $request)
    {
        $media = Media::findOrFail(request()->model_id);

        $media->delete();

        return back()->with('notification',[
            'title' => 'Remoção de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo removido com êxito.'
        ]);
    }
}
