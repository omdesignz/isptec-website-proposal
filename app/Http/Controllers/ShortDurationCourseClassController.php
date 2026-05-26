<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortDurationCourseClass;
use App\Models\Department;
use App\Models\Employee;
use App\Http\Requests\ShortDurationCourseClassRequest;
use App\Models\ShortDurationCourse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Support\MediaStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class ShortDurationCourseClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.shortdurationcourseclass.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'classes' => ShortDurationCourseClass::with('course')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.shortdurationcourseclass.create', [
            'courses' => ShortDurationCourse::all(),
        ]);
    }

    public function store(ShortDurationCourseClassRequest $request)
    {
        DB::transaction(function () use ($request) {
            $class = ShortDurationCourseClass::create([
                'name' => $request->name,
                'slug' => str($request->name)->slug('-')->__toString(),
                'description' => $request->description,
                'course_id' => $request->course_id,
                'total_hours' => $request->total_hours,
                'price' => $request->price,
                'registration_fee' => $request->registration_fee,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'extra_data' => $request->extra_data,
                'status' => $request->status ?? true,
                // 'user_id' => auth()->guard('website')->user()->id
            ]);

            // Add Possible Featured Image
            if(isset($request->featured_image)){

                $fileAdders = $class
                    ->addMultipleMediaFromRequest(['featured_image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_image');
                    });
            }

            // Add Possible Documets
            if(isset($request->documents)){

                $fileAdders = $class
                    ->addMultipleMediaFromRequest(['documents'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('documents');
                    });
            }
        });

        return redirect()->route('shortdurationcourseclasses.index')->with('notification',[
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
        $class = ShortDurationCourseClass::withTrashed()->findOrFail($id);

        return view('admin.shortdurationcourseclass.show', [
            'class' => [
                'id' => $class->id,
                'name' => $class->name,
                'description' => $class->description,
                'course_id' => $class?->course?->name,
                'total_hours' => $class->total_hours,
                'price' => $class->price,
                'registration_fee' => $class->registration_fee,
                'start_date' => $class->start_date,
                'end_date' => $class->end_date,
                'start_time' => $class->start_time,
                'end_time' => $class->end_time,
                'extra_data' => $class->extra_data,
                'status' => $class->status,
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
        $course = ShortDurationCourseClass::findOrFail($id);

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
        $course = ShortDurationCourseClass::withTrashed()->findOrFail($id);

        $course->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $class = ShortDurationCourseClass::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.shortdurationcourseclass.lang', [
            'lang' => $request->lang,
            'courses' => ShortDurationCourse::all(),
            'class' => [
                'id' => $class->id,
                'name' => $class->name,
                'description' => $class->description,
                'course_id' => $class->course_id,
                'total_hours' => $class->total_hours,
                'price' => $class->price,
                'registration_fee' => $class->registration_fee,
                'start_date' => $class->start_date,
                'end_date' => $class->end_date,
                'start_time' => $class->start_time,
                'end_time' => $class->end_time,
                'extra_data' => $class->extra_data,
                'status' => $class->status,
                'featured_image' => collect($class->getMedia('featured_image')),
                'documents' => collect($class->getMedia('documents')),
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
            $class = ShortDurationCourseClass::findOrFail($id);

            $class->setTranslation('name', strtolower($request->lang), $request->name);
            $class->setTranslation('description', strtolower($request->lang), $request->description);
            $class->setTranslation('extra_data', strtolower($request->lang), $request->extra_data);

            $class->course_id = $request->course_id;
            $class->total_hours = $request->total_hours;
            $class->start_date = $request->start_date;
            $class->end_date = $request->end_date;
            $class->start_time = $request->start_time;
            $class->end_time = $request->end_time;
            $class->price = $request->price;
            $class->registration_fee = $request->registration_fee;
            $class->status = $request->status ?? false;

            $class->save();


            // Add Possible Featured Image
            if(isset($request->featured_image)){

                $fileAdders = $class
                    ->addMultipleMediaFromRequest(['featured_image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_image');
                    });
            }

            // Add Possible Documets
            if(isset($request->documents)){

                $fileAdders = $class
                    ->addMultipleMediaFromRequest(['documents'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('documents');
                    });
            }
        });

        return redirect()->route('shortdurationcourseclasses.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }

    public function downloadallattachments()
    {
        // Get all Media
        $attachments = ShortDurationCourseClass::findOrFail(request()->model_id)->getMedia('attachments');

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
