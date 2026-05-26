<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Http\Requests\PermissionRequest;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.permission.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'permissions' => Permission::query()
                ->filter($request->only('search', 'trashed'))
                ->paginate(5)
                // ->only('id', 'name')
        ]);
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePermissionRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function store(PermissionRequest $request)
    {
        DB::transaction(function () use ($request) {

            foreach($request->permission as $p) {
                
                Permission::create([
                    'name' => $p['name'],
                    'label' => $p['label'],
                    'guard_name' => 'web',
                ]);
            }
            
        });

        return redirect()->route('permissions.index')->with('notification',[
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
        $permission = Permission::findOrFail($id);

        return view('admin.permission.show', [
            'permission' => [
                'id' => $permission->id,
                'name' => $permission->name,
                'label' => $permission->label
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
    public function settranslation(PermissionRequest $request, $id)
    {
        // dd($request->input('file'));

        DB::transaction(function () use ($request, $id) {
            $permission = Permission::findOrFail($id);
            
            $permission->name = $request->name;
            $permission->label = $request->label;

            $permission->save();

        });

        return redirect()->route('permissions.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }


    public function lang(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.permission.lang', [
            'lang' => $request->lang,
            'permission' => [
                'id' => $permission->id,
                'name' => $permission->name,
                'label' => $permission->label,
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
        $permission = Permission::findOrFail($id);

        $permission->delete();

        return back()->with('notification',[
            'title' => 'Remoção de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo removido com êxito.'
        ]);
    }

}
