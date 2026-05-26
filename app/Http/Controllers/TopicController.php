<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Http\Requests\TopicRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.topic.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'topics' => Topic::withCount('posts')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.topic.create');
    }

    public function store(TopicRequest $request)
    {
        DB::transaction(function () use ($request) {
            $topic = Topic::create([
                'name' => $request->name,
                'slug' => str($request->name)->slug('-')->__toString(),
                'user_id' => 1
                // 'user_id' => auth()->guard('website')->user()->id
            ]);
        });

        return back()->with('notification',[
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
        $topic = Topic::find($id);

        $topic = Topic::withTrashed()->findOrFail($id);

        return view('admin.topic.show', [
            'topic' => [
                'id' => $topic->id,
                'name' => $topic->name,
            ],
        ]);
    }

    /**
     * Display the specified relationship.
     *
     * @param Request $request
     * @param $id
     */
    public function showPosts(Request $request, $id)
    {
        $topic = Topic::with('posts')->find($id);

        return $topic ? response()->json($topic->posts()->withCount('views')->paginate(), 200) : response()->json(null, 200);
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
        $topic = Topic::findOrFail($id);

        $topic->delete();

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
        $topic = Topic::withTrashed()->findOrFail($id);

        $topic->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $topic = Topic::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.topic.lang', [
            'lang' => $request->lang,
            'topic' => [
                'id' => $topic->id,
                'name' => $topic->name,
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
            $topic = Topic::findOrFail($id);

            $topic->setTranslation('name', strtolower($request->lang), $request->name);

            $topic->save();
        });

        return redirect()->route('topics.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }
}
