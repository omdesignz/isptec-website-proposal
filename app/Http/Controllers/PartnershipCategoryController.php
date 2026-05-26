<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnershipCategory;
use App\Http\Requests\PartnershipCategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PartnershipCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.partnershipcategory.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'categories' => PartnershipCategory::query()
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.partnershipcategory.create');
    }

    public function store(PartnershipCategoryRequest $request)
    {
        DB::transaction(function () use ($request) {
            $category = PartnershipCategory::create([
                'name' => $request->name,
                'slug' => str($request->name)->slug('-')->__toString(),
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
        $category = PartnershipCategory::find($id);

        $category = PartnershipCategory::withTrashed()->findOrFail($id);

        return view('admin.partnershipcategory.show', [
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
        $category = PartnershipCategory::findOrFail($id);

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
        $category = PartnershipCategory::withTrashed()->findOrFail($id);

        $category->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $category = PartnershipCategory::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.partnershipcategory.lang', [
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
            $category = PartnershipCategory::findOrFail($id);

            $category->setTranslation('name', strtolower($request->lang), $request->name);
            $category->setTranslation('description', strtolower($request->lang), $request->description);
            // $category->slug = str($request->name)->slug('-')->__toString();

            $category->save();
        });

        return redirect()->route('partnershipcategories.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }
}
