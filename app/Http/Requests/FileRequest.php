<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FileRequest extends FormRequest
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
            'file.*.name' => 'required',
            'file.*.file' => 'required',
            'file.*.description' => 'nullable|string',
            'file.*.category_id' => 'nullable|exists:website_file_cats,id',
            'file.*.department_id' => 'nullable|exists:website_departments,id',
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
            'file.*.name' => 'nome',
            'file.*.description' => 'descrição',
            'file.*.category_id' => 'categoria',
            'file.*.department_id' => 'departamento',
            'file.*.file' => 'ficheiro',
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
            // 'category_id' => request()->category_id['id'] ?? null,
            // 'department_id' => request()->department_id['id'] ?? null,
        ]);
    }
}
