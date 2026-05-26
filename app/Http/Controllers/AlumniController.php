<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\Course;
use App\Http\Requests\AlumniRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Support\MediaStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.alumni.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'alumnis' => Alumni::query()
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }
    
    public function create()
    {
        return view('admin.alumni.create', [
            'courses' => Course::all()
        ]);
    }

    public function store(AlumniRequest $request)
    {
        DB::transaction(function () use ($request) {
            $alumni = Alumni::create([
                'student_full_name' => $request->student_full_name,
                'slug' => str($request->student_full_name)->slug('-')->__toString(),
                'year' => $request->year,
                'summary' => $request->summary,
                'course_id' => $request->course_id,
                // 'user_id' => auth()->guard('website')->user()->id
            ]);

            // Add Possible Avatar Image
            if(isset($request->avatar)){

                $fileAdders = $alumni
                    ->addMultipleMediaFromRequest(['featured_image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_image');
                    });
            }

            // Add Possible Documets
            if(isset($request->documents)){

                $fileAdders = $alumni
                    ->addMultipleMediaFromRequest(['documents'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('documents');
                    });
            }
        });

        return redirect()->route('alumnis.index')->with('notification',[
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
        $alumni = Alumni::find($id);

        $alumni = Alumni::withTrashed()->findOrFail($id);

        return view('admin.alumni.show', [
            'alumni' => [
                'id' => $alumni->id,
                'student_full_name' => $alumni->student_full_name,
                'year' => $alumni->year,
                'summary' => $alumni?->summary,
                'course_id' => $alumni?->course?->name,
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
        $alumni = Alumni::findOrFail($id);

        $alumni->delete();

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
        $alumni = Alumni::withTrashed()->findOrFail($id);

        $alumni->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $alumni = Alumni::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.alumni.lang', [
            'lang' => $request->lang,
            'courses' => Course::all(),
            'alumni' => [
                'id' => $alumni->id,
                'student_full_name' => $alumni->student_full_name,
                'year' => $alumni->year,
                'summary' => $alumni?->summary,
                'course_id' => $alumni?->course_id,
                'featured_image' => collect($alumni->getMedia('featured_image')),
                'documents' => collect($alumni->getMedia('documents')),
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
            $alumni = Alumni::findOrFail($id);

            $alumni->setTranslation('summary', strtolower($request->lang), $request->summary);

            $alumni->student_full_name = $request->student_full_name;
            $alumni->year = $request->year;
            $alumni->course_id = $request->course_id;

            $alumni->save();


            // Add Possible Featured Image
            if(isset($request->featured_image)){

                $fileAdders = $alumni
                    ->addMultipleMediaFromRequest(['featured_image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_image');
                    });
            }

            // Add Possible Documets
            if(isset($request->documents)){

                $fileAdders = $alumni
                    ->addMultipleMediaFromRequest(['documents'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('documents');
                    });
            }
        });

        return redirect()->route('alumnis.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }

    public function downloadallattachments()
    {
        // Get all Media
        $attachments = Alumni::findOrFail(request()->model_id)->getMedia('documents');

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

