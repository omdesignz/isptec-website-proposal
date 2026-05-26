<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use App\Http\Requests\SemesterRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.semester.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'semesters' => Semester::query()
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.semester.create');
    }

    public function store(SemesterRequest $request)
    {
        DB::transaction(function () use ($request) {
            $semester = Semester::create([
                'name' => $request->name,
                'year' => $request->year,
                'status' => $request->status ?? true,
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
        $semester = Semester::find($id);

        $semester = Semester::withTrashed()->findOrFail($id);

        return view('admin.semester.show', [
            'semester' => [
                'id' => $semester->id,
                'name' => $semester->name,
                'year' => $semester->year,
                'status' => $semester->status,
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
        $semester = Semester::findOrFail($id);

        $semester->delete();

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
        $semester = Semester::withTrashed()->findOrFail($id);

        $semester->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $semester = Semester::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.semester.lang', [
            'lang' => $request->lang,
            'semester' => [
                'id' => $semester->id,
                'name' => $semester->name,
                'year' => $semester->year,
                'status' => $semester->status,
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
            $semester = Semester::findOrFail($id);

            $semester->setTranslation('name', strtolower($request->lang), $request->name);
            $semester->setTranslation('year', strtolower($request->lang), $request->year);

            $semester->status = $request->status ?? false;

            $semester->save();
        });

        return redirect()->route('semesters.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }
}
