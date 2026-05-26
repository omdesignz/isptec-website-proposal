<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.service.index', [
            'categories' => ServiceCategory::all(),
            'filters' => $request->all('search', 'trashed', 'range'),
            'services' => Service::with('category')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.service.create', [
            'categories' => ServiceCategory::all(),
        ]);
    }

    public function store(ServiceRequest $request)
    {
        DB::transaction(function () use ($request) {
            $service = Service::create([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'contact' => $request->contact,
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
        $service = Service::withTrashed()->findOrFail($id);

        return view('admin.service.show', [
            'service' => [
                'id' => $service->id,
                'name' => $service->name,
                'description' => $service->description,
                'category_id' => $service?->category?->name,
                'email' => $service->email,
                'contact' => $service->contact,
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
        $service = Service::findOrFail($id);

        $service->delete();

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
        $service = Service::withTrashed()->findOrFail($id);

        $service->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $service = Service::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.service.lang', [
            'lang' => $request->lang,
            'categories' => ServiceCategory::all(),
            'service' => [
                'id' => $service->id,
                'name' => $service->name,
                'description' => $service->description,
                'category_id' => $service->category_id,
                'email' => $service->email,
                'contact' => $service->contact,
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
            $service = Service::findOrFail($id);

            $service->setTranslation('name', strtolower($request->lang), $request->name);
            $service->setTranslation('description', strtolower($request->lang), $request->description);

            $service->category_id = $request->category_id;
            $service->email = $request->email;
            $service->contact = $request->contact;

            $service->save();
        });

        return redirect()->route('services.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }
}
