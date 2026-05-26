<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterCategory;
use App\Http\Requests\NewsletterCategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class NewsletterCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.newslettercategory.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'categories' => NewsletterCategory::query()
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.newslettercategory.create');
    }

    public function store(NewsletterCategoryRequest $request)
    {
        DB::transaction(function () use ($request) {
            $category = NewsletterCategory::create([
                'name' => $request->name,
                'slug' => str($request->name)->slug('-')->__toString(),
                'description' => $request->description,
                'period' => $request->period,
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
        $category = NewsletterCategory::find($id);

        $category = NewsletterCategory::withTrashed()->findOrFail($id);

        return view('admin.newslettercategory.show', [
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
                'period' => $category->period,
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
        $category = NewsletterCategory::findOrFail($id);

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
        $category = NewsletterCategory::withTrashed()->findOrFail($id);

        $category->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $category = NewsletterCategory::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.newslettercategory.lang', [
            'lang' => $request->lang,
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
                'period' => $category->period,
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
            $category = NewsletterCategory::findOrFail($id);

            $category->setTranslation('name', strtolower($request->lang), $request->name);
            $category->setTranslation('description', strtolower($request->lang), $request->description);
            // $category->slug = str($request->name)->slug('-')->__toString();
            $category->period = $request->period;

            $category->save();
        });

        return redirect()->route('newslettercategories.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }
}
