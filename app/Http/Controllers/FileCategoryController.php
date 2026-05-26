<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileCategory;
use App\Http\Requests\FileCategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class FileCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.filecategory.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'categories' => FileCategory::query()
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.filecategory.create');
    }

    public function store(FileCategoryRequest $request)
    {
        DB::transaction(function () use ($request) {
            $category = FileCategory::create([
                'name' => $request->name,
                'description' => $request->description,
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
        $category = FileCategory::find($id);

        $category = FileCategory::withTrashed()->findOrFail($id);

        return view('admin.filecategory.show', [
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
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
        $category = FileCategory::findOrFail($id);

        $category->delete();

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
        $category = FileCategory::withTrashed()->findOrFail($id);

        $category->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $category = FileCategory::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.filecategory.lang', [
            'lang' => $request->lang,
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
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
            $category = FileCategory::findOrFail($id);

            $category->setTranslation('name', strtolower($request->lang), $request->name);
            $category->setTranslation('description', strtolower($request->lang), $request->description);

            $category->save();
        });

        return redirect()->route('filecategories.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }
}
