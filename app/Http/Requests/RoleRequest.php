<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return $this->user('canvas')->isAdmin;

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
                'name' => 'required|unique:roles,name',
                'label' => 'required|string',
                'permissions.*' => 'required|exists:permissions,id',
            ];
        } else {
            $rules = [
                'name' => 'required|unique:roles,name,' . request()->role,
                'label' => 'required',
                'permissions.*' => 'required|exists:permissions,id',
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
            'label' => 'sumário',
            'permissions.*' => 'permissão',
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
        ]);
    }
}
