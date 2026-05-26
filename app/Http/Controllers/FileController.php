<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileCategory;
use App\Models\Document;
use App\Http\Requests\FileRequest;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Support\MediaStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.file.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'files' => Document::with('category')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    public function create()
    {
        return view('admin.file.create', [
            'categories' => FileCategory::all(),
            'departments' => Department::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFileRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function store(FileRequest $request)
    {
        DB::transaction(function () use ($request) {

            foreach($request->file as $f) {
                
                $file = Document::create([
                    'name' => $f['name'],
                    'description' => $f['description'],
                    'link' => $f['link'],
                    'category_id' => $f['category_id'],
                    'department_id' => $f['department_id'],
                    'slug' => str($f['name'])->slug('-')->__toString()
                ]);

                // Add Actual File
                if(isset($f['file'])){

                    $fileAdders = $file
                        ->addMedia($f['file'])->toMediaCollection('file');
                }

            }
            
        });

        return redirect()->route('files.index')->with('notification',[
            'title' => 'Cadastramento de Item',
            'time' => now()->diffForHumans(),
            'message' => 'Item cadastrado com êxito.'
        ]);
    }

    /**
     * Set the specified resource translation.
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function settranslation(FileRequest $request, $id)
    {
        // dd($request->input('file'));

        DB::transaction(function () use ($request, $id) {
            $file = Document::findOrFail($id);

            $file->setTranslation('name', strtolower($request->lang), $request->name);
            $file->setTranslation('description', strtolower($request->lang), $request->description);
            
            $file->link = $request->link;
            $file->category_id = $request->category_id;
            $file->department_id = $request->department_id;

            $file->save();


             // Add Actual File
             if($request->hasFile('file')){

                $fileAdders = $file
                    ->addMedia($request->file)->toMediaCollection('file');
            }

        });

        return redirect()->route('files.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }


    public function lang(Request $request, $id)
    {
        $file = Document::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.file.lang', [
            'lang' => $request->lang,
            'categories' => FileCategory::all(),
            'departments' => Department::all(),
            'file' => [
                'id' => $file->id,
                'name' => $file->name,
                'link' => $file->link,
                'description' => $file?->description,
                'category_id' => $file?->category_id,
                'department_id' => $file?->department_id,
                'file' => collect($file?->getMedia('document')),
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
        $file = Document::findOrFail($id);

        $file->delete();

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
        $file = Document::withTrashed()->findOrFail($id);

        $file->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function downloadallattachments()
    {
        // Get all Media
        $attachments = Document::findOrFail(request()->model_id)->getMedia('attachments');

        return MediaStream::create('attachments.zip')->addMedia($attachments);
    }

    public function downloadsingleattachment()
    {
        return Media::findOrFail(request()->model_id);
    }

    public function deletesingleattachment(Request $request)
    {
        $media = Media::findOrFail(request()->model_id);

        $media->delete();

        return back()->with('notification',[
            'title' => 'Remoção de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo removido com êxito.'
        ]);
    }
}
