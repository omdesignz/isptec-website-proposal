<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CoursePlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return $this->user('canvas')->isAdmin;
        // if (auth()->guard('website')->user()) {
        //     return true;
        // }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            $rules = [
                'course_id' => 'required|exists:website_courses,id',
                'plan.*.subject_id' => 'required|exists:website_subjects,id',
                'plan.*.semester_id' => 'required|exists:website_semesters,id',
                'plan.*.theoretical' => 'required',
                'plan.*.practical' => 'required',
                'plan.*.theoretical_practical' => 'required',
                'plan.*.weekly_hours' => 'required',
                'plan.*.semester_hours' => 'required',
            ];
        } else {
            $rules = [
                'course_id' => 'required|exists:website_courses,id',
                'plan.*.subject_id' => 'required|exists:website_subjects,id',
                'plan.*.semester_id' => 'required|exists:website_semesters,id',
                'plan.*.theoretical' => 'required',
                'plan.*.practical' => 'required',
                'plan.*.theoretical_practical' => 'required',
                'plan.*.weekly_hours' => 'required',
                'plan.*.semester_hours' => 'required',
            ];
        }

        return $rules;
    }

     /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'course_id' => 'curso',
            'plan.*.subject_id' => 'disciplina',
            'plan.*.semester_id' => 'semestre',
            'plan.*.theoretical' => 'carga horária: teórica',
            'plan.*.practical' => 'carga horária: prática',
            'plan.*.theoretical_practical' => 'carga horária: teórico-prático',
            'plan.*.weekly_hours' => 'carga horária: semanal',
            'plan.*.semester_hours' => 'carga horária: semestral',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function prepareForValidation()
    {
        // dd(request()->all());
        // dd(isset(request()->plan));
        $this->merge([
            // 'course_id' => request()->course_id['id'] ?? null,
            // 'subject_id' => request()->subject_id['id'] ?? null,
            // 'semester_id' => request()->semester_id['id'] ?? null,
        ]);
    }
}
