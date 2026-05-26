<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\Department;
use App\Http\Requests\ServiceCategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.servicecategory.index', [
            'departments' => Department::all(),
            'filters' => $request->all('search', 'trashed', 'range'),
            'categories' => ServiceCategory::with('department')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.servicecategory.create', [
            'departments' => Department::all(),
        ]);
    }

    public function store(ServiceCategoryRequest $request)
    {
        DB::transaction(function () use ($request) {
            $category = ServiceCategory::create([
                'name' => $request->name,
                'description' => $request->description,
                'department_id' => $request->department_id,
                'email' => $request->email,
                // 'user_id' => 1
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
        $category = ServiceCategory::find($id);

        $category = ServiceCategory::withTrashed()->findOrFail($id);

        return view('admin.servicecategory.show', [
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
                'department_id' => $category?->department?->name,
                'email' => $category->email,
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
        $category = ServiceCategory::findOrFail($id);

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
        $category = ServiceCategory::withTrashed()->findOrFail($id);

        $category->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $category = ServiceCategory::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.servicecategory.lang', [
            'lang' => $request->lang,
            'departments' => Department::all(),
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
                'department_id' => $category->department_id,
                'email' => $category->email,
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
            $category = ServiceCategory::findOrFail($id);

            $category->setTranslation('name', strtolower($request->lang), $request->name);
            $category->setTranslation('description', strtolower($request->lang), $request->description);

            $category->department_id = $request->department_id;
            $category->email = $request->email;

            $category->save();
        });

        return redirect()->route('servicecategories.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }
}
