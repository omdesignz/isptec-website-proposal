<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecruitmentPublication;
use App\Models\RecruitmentCategory;
use App\Http\Requests\RecruitmentPublicationRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Support\MediaStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class RecruitmentPublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.recruitmentpublication.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'publications' => RecruitmentPublication::with('category')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.recruitmentpublication.create', [
            'categories' => RecruitmentCategory::all()
        ]);
    }

    public function store(RecruitmentPublicationRequest $request)
    {
        DB::transaction(function () use ($request) {
            $publication = RecruitmentPublication::create([
                'title' => $request->title,
                'slug' => str($request->title)->slug('-')->__toString(),
                'description' => $request->description,
                'requirements' => $request->requirements,
                'status' => $request->status ?? true,
                'category_id' => $request->category_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                // 'user_id' => auth()->guard('website')->user()->id
            ]);

            // Add Possible Featured Image
            if(isset($request->featured_image)){

                $fileAdders = $publication
                    ->addMultipleMediaFromRequest(['featured_image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_image');
                    });
            }

            // Add Possible Documets
            if(isset($request->documents)){

                $fileAdders = $publication
                    ->addMultipleMediaFromRequest(['documents'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('documents');
                    });
            }
        });

        return redirect()->route('recruitmentpublications.index')->with('notification',[
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
        $publication = RecruitmentPublication::withTrashed()->findOrFail($id);

        return view('admin.recruitmentpublication.show', [
            'publication' => [
                'id' => $publication->id,
                'title' => $publication->title,
                'description' => $publication->description,
                'requirements' => $publication->requirements,
                'status' => $publication->status,
                'category_id' => $publication?->category?->name,
                'start_date' => $publication->start_date,
                'end_date' => $publication->end_date,
                'start_time' => $publication->start_time,
                'end_time' => $publication->end_time,
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
        $publication = RecruitmentPublication::findOrFail($id);

        $publication->delete();

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
        $publication = RecruitmentPublication::withTrashed()->findOrFail($id);

        $publication->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $publication = RecruitmentPublication::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.recruitmentpublication.lang', [
            'lang' => $request->lang,
            'categories' => RecruitmentCategory::all(),
            'publication' => [
                'id' => $publication->id,
                'title' => $publication->title,
                'description' => $publication->description,
                'requirements' => $publication->requirements,
                'status' => $publication->status ?? false,
                'start_date' => $publication->start_date,
                'end_date' => $publication->end_date,
                'start_time' => $publication->start_time,
                'end_time' => $publication->end_time,
                'category_id' => $publication->category_id,
                'featured_image' => collect($publication->getMedia('featured_image')),
                'documents' => collect($publication->getMedia('documents')),
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
            $publication = RecruitmentPublication::findOrFail($id);

            $publication->setTranslation('title', strtolower($request->lang), $request->title);
            $publication->setTranslation('description', strtolower($request->lang), $request->description);
            $publication->setTranslation('requirements', strtolower($request->lang), $request->requirements);

            $publication->status = $request->status ?? false;
            $publication->start_date = $request->start_date;
            $publication->end_date = $request->end_date;
            $publication->start_time = $request->start_time;
            $publication->end_time = $request->end_time;
            $publication->category_id = $request->category_id;

            $publication->save();


            // Add Possible Featured Image
            if(isset($request->featured_image)){

                $fileAdders = $publication
                    ->addMultipleMediaFromRequest(['featured_image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_image');
                    });
            }

            // Add Possible Documets
            if(isset($request->documents)){

                $fileAdders = $publication
                    ->addMultipleMediaFromRequest(['documents'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('documents');
                    });
            }
        });

        return redirect()->route('recruitmentpublications.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }

    public function downloadallattachments()
    {
        // Get all Media
        $attachments = RecruitmentPublication::findOrFail(request()->model_id)->getMedia('attachments');

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
