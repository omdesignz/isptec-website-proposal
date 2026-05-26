<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageSection;
use App\Models\Page;
use App\Http\Requests\PageSectionRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class PageSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.pagesection.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'sections' => PageSection::with('page')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.pagesection.create', [
            'pages' => Page::all()
        ]);
    }

    public function store(PageSectionRequest $request)
    {
        DB::transaction(function () use ($request) {
            $section = PageSection::create([
                'title' => $request->title,
                'description' => $request->description,
                'page_id' => $request->page_id,
            ]);
        });

        return redirect()->route('pagesections.index')->with('notification',[
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
        $section = PageSection::find($id);

        $section = PageSection::withTrashed()->findOrFail($id);

        return view('admin.pagesection.show', [
            'section' => [
                'id' => $section->id,
                'title' => $section->title,
                'description' => $section->description,
                'page_id' => $section?->page?->title,
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
        $section = PageSection::findOrFail($id);

        $section->delete();

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
        $section = PageSection::withTrashed()->findOrFail($id);

        $section->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $section = PageSection::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.pagesection.lang', [
            'lang' => $request->lang,
            'pages' => Page::all(),
            'section' => [
                'id' => $section->id,
                'title' => $section->title,
                'description' => $section->description,
                'page_id' => $section->page_id,
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
            $section = PageSection::findOrFail($id);

            $section->setTranslation('title', strtolower($request->lang), $request->title);
            $section->setTranslation('description', strtolower($request->lang), $request->description);

            $section->page_id = $request->page_id;

            $section->save();
        });

        return redirect()->route('pagesections.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }
}