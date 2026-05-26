<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.user.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'users' => User::query()
                ->filter($request->only('search', 'trashed'))
                ->paginate(5)
                // ->only('id', 'name')
        ]);
    }

    public function create()
    {
        // dd(Permission::select(['id', 'name', 'label'])->get()->toArray());
        return view('admin.user.create', [
            'permissions' => Permission::select(['id', 'name', 'label'])->get()->toArray(),
            'roles' => Role::select(['id', 'name', 'label'])->get()->toArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function store(UserRequest $request)
    {
        DB::transaction(function () use ($request) {

            
                $user = User::create([
                            'name' => $request->name,
                            'email' => $request->email,
                            'username' => $request->username,
                            'email_verified_at' => now(),
                            'locale' => $request->locale ?? 'pt',
                            'password' => Hash::make($request->password),
                        ]);
                
            // $user->syncRoles(Role::find($request->roles));
            // $user->syncPermissions(Permission::find($request->permissions));

            $user->syncRoles($request->roles);
            $user->syncPermissions($request->permissions);        
        });

        return redirect()->route('users.index')->with('notification',[
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
        $user = User::findOrFail($id);

        return view('admin.user.show', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'username' => $user->username,
                'locale' => $user->locale,
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
    public function settranslation(UserRequest $request, $id)
    {
        // dd($request->input('file'));

        DB::transaction(function () use ($request, $id) {
            $user = User::findOrFail($id);
            
            $user->name = $request->name;
            $user->email = $request->email;
            $user->locale = $request->locale ?? 'pt';
            $user->username = $request->username;

            $user->save();

            !is_null($request->password) ? $user->update(['password' => bcrypt($request->password)]) : false;

            // $user->syncRoles(Role::find($request->roles));
            // $user->syncPermissions(Permission::find($request->permissions));

            $user->syncRoles($request->roles);
            $user->syncPermissions($request->permissions);

        });

        return redirect()->route('users.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }


    public function lang(Request $request, $id)
    {
        $user = User::with('roles','permissions')->findOrFail($id);

        // dd($user->permissions);

        return view('admin.user.lang', [
            'lang' => $request->lang,
            'permissions' => Permission::select(['id', 'name', 'label'])->get()->toArray(),
            'roles' => Role::select(['id', 'name', 'label'])->get()->toArray(),
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'username' => $user->username,
                'locale' => $user->locale,
                'password' => $user->password,
                'permissions' => $user->permissions()->pluck('id')->toArray(),
                'roles' => $user->roles()->pluck('id')->toArray(),
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
        $user = User::findOrFail($id);

        $user->delete();

        return back()->with('notification',[
            'title' => 'Remoção de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo removido com êxito.'
        ]);
    }

}