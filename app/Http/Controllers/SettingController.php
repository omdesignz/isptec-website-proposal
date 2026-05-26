<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\SettingRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.setting.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'settings' => Setting::query()
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.setting.create');
    }

    public function store(SettingRequest $request)
    {
        DB::transaction(function () use ($request) {
            $setting = Setting::create([
                'option' => $request->option,
                'value' => $request->value,
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
        $setting = Setting::find($id);

        $setting = Setting::withTrashed()->findOrFail($id);

        return view('admin.setting.show', [
            'setting' => [
                'id' => $setting->id,
                'option' => $setting->option,
                'value' => $setting->value,
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
        $setting = Setting::findOrFail($id);

        $setting->delete();

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
        $setting = Setting::withTrashed()->findOrFail($id);

        $setting->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $setting = Setting::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.setting.lang', [
            'lang' => $request->lang,
            'setting' => [
                'id' => $setting->id,
                'option' => $setting->option,
                'value' => $setting->value,
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
            $setting = Setting::findOrFail($id);

            $setting->option = $request->option;
            $setting->value = $request->value;

            $setting->save();
        });

        return redirect()->route('settings.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }
}
