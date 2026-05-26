<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LTCMembershipCategory;
use App\Http\Requests\LTCMembershipCategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class LTCMembershipCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.ltcmembershipcategory.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'categories' => LTCMembershipCategory::query()
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.ltcmembershipcategory.create');
    }

    public function store(LTCMembershipCategoryRequest $request)
    {
        DB::transaction(function () use ($request) {
            $category = LTCMembershipCategory::create([
                'name' => $request->name,
                'slug' => str($request->name)->slug('-')->__toString(),
                'description' => $request->description,
                'responsible_name' => $request->responsible_name,
                'employee_id' => $request->employee_id ?? null,
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
        $category = LTCMembershipCategory::find($id);

        $category = LTCMembershipCategory::withTrashed()->findOrFail($id);

        return view('admin.ltcmembershipcategory.show', [
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
                'responsible_name' => $category->responsible_name,
                'employee_id' => $category->employee_id,
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
        $category = LTCMembershipCategory::findOrFail($id);

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
        $category = LTCMembershipCategory::withTrashed()->findOrFail($id);

        $category->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $category = LTCMembershipCategory::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.ltcmembershipcategory.lang', [
            'lang' => $request->lang,
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
                'responsible_name' => $category->responsible_name,
                'employee_id' => $category->employee_id,
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
            $category = LTCMembershipCategory::findOrFail($id);

            $category->setTranslation('name', strtolower($request->lang), $request->name);
            $category->setTranslation('description', strtolower($request->lang), $request->description);
            // $category->slug = str($request->name)->slug('-')->__toString();
            $category->responsible_name = $request->responsible_name;
            $category->employee_id = $request->employee_id;

            $category->save();
        });

        return redirect()->route('ltcmembershipcategories.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }
}
