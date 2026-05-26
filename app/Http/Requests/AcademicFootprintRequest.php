<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AcademicFootprintRequest extends FormRequest
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
            'category_id' => 'required|exists:website_acadfoot_cats,id',
            'employee_id' => 'required|exists:website_employees,id',
            'item.*.name' => 'required|string',
            'item.*.link' => 'nullable',
            'item.*.description' => 'nullable',
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
            'category_id' => 'categoria',
            'employee_id' => 'colaborador',
            'image.*.title' => 'nome',
            'image.*.link' => 'link',
            'image.*.description' => 'decrição',
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
        $this->merge([
            // 'page_id' => request()->page_id['id'] ?? null,
        ]);
    }
}
