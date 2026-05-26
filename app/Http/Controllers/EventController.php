<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventSpeaker;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Support\MediaStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.event.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'events' => Event::query()
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEventRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function store(EventRequest $request)
    {
        DB::transaction(function () use ($request) {
            $event = Event::create([
                'title' => $request->title,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'link' => $request->link,
                'color' => $request->color ?? null,
                'description' => $request->description,
                'venue' => $request->venue,
                // 'start_time' => $request->start_time,
                // 'end_time' => $request->end_time,
                'status' => $request->status ?? true,
                'slug' => str($request->title)->slug('-')->__toString(),
                'user_id' => 1
            ]);


            // Add Possible Featured Image
            if(isset($request->featured_image)){

                $fileAdders = $event
                    ->addMultipleMediaFromRequest(['featured_image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_image');
                    });
            }

            // Add Possible Documets
            if(isset($request->documents)){

                $fileAdders = $event
                    ->addMultipleMediaFromRequest(['documents'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('documents');
                    });
            }

            // Add Possible Speakers
            if(isset($request->speaker)) {
                foreach($request->speaker as $sp) {
                    $data = EventSpeaker::create(
                        [
                            'full_name' => $sp['full_name'],
                            'topic' => $sp['topic'],
                            'contact' => $sp['contact'],
                            'bio' => $sp['bio'],
                            'event_id' => $event->id
                        ]
                    );

                    // Add Possible Avatar Image
                    if(isset($sp['avatar'])){
                        $data->addMedia($sp['avatar'])
                        ->toMediaCollection('avatar');
                    }
                }
            }
        });

        return redirect()->route('events.index')->with('notification',[
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
    public function settranslation(EventRequest $request, $id)
    {

        DB::transaction(function () use ($request, $id) {
            $event = Event::findOrFail($id);

            $event->setTranslation('title', strtolower($request->lang), $request->title);
            $event->setTranslation('description', strtolower($request->lang), $request->description);
            $event->setTranslation('venue', strtolower($request->lang), $request->venue);
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->color = $request->color ?? null;
            // $event->start_time = $request->start_time;
            // $event->end_time = $request->end_time;
            $event->link = $request->link;
            $event->status = $request->status ?? true;

            $event->save();


            // Add Possible Featured Image
            if(isset($request->featured_image)){

                $fileAdders = $event
                    ->addMultipleMediaFromRequest(['featured_image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_image');
                    });
            }

            // Add Possible Documets
            if(isset($request->documents)){

                $fileAdders = $event
                    ->addMultipleMediaFromRequest(['documents'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('documents');
                    });
            }

            // Add Possible Speakers
            if(isset($request->speaker)) {

                // dd(collect($request->speaker)->pluck('id')->toArray());

                EventSpeaker::whereNotIn('id', collect($request->speaker)->pluck('id')->toArray())->whereEventId($event->id)->forcedelete();

                foreach($request->speaker as $sp) {

                    // $data = EventSpeaker::updateOrCreate(
                    //     ['id' =>  $sp['id']],
                    //     ['full_name' => $sp['full_name']],
                    //     ['topic' => $sp['topic']],
                    //     ['contact' => $sp['contact']],
                    //     ['bio' => $sp['bio']],
                    //     ['event_id' => $event->id]
                    // );

                    // EventSpeaker::whereEventId()->forcedelete($event->id);

                    if(isset($sp['id']))
                    {
                        $data = EventSpeaker::findOrFail($sp['id']);

                        $data->update([
                            'full_name' => $sp['full_name'],
                            'topic' => $sp['topic'],
                            'contact' => $sp['contact'],
                            'bio' => $sp['bio'],
                            'event_id' => $event->id
                        ]);

                    } else {
                        
                        $data = EventSpeaker::create(
                            [
                                'full_name' => $sp['full_name'],
                                'topic' => $sp['topic'],
                                'contact' => $sp['contact'],
                                'bio' => $sp['bio'],
                                'event_id' => $event->id
                            ]
                        );
                    }
                        

                        // Add Possible Avatar Image
                        if(isset($sp['avatar'])){
                            $data->addMedia($sp['avatar'])
                            ->toMediaCollection('avatar');
                        }
                }
            }
        });

        return redirect()->route('events.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $event = Event::withTrashed()->findOrFail($id)->setLocale($request->lang);

        // dd($event->published_at?->toDateTimeLocalString());

        // dd($event->speakers->map(function($item) {
        //     return [
        //         'id' => $item->id,
        //         'full_name' => $item->full_name,
        //         'contact' => $item->contact,
        //         'bio' => $item->bio,
        //         'topic' => $item->topic,
        //         'avatar' => $item?->getMedia('avatar')?->first()?->getUrl(),
        //     ];}));

        return view('admin.event.lang', [
            'lang' => $request->lang,
            'event' => [
                'id' => $event->id,
                'title' => $event->title,
                'description' => $event->description,
                'start_date' => $event->start_date?->toDateTimeLocalString(),
                'end_date' => $event->end_date?->toDateTimeLocalString(),
                // 'start_time' => $event->start_time,
                // 'end_time' => $event->end_time,
                'venue' => $event->venue,
                'speakers' => $event->speakers->map(function($item) {
                    return [
                        'id' => $item->id,
                        'full_name' => $item->full_name,
                        'contact' => $item->contact,
                        'bio' => $item->bio,
                        'topic' => $item->topic,
                        'avatar' => $item?->getMedia('avatar')?->first()?->getUrl(),
                    ];
                }),
                'link' => $event->link,
                'status' => $event->status,
                'featured_image' => collect($event->getMedia('featured_image')),
                'documents' => collect($event->getMedia('documents')),

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
        $event = Event::findOrFail($id);

        $event->delete();

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
        $event = Event::withTrashed()->findOrFail($id);

        $event->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function downloadallattachments()
    {
        // Get all Media
        $attachments = Event::findOrFail(request()->model_id)->getMedia('attachments');

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

    public function deletespeaker(Request $request)
    {
        $speaker = EventSpeaker::findOrFail(request()->model_id);

        $speaker->delete();

        return back()->with('notification',[
            'title' => 'Remoção de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo removido com êxito.'
        ]);
    }
}
