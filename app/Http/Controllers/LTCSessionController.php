<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LTCMembershipCategory;
use App\Models\LTCSession;
use App\Http\Requests\LTCSessionRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class LTCSessionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.ltcsession.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'sessions' => LTCSession::with('category')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.ltcsession.create', [
            'categories' => LTCMembershipCategory::all()
        ]);
    }

    public function store(LTCSessionRequest $request)
    {
        DB::transaction(function () use ($request) {
            $session = LTCSession::create([
                'topic' => $request->topic,
                'slug' => str($request->topic)->slug('-')->__toString(),
                'description' => $request->description,
                'venue' => $request->venue,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'category_id' => $request->category_id,
            ]);

        });

        return redirect()->route('ltcsessions.index')->with('notification',[
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
        $session = LTCSession::find($id);

        $session = LTCSession::withTrashed()->findOrFail($id);

        return view('admin.ltcsession.show', [
            'session' => [
                'id' => $session->id,
                'topic' => $session->topic,
                'description' => $session->description,
                'venue' => $session->venue,
                'start_time' => $session?->start_time?->toDateTimeLocalString(),
                'end_time' => $session?->end_time?->toDateTimeLocalString(),
                'category_id' => $session?->category?->name,
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
        $session = LTCSession::findOrFail($id);

        $session->delete();

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
        $session = LTCSession::withTrashed()->findOrFail($id);

        $session->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $session = LTCSession::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.ltcsession.lang', [
            'lang' => $request->lang,
            'categories' => LTCMembershipCategory::all(),
            'session' => [
                'id' => $session->id,
                'topic' => $session->topic,
                'description' => $session->description,
                'venue' => $session->venue,
                'start_time' => $session?->start_time?->toDateTimeLocalString(),
                'end_time' => $session?->end_time?->toDateTimeLocalString(),
                'category_id' => $session->category_id,
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
            $session = LTCSession::findOrFail($id);

            $session->setTranslation('topic', strtolower($request->lang), $request->topic);
            $session->setTranslation('description', strtolower($request->lang), $request->description);
            $session->setTranslation('venue', strtolower($request->lang), $request->venue);

            $session->start_time = $request->start_time;
            $session->end_time = $request->end_time;
            $session->category_id = $request->category_id;

            $session->save();

        });

        return redirect()->route('ltcsessions.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }
}
