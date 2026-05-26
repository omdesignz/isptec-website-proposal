<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaCategory;
use App\Models\MediaPublication;
use App\Http\Requests\MediaPublicationRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Support\MediaStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaPublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.mediapublication.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'publications' => MediaPublication::query()
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    public function create()
    {
        return view('admin.mediapublication.create', [
            'categories' => MediaCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMediaPublicationRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function store(MediaPublicationRequest $request)
    {
        DB::transaction(function () use ($request) {
            $publication = MediaPublication::create([
                'title' => $request->title,
                'summary' => $request->summary,
                'meta' => $request->meta ?? null,
                'body' => $request->body,
                'published_at' => $request->published_at,
                'featured_image_caption' => $request->featured_image_caption,
                'slug' => str($request->title)->slug('-')->__toString(),
                'user_id' => auth()->id()
            ]);

            $publication->categories()->sync($request->categories);

            // Add Possible Featured Image
            if(isset($request->featured_image)){

                $fileAdders = $publication
                    ->addMultipleMediaFromRequest(['featured_image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_image');
                    });
            }

            // Add Possible Featured Images
            if(isset($request->featured_images)){

                $fileAdders = $publication
                    ->addMultipleMediaFromRequest(['featured_images'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_images');
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

        return redirect()->route('mediapublications.index')->with('notification',[
            'title' => 'Cadastramento de Item',
            'time' => now()->diffForHumans(),
            'message' => 'Item cadastrado com êxito.'
        ]);
    }

    /**
     * Set the specified resource translation.
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function settranslation(MediaPublicationRequest $request, $id)
    {

        DB::transaction(function () use ($request, $id) {
            $publication = MediaPublication::findOrFail($id);

            $publication->setTranslation('title', strtolower($request->lang), $request->title);
            $publication->setTranslation('body', strtolower($request->lang), $request->body);
            $publication->setTranslation('summary', strtolower($request->lang), $request->summary);
            $publication->published_at = $request->published_at;
            $publication->meta = $request->meta ?? null;
            $publication->setTranslation('featured_image_caption', strtolower($request->lang), $request->featured_image_caption);

            $publication->save();

            $publication->categories()->sync($request->categories);


            // Add Possible Featured Image
            if(isset($request->featured_image)){

                $fileAdders = $publication
                    ->addMultipleMediaFromRequest(['featured_image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_image');
                    });
            }

            // Add Possible Featured Images
            if(isset($request->featured_images)){

                $fileAdders = $publication
                    ->addMultipleMediaFromRequest(['featured_images'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_images');
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

        return redirect()->route('mediapublications.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }


    public function lang(Request $request, $id)
    {
        $publication = MediaPublication::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.mediapublication.lang', [
            'lang' => $request->lang,
            'categories' => MediaCategory::all(),
            'post' => [
                'id' => $publication->id,
                'title' => $publication->title,
                'body' => $publication->body,
                'published_at' => $publication->published_at?->toDateTimeLocalString(),
                'summary' => $publication->summary,
                'meta' => $publication->meta,
                'categories' => $publication?->categories->pluck('id')->toArray(),
                'featured_image' => collect($publication->getMedia('featured_image')),
                'featured_image_caption' => $publication->featured_image_caption,
                'featured_images' => collect($publication->getMedia('featured_images')),
                'documents' => collect($publication->getMedia('documents')),

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
        $publication = MediaPublication::findOrFail($id);

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
        $publication = MediaPublication::withTrashed()->findOrFail($id);

        $publication->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function downloadallattachments()
    {
        // Get all Media
        $attachments = MediaPublication::findOrFail(request()->model_id)->getMedia('attachments');

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
