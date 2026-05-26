<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Support\MediaStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.employee.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'employees' => Employee::query()
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }
    
    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(EmployeeRequest $request)
    {
        DB::transaction(function () use ($request) {
            $employee = Employee::create([
                'full_name' => $request->full_name,
                'slug' => str($request->full_name)->slug('-')->__toString(),
                'email' => $request->email,
                'receive_bday_notification' => $request->boolean('receive_bday_notification') ?? true,
                'is_national' => $request->boolean('is_national') ?? true,
                'is_lecturer' => $request->boolean('is_lecturer') ?? true,
                'tel_no' => $request->tel_no,
                'orcid_id' => $request->orcid_id,
                'description' => $request->description,
                'extension' => $request->extension,
                'dob' => $request->dob,
                'gender' => $request->gender,
                // 'user_id' => auth()->guard('website')->user()->id
            ]);

            // Add Possible Avatar Image
            if(isset($request->avatar)){

                $fileAdders = $employee
                    ->addMultipleMediaFromRequest(['avatar'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('avatar');
                    });
            }

            // Add Possible Documets
            if(isset($request->documents)){

                $fileAdders = $employee
                    ->addMultipleMediaFromRequest(['documents'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('documents');
                    });
            }
        });

        return redirect()->route('employees.index')->with('notification',[
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
        $employee = Employee::find($id);

        $employee = Employee::withTrashed()->findOrFail($id);

        return view('admin.employee.show', [
            'employee' => [
                'id' => $employee->id,
                'full_name' => $employee->full_name,
                'email' => $employee->email,
                'receive_bday_notification' => $employee->receive_bday_notification,
                'is_national' => $employee->is_national,
                'is_lecturer' => $employee->is_lecturer,
                'tel_no' => $employee?->tel_no,
                'orcid_id' => $employee?->orcid_id,
                'description' => $employee?->description,
                'extension' => $employee?->extension,
                'dob' => $employee?->dob,
                'gender' => $employee?->gender,
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
        $employee = Employee::findOrFail($id);

        $employee->delete();

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
        $employee = Employee::withTrashed()->findOrFail($id);

        $employee->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $employee = Employee::withTrashed()->findOrFail($id)->setLocale($request->lang);

        return view('admin.employee.lang', [
            'lang' => $request->lang,
            'employee' => [
                'id' => $employee->id,
                'full_name' => $employee->full_name,
                'email' => $employee->email,
                'receive_bday_notification' => $employee->receive_bday_notification,
                'is_national' => $employee->is_national,
                'is_lecturer' => $employee->is_lecturer,
                'tel_no' => $employee?->tel_no,
                'orcid_id' => $employee?->orcid_id,
                'description' => $employee?->description,
                'extension' => $employee?->extension,
                'dob' => $employee?->dob,
                'gender' => $employee?->gender,
                'avatar' => collect($employee->getMedia('avatar')),
                'documents' => collect($employee->getMedia('documents')),
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
            $employee = Employee::findOrFail($id);

            $employee->setTranslation('description', strtolower($request->lang), $request->description);

            $employee->full_name = $request->full_name;
            $employee->email = $request->email;
            $employee->receive_bday_notification = $request->boolean('receive_bday_notification');
            $employee->is_national = $request->boolean('is_national');
            $employee->is_lecturer = $request->boolean('is_lecturer');
            $employee->tel_no = $request->tel_no;
            $employee->orcid_id = $request->orcid_id;
            $employee->extension = $request->extension;
            $employee->dob = $request->dob;
            $employee->gender = $request->gender;

            $employee->save();


            // Add Possible Avatar Image
            if(isset($request->avatar)){

                $fileAdders = $employee
                    ->addMultipleMediaFromRequest(['avatar'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('avatar');
                    });
            }

            // Add Possible Documets
            if(isset($request->documents)){

                $fileAdders = $employee
                    ->addMultipleMediaFromRequest(['documents'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('documents');
                    });
            }
        });

        return redirect()->route('employees.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }

    public function downloadallattachments()
    {
        // Get all Media
        $attachments = Employee::findOrFail(request()->model_id)->getMedia('documents');

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

