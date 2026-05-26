<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageSliderImage;
use App\Http\Requests\PageSliderRequest;
use App\Models\PageSlider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Support\MediaStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PageSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.pageslider.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'sliders' => PageSlider::with('page')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    public function create()
    {
        return view('admin.pageslider.create', [
            'pages' => Page::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePageSliderRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function store(PageSliderRequest $request)
    {
        DB::transaction(function () use ($request) {
            $slider = PageSlider::create([
                'title' => $request->title,
                'description' => $request->description,
                'height' => $request->height,
                'width' => $request->width,
                'interval' => $request->interval ?? null,
                'page_id' => $request->page_id
            ]);

            // Add Possible Images
            if(isset($request->image)) {
                foreach($request->image as $sp) {
                    $data = PageSliderImage::create(
                        [
                            'title' => $sp['title'],
                            'link' => $sp['link'],
                            'description' => $sp['description'],
                            'slider_id' => $slider->id
                        ]
                    );

                    // Add Possible Image
                    if(isset($sp['image'])){
                        $data->addMedia($sp['image'])
                        ->toMediaCollection('image');
                    }
                }
            }
        });

        return redirect()->route('pagesliders.index')->with('notification',[
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
        $slider = PageSlider::find($id);

        $slider = PageSlider::withTrashed()->findOrFail($id);

        return view('admin.pageslider.show', [
            'slider' => [
                'id' => $slider->id,
                'title' => $slider->title,
                'description' => $slider->description,
                'width' => $slider->width,
                'height' => $slider->height,
                'interval' => $slider->interval,
                'page_id' => $slider?->page?->title,
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
    public function settranslation(PageSliderRequest $request, $id)
    {

        DB::transaction(function () use ($request, $id) {
            $slider = PageSlider::findOrFail($id);

            $slider->setTranslation('title', strtolower($request->lang), $request->title);
            $slider->setTranslation('description', strtolower($request->lang), $request->description);
            $slider->height = $request->height;
            $slider->width = $request->width;
            $slider->interval = $request->interval ?? null;
            $slider->page_id = $request->page_id;

            $slider->save();

            // Add Possible Images
            if(isset($request->image)) {

                PageSliderImage::whereNotIn('id', collect($request->image)->pluck('id')->toArray())->whereSliderId($slider->id)->forcedelete();

                foreach($request->image as $sp) {

                    if(isset($sp['id']))
                    {
                        $data = PageSliderImage::findOrFail($sp['id']);

                        $data->update([
                            'title' => $sp['title'],
                            'link' => $sp['link'],
                            'description' => $sp['description'],
                            'slider_id' => $slider->id
                        ]);

                    } else {
                        
                        $data = PageSliderImage::create(
                            [
                                'title' => $sp['title'],
                                'link' => $sp['link'],
                                'description' => $sp['description'],
                                'slider_id' => $slider->id
                            ]
                        );
                    }
                        

                        // Add Possible Image
                        if(isset($sp['image'])){
                            $data->addMedia($sp['image'])
                            ->toMediaCollection('image');
                        }
                }
            }
        });

        return redirect()->route('pagesliders.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $slider = PageSlider::with('page')->withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.pageslider.lang', [
            'lang' => $request->lang,
            'pages' => Page::all(),
            'slider' => [
                'id' => $slider->id,
                'title' => $slider->title,
                'description' => $slider->description,
                'height' => $slider->height,
                'width' => $slider->width,
                'interval' => $slider->interval,
                'page_id' => $slider->page_id,
                'images' => $slider?->images?->map(function($item) {
                    return [
                        'id' => $item->id,
                        'title' => $item->title,
                        'link' => $item->link,
                        'slider_id' => $item->slider_id,
                        'description' => $item->description,
                        'image' => $item?->getMedia('image')?->first()?->getUrl(),
                    ];
                })

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
        $slider = PageSlider::findOrFail($id);

        $slider->delete();

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
        $slider = PageSlider::withTrashed()->findOrFail($id);

        $slider->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function downloadallattachments()
    {
        // Get all Media
        $attachments = PageSlider::findOrFail(request()->model_id)->getMedia('attachments');

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

    public function deleteimage(Request $request)
    {
        $image = PageSliderImage::findOrFail(request()->model_id);

        $image->delete();

        return back()->with('notification',[
            'title' => 'Remoção de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo removido com êxito.'
        ]);
    }
}
