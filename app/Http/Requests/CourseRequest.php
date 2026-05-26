<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
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
        return [
            'name' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'category_id' => 'required|exists:website_course_cats,id',
            'department_id' => 'required|exists:website_departments,id',
        ];
    }

         /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nome',
            'description' => 'descrição',
            'duration' => 'duração',
            'status' => 'status',
            'start_date' => 'data de início',
            'category_id' => 'categoria',
            'department_id' => 'departamento',
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
        $this->merge([
            // 'category_id' => request()->category_id['id'] ?? null,
            // 'department_id' => request()->department_id['id'] ?? null,
        ]);
    }
}
