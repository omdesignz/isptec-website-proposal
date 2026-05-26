<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Http\Requests\SubjectRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.subject.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'subjects' => Subject::query()
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    
    public function create()
    {
        return view('admin.subject.create');
    }

    public function store(SubjectRequest $request)
    {
        DB::transaction(function () use ($request) {
            $subject = Subject::create([
                'name' => $request->name,
                'description' => $request->description,
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
        $subject = Subject::find($id);

        $subject = Subject::withTrashed()->findOrFail($id);

        return view('admin.subject.show', [
            'subject' => [
                'id' => $subject->id,
                'name' => $subject->name,
                'description' => $subject->description,
                'status' => $subject->status,
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
        $subject = Subject::findOrFail($id);

        $subject->delete();

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
        $subject = Subject::withTrashed()->findOrFail($id);

        $subject->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $subject = Subject::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.subject.lang', [
            'lang' => $request->lang,
            'subject' => [
                'id' => $subject->id,
                'name' => $subject->name,
                'description' => $subject->description,
                'status' => $subject->status,
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
            $subject = Subject::findOrFail($id);

            $subject->setTranslation('name', strtolower($request->lang), $request->name);
            $subject->setTranslation('description', strtolower($request->lang), $request->description);

            $subject->status = $request->status ?? false;

            $subject->save();
        });

        return redirect()->route('subjects.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }
}
