<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\TagRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.tag.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'tags' => Tag::withCount('posts')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(TagRequest $request)
    {
        DB::transaction(function () use ($request) {
            $tag = Tag::create([
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
        $tag = Tag::find($id);

        $tag = Tag::withTrashed()->findOrFail($id);

        return view('admin.tag.show', [
            'tag' => [
                'id' => $tag->id,
                'name' => $tag->name,
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
        $tag = Tag::with('posts')->find($id);

        return $tag ? response()->json($tag->posts()->withCount('views')->paginate(), 200) : response()->json(null, 200);
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
        $tag = Tag::findOrFail($id);

        $tag->delete();

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
        $tag = Tag::withTrashed()->findOrFail($id);

        $tag->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $tag = Tag::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.tag.lang', [
            'lang' => $request->lang,
            'tag' => [
                'id' => $tag->id,
                'name' => $tag->name,
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
            $tag = Tag::findOrFail($id);

            $tag->setTranslation('name', strtolower($request->lang), $request->name);

            $tag->save();
        });

        return redirect()->route('tags.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }
}
