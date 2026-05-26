<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.department.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'departments' => Department::query()
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.department.create');
    }

    public function store(DepartmentRequest $request)
    {
        DB::transaction(function () use ($request) {
            $department = Department::create([
                'name' => $request->name,
                'code' => $request->code,
                'email' => $request->email,
                'description' => $request->description,
                'tel_no' => $request->tel_no,
                'show_on_contact_page' => $request->show_on_contact_page ?? false,
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
        $department = Department::find($id);

        $department = Department::withTrashed()->findOrFail($id);

        return view('admin.department.show', [
            'department' => [
                'id' => $department->id,
                'name' => $department->name,
                'code' => $department->code,
                'description' => $department->description,
                'tel_no' => $department->tel_no,
                'email' => $department->email,
                'show_on_contact_page' => $department->show_on_contact_page,
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
        $department = Department::findOrFail($id);

        $department->delete();

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
        $department = Department::withTrashed()->findOrFail($id);

        $department->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $department = Department::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.department.lang', [
            'lang' => $request->lang,
            'department' => [
                'id' => $department->id,
                'name' => $department->name,
                'code' => $department->code,
                'email' => $department->email,
                'tel_no' => $department->tel_no,
                'description' => $department->description,
                'show_on_contact_page' => $department->show_on_contact_page,
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
            $department = Department::findOrFail($id);

            $department->setTranslation('name', strtolower($request->lang), $request->name);
            $department->setTranslation('description', strtolower($request->lang), $request->description);
            $department->setTranslation('code', strtolower($request->lang), $request->code);

            $department->email = $request->email;
            $department->tel_no = $request->tel_no;
            $department->show_on_contact_page = $request->show_on_contact_page ?? false;

            $department->save();
        });

        return redirect()->route('departments.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }
}
