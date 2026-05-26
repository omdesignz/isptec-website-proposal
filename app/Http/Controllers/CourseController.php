<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\Department;
use Spatie\MediaLibrary\Support\MediaStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CourseRequest;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.course.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'courses' => Course::with('category', 'department')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }
    
    public function create()
    {
        return view('admin.course.create', [
            'categories' => CourseCategory::all(),
            'departments' => Department::all(),
        ]);
    }

    public function store(CourseRequest $request)
    {
        DB::transaction(function () use ($request) {
            $course = Course::create([
                'name' => $request->name,
                'slug' => str($request->name)->slug('-')->__toString(),
                'description' => $request->description,
                'duration' => $request->duration,
                'status' => $request->status ?? true,
                'start_date' => $request->start_date,
                'department_id' => $request->department_id,
                'category_id' => $request->category_id,
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

        return redirect()->route('courses.index')->with('notification',[
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
        $course = Course::find($id);

        $course = Course::with('category', 'department')->withTrashed()->findOrFail($id);

        return view('admin.course.show', [
            'course' => [
                'id' => $course->id,
                'name' => $course->name,
                'description' => $course->description,
                'duration' => $course->duration,
                'status' => $course->status,
                'start_date' => $course->start_date,
                'department' => $course?->department?->name,
                'category' => $course?->category?->name,
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
        $course = Course::findOrFail($id);

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
        $course = Course::withTrashed()->findOrFail($id);

        $course->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $course = Course::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.course.lang', [
            'lang' => $request->lang,
            'categories' => CourseCategory::all(),
            'departments' => Department::all(),
            'course' => [
                'id' => $course->id,
                'name' => $course->name,
                'description' => $course->description,
                'duration' => $course->duration,
                'status' => $course->status,
                'start_date' => $course->start_date,
                'department_id' => $course?->department_id,
                'category_id' => $course?->category_id,
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
            $course = Course::findOrFail($id);

            $course->category_id = $request->category_id;
            $course->department_id = $request->department_id;
            $course->start_date = $request->start_date;

            $course->setTranslation('name', strtolower($request->lang), $request->name);
            $course->setTranslation('description', strtolower($request->lang), $request->description);
            $course->setTranslation('duration', strtolower($request->lang), $request->duration);

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

        return redirect()->route('courses.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }

    public function downloadallattachments()
    {
        // Get all Media
        $attachments = Course::findOrFail(request()->model_id)->getMedia('attachments');

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
