<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicFootprint;
use App\Models\Page;
use App\Http\Requests\AcademicFootprintRequest;
use App\Models\AcademicFootprintCategory;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class AcademicFootprintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.academicfootprint.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'footprints' => AcademicFootprint::with('category', 'employee')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.academicfootprint.create', [
            'categories' => AcademicFootprintCategory::all(),
            'employees' => Employee::all(),
        ]);
    }

    public function store(AcademicFootprintRequest $request)
    {
        DB::transaction(function () use ($request) {

            if(count($request->item) > 0) {
                foreach($request->item as $sp) {
                    AcademicFootprint::create(
                        [
                            'name' => $sp['name'],
                            'link' => $sp['link'],
                            'description' => $sp['description'],
                            'category_id' => $request->category_id,
                            'employee_id' => $request->employee_id,
                        ]
                    );
                }
            }
            
        });

        return redirect()->route('academicfootprints.index')->with('notification',[
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
        $footprint = AcademicFootprint::find($id);

        $footprint = AcademicFootprint::withTrashed()->findOrFail($id);

        return view('admin.academicfootprint.show', [
            'footprint' => [
                'id' => $footprint->id,
                'name' => $footprint->name,
                'description' => $footprint->description,
                'link' => $footprint->link,
                'category_id' => $footprint?->category?->name,
                'employee_id' => $footprint?->employee?->full_name,
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
        $footprint = AcademicFootprint::findOrFail($id);

        $footprint->delete();

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
        $footprint = AcademicFootprint::withTrashed()->findOrFail($id);

        $footprint->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $footprint = AcademicFootprint::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.academicfootprint.lang', [
            'lang' => $request->lang,
            'categories' => AcademicFootprintCategory::all(),
            'employees' => Employee::all(),
            'footprint' => [
                'id' => $footprint->id,
                'name' => $footprint->name,
                'description' => $footprint->description,
                'link' => $footprint->link,
                'category_id' => $footprint->category_id,
                'employee_id' => $footprint->employee_id,
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
            $footprint = AcademicFootprint::findOrFail($id);

            $footprint->setTranslation('name', strtolower($request->lang), $request->name);
            $footprint->setTranslation('description', strtolower($request->lang), $request->description);

            $footprint->link = $request->link;
            $footprint->category_id = $request->category_id;
            $footprint->employee_id = $request->employee_id;

            $footprint->save();
        });

        return redirect()->route('academicfootprints.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }
}