<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoursePlan;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Semester;
use App\Http\Requests\CoursePlanRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Support\MediaStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CoursePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.courseplan.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'plans' => CoursePlan::with('course', 'subject', 'semester')
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    public function create()
    {
        return view('admin.courseplan.create', [
            'courses' => Course::all(),
            'subjects' => Subject::all(),
            'semesters' => Semester::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCoursePlanRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function store(CoursePlanRequest $request)
    {
        // dd($request->all());
        DB::transaction(function () use ($request) {
            // Add Possible Plans
            if(isset($request->plan)) {
                foreach($request->plan as $p) {
                    $data = CoursePlan::create(
                        [
                            'theoretical' => $p['theoretical'],
                            'practical' => $p['practical'],
                            'theoretical_practical' => $p['theoretical_practical'],
                            'weekly_hours' => $p['weekly_hours'],
                            'semester_hours' => $p['semester_hours'],
                            'course_id' => $request->course_id,
                            'semester_id' => $p['semester_id'],
                            'subject_id' => $p['subject_id'],
                        ]
                    );

                    // Add Possible Documets
                    if(isset($p['documents'])){

                        $fileAdders = $data
                            ->addMultipleMediaFromRequest(['documents'])
                            ->each(function ($fileAdder) {
                                $fileAdder->toMediaCollection('documents');
                            });
                    }
                }
            }

            
        });

        return redirect()->route('courseplans.index')->with('notification',[
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
        $plan = CoursePlan::withTrashed()->findOrFail($id);

        return view('admin.courseplan.show', [
            'plan' => [
                'id' => $plan->id,
                'course_id' => $plan->course->name,
                'subject_id' => $plan->subject->name,
                'semester_id' => $plan->semester->name,
                'theoretical' => $plan->theoretical,
                'practical' => $plan->practical,
                'theoretical_practical' => $plan->theoretical_practical,
                'weekly_hours' => $plan->weekly_hours,
                'semester_hours' => $plan->semester_hours,
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
    public function settranslation(CoursePlanRequest $request, $id)
    {
        // dd($request->plan);

        DB::transaction(function () use ($request, $id) {
            $course = Course::with('plan')->findOrFail($request->course_id);

            // Add Possible Plans
            if(isset($request->plan)) {

                // CoursePlan::whereNotIn('id', collect($course->plan)->pluck('id')->toArray())->forcedelete();

                foreach($request->plan as $p) {

                    if(isset($p['id']))
                    {
                        $data = CoursePlan::findOrFail($p['id']);

                        $data->update([
                            'theoretical' => $p['theoretical'],
                            'practical' => $p['practical'],
                            'theoretical_practical' => $p['theoretical_practical'],
                            'weekly_hours' => $p['weekly_hours'],
                            'semester_hours' => $p['semester_hours'],
                            'course_id' => $course->id,
                            'semester_id' => $p['semester_id'],
                            'subject_id' => $p['subject_id'],
                        ]);

                    } else {
                        
                        $data = CoursePlan::create(
                            [
                                'theoretical' => $p['theoretical'],
                                'practical' => $p['practical'],
                                'theoretical_practical' => $p['theoretical_practical'],
                                'weekly_hours' => $p['weekly_hours'],
                                'semester_hours' => $p['semester_hours'],
                                'course_id' => $course->id,
                                'semester_id' => $p['semester_id'],
                                'subject_id' => $p['subject_id'],
                            ]
                        );
                    }
                        

                         // Add Possible Documets
                    if(isset($p['documents'])){

                        $fileAdders = $data
                            ->addMultipleMediaFromRequest(['documents'])
                            ->each(function ($fileAdder) {
                                $fileAdder->toMediaCollection('documents');
                            });
                    }
                }
            }
        });

        return redirect()->route('courseplans.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }

    public function lang(Request $request, $id)
    {
        $course = Course::with('plan')->findOrFail(CoursePlan::withTrashed()->findOrFail($id)->course_id)->setLocale($request->lang);

        return view('admin.courseplan.lang', [
            'lang' => $request->lang,
            'courses' => Course::all(),
            'subjects' => Subject::all(),
            'semesters' => Semester::all(),
            'course_id' => $course->id,
            'course' => $course->name,
            'plans' => $course->plan->map(function($item) {
                return [
                    'id' => $item->id,
                    'delete' => route('courseplans.deleteplan', ['model_id' => $item->id]),
                    'theoretical' => $item->theoretical,
                    'practical' => $item->practical,
                    'theoretical_practical' => $item->theoretical_practical,
                    'weekly_hours' => $item->weekly_hours,
                    'semester_hours' => $item->semester_hours,
                    'documents' => $item?->getMedia('documents')?->first()?->getUrl(),
                ];
            }),
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
        $event = CoursePlan::findOrFail($id);

        $event->delete();

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
        $event = CoursePlan::withTrashed()->findOrFail($id);

        $event->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function downloadallattachments()
    {
        // Get all Media
        $attachments = CoursePlan::findOrFail(request()->model_id)->getMedia('attachments');

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

    public function deleteplan(Request $request)
    {
        $plan = CoursePlan::findOrFail(request()->model_id);

        $plan->delete();

        return back()->with('notification',[
            'title' => 'Remoção de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo removido com êxito.'
        ]);
    }
}
