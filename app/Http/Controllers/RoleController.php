<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.role.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'roles' => Role::query()
                ->filter($request->only('search', 'trashed'))
                ->paginate(5)
                // ->only('id', 'name')
        ]);
    }

    public function create()
    {
        // dd(Permission::select(['id', 'name', 'label'])->get()->toArray());
        return view('admin.role.create', [
            'permissions' => Permission::select(['id', 'name', 'label'])->get()->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoleRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function store(RoleRequest $request)
    {
        DB::transaction(function () use ($request) {

            
                $r = Role::create([
                            'name' => $request->name,
                            'label' => $request->label,
                            'guard_name' => 'web',
                        ]);
                
                $r->syncPermissions($request->permissions);        
        });

        return redirect()->route('roles.index')->with('notification',[
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
        $role = Role::findOrFail($id);

        return view('admin.role.show', [
            'role' => [
                'id' => $role->id,
                'name' => $role->name,
                'label' => $role->label
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
    public function settranslation(RoleRequest $request, $id)
    {
        // dd($request->input('file'));

        DB::transaction(function () use ($request, $id) {
            $role = Role::findOrFail($id);
            
            $role->name = $request->name;
            $role->label = $request->label;

            $role->save();

            $role->syncPermissions($request->permissions);

        });

        return redirect()->route('roles.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }


    public function lang(Request $request, $id)
    {
        $role = Role::with('permissions')->findOrFail($id);

        // dd($role->permissions->pluck('id')->toArray());

        return view('admin.role.lang', [
            'lang' => $request->lang,
            'permissions' => Permission::select(['id', 'name', 'label'])->get()->toArray(),
            'role' => [
                'id' => $role->id,
                'name' => $role->name,
                'label' => $role->label,
                'permissions' => $role->permissions->pluck('id')->toArray(),
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
        $role = Role::findOrFail($id);

        $role->delete();

        return back()->with('notification',[
            'title' => 'Remoção de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo removido com êxito.'
        ]);
    }

}