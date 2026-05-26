<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LTCMembershipCategory;
use App\Models\LTCMembership;
use App\Http\Requests\LTCMembershipRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class LTCMembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.ltcmembership.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'memberships' => LTCMembership::with('category')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.ltcmembership.create', [
            'categories' => LTCMembershipCategory::all()
        ]);
    }

    public function store(LTCMembershipRequest $request)
    {
        DB::transaction(function () use ($request) {
            $membership = LTCMembership::create([
                'name' => $request->name,
                'slug' => str($request->name)->slug('-')->__toString(),
                'surname' => $request->surname,
                'email' => $request->email,
                'member_type' => $request->member_type,
                'category_id' => $request->category_id
                // 'user_id' => auth()->guard('website')->user()->id
            ]);
        });

        return redirect()->route('ltcmemberships.index')->with('notification',[
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
        $membership = LTCMembership::find($id);

        $membership = LTCMembership::withTrashed()->findOrFail($id);

        return view('admin.ltcmembership.show', [
            'membership' => [
                'id' => $membership->id,
                'name' => $membership->name,
                'surname' => $membership->surname,
                'email' => $membership->email,
                'member_type' => $membership->member_type,
                'category_id' => $membership?->category?->name,
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
        $membership = LTCMembership::findOrFail($id);

        $membership->delete();

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
        $membership = LTCMembership::withTrashed()->findOrFail($id);

        $membership->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $membership = LTCMembership::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.ltcmembership.lang', [
            'lang' => $request->lang,
            'categories' => LTCMembershipCategory::all(),
            'membership' => [
                'id' => $membership->id,
                'name' => $membership->name,
                'surname' => $membership->surname,
                'email' => $membership->email,
                'member_type' => $membership->member_type,
                'category_id' => $membership->category_id,
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
            $membership = LTCMembership::findOrFail($id);

            $membership->name = $request->name;
            $membership->surname = $request->surname;
            $membership->email = $request->email;
            $membership->member_type = $request->member_type;
            $membership->category_id = $request->category_id;

            $membership->save();

        });

        return redirect()->route('ltcmemberships.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }
}
