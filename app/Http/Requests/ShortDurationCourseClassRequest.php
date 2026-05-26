<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShortDurationCourseClassRequest extends FormRequest
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
                'name' => 'required|unique:website_scourses,name',
                'course_id' => 'required|exists:website_scourses,id',
                'description' => 'required',
            ];
        } else {
            $rules = [
                'name' => 'required|unique:website_scourses,name,' . request()->class,
                'course_id' => 'required|exists:website_scourses,id',
                'description' => 'required',
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
            'name' => 'nome',
            'description' => 'descrição',
            'status' => 'status',
            'course_id' => 'curso',
            'total_hours' => 'carga horária',
            'start_time' => 'horário: início',
            'end_time' => 'horário: fim',
            'start_date' => 'início',
            'end_date' => 'fim',
            'price' => 'preço',
            'registration_fee' => 'taxa de inscrição',
            'extra_data' => 'dados adicionais',
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
            // 'course_id' => request()->course_id['id'] ?? null,
        ]);
    }
}
