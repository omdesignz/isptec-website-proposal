<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partnership;
use App\Models\PartnershipCategory;
use App\Http\Requests\PartnershipRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Support\MediaStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class PartnershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.partnership.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'partnerships' => Partnership::with('category')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.partnership.create', [
            'categories' => PartnershipCategory::all()
        ]);
    }

    public function store(PartnershipRequest $request)
    {
        DB::transaction(function () use ($request) {
            $partnership = Partnership::create([
                'name' => $request->name,
                'slug' => str($request->name)->slug('-')->__toString(),
                'description' => $request->description,
                'link' => $request->link,
                'category_id' => $request->category->id
                // 'user_id' => auth()->guard('website')->user()->id
            ]);

            // Add Possible Featured Image
            if(isset($request->featured_image)){

                $fileAdders = $partnership
                    ->addMultipleMediaFromRequest(['featured_image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_image');
                    });
            }

            // Add Possible Documets
            if(isset($request->documents)){

                $fileAdders = $partnership
                    ->addMultipleMediaFromRequest(['documents'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('documents');
                    });
            }
        });

        return redirect()->route('partnership.index')->with('notification',[
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
        $partnership = Partnership::withTrashed()->findOrFail($id);

        return view('admin.partnership.show', [
            'partnership' => [
                'id' => $partnership->id,
                'name' => $partnership->name,
                'description' => $partnership->description,
                'link' => $partnership->link,
                'category_id' => $partnership?->category?->name,
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
        $partnership = Partnership::findOrFail($id);

        $partnership->delete();

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
        $partnership = Partnership::withTrashed()->findOrFail($id);

        $partnership->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $partnership = Partnership::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.partnership.lang', [
            'lang' => $request->lang,
            'categories' => PartnershipCategory::all(),
            'partnership' => [
                'id' => $partnership->id,
                'name' => $partnership->name,
                'description' => $partnership->description,
                'link' => $partnership->link,
                'category_id' => $partnership->category_id,
                'featured_image' => collect($partnership->getMedia('featured_image')),
                'documents' => collect($partnership->getMedia('documents')),
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
            $partnership = Partnership::findOrFail($id);

            $partnership->setTranslation('name', strtolower($request->lang), $request->name);
            $partnership->setTranslation('description', strtolower($request->lang), $request->description);

            $partnership->link = $request->link;
            $partnership->category_id = $request->category_id;

            $partnership->save();


            // Add Possible Featured Image
            if(isset($request->featured_image)){

                $fileAdders = $partnership
                    ->addMultipleMediaFromRequest(['featured_image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_image');
                    });
            }

            // Add Possible Documets
            if(isset($request->documents)){

                $fileAdders = $partnership
                    ->addMultipleMediaFromRequest(['documents'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('documents');
                    });
            }
        });

        return redirect()->route('partnerships.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }

    public function downloadallattachments()
    {
        // Get all Media
        $attachments = Partnership::findOrFail(request()->model_id)->getMedia('attachments');

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
