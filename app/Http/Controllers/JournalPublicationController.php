<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JournalPublication;
use App\Models\JournalCategory;
use App\Http\Requests\JournalPublicationRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Support\MediaStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class JournalPublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.journalpublication.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'publications' => JournalPublication::with('category')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.journalpublication.create', [
            'categories' => JournalCategory::all()
        ]);
    }

    public function store(JournalPublicationRequest $request)
    {
        // dd($request->all());
        DB::transaction(function () use ($request) {
            $publication = JournalPublication::create([
                'title' => $request->title,
                'slug' => str($request->title)->slug('-')->__toString(),
                'summary' => $request->summary,
                'extra_data' => $request->extra_data,
                'published_at' => $request->published_at,
                'external_url' => $request->external_url,
                'journal_name' => $request->journal_name,
                'authors' => $request->authors,
                'reference' => $request->reference,
                'lecturers' => $request->lecturers,
                'category_id' => $request->category_id,
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

        return redirect()->route('journalpublications.index')->with('notification',[
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
        $publication = JournalPublication::withTrashed()->findOrFail($id);

        return view('admin.journalpublication.show', [
            'publication' => [
                'id' => $publication->id,
                'title' => $publication->title,
                'summary' => $publication->summary,
                'extra_data' => $publication->extra_data,
                'published_at' => $publication->published_at,
                'external_url' => $publication->external_url,
                'journal_name' => $publication->journal_name,
                'authors' => $publication->authors,
                'reference' => $publication->reference,
                'lecturers' => $publication->lecturers,
                'category_id' => $publication?->category?->name,
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
        $publication = JournalPublication::findOrFail($id);

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
        $publication = JournalPublication::withTrashed()->findOrFail($id);

        $publication->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $publication = JournalPublication::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.journalpublication.lang', [
            'lang' => $request->lang,
            'categories' => JournalCategory::all(),
            'publication' => [
                'id' => $publication->id,
                'title' => $publication->title,
                'summary' => $publication->summary,
                'extra_data' => $publication->extra_data,
                'published_at' => $publication->published_at,
                'external_url' => $publication->external_url,
                'journal_name' => $publication->journal_name,
                'authors' => $publication->authors,
                'reference' => $publication->reference,
                'lecturers' => $publication->lecturers,
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
            $publication = JournalPublication::findOrFail($id);

            $publication->setTranslation('title', strtolower($request->lang), $request->title);
            $publication->setTranslation('summary', strtolower($request->lang), $request->summary);
            $publication->setTranslation('extra_data', strtolower($request->lang), $request->extra_data);
            $publication->setTranslation('journal_name', strtolower($request->lang), $request->journal_name);

            $publication->published_at = $request->published_at;
            $publication->external_url = $request->external_url;
            $publication->authors = $request->authors;
            $publication->reference = $request->reference;
            $publication->lecturers = $request->lecturers;
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

        return redirect()->route('journalpublications.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }

    public function downloadallattachments()
    {
        // Get all Media
        $attachments = JournalPublication::findOrFail(request()->model_id)->getMedia('attachments');

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
