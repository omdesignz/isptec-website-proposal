<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DepartmentRequest extends FormRequest
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
                'name' => 'required|unique:website_departments,name',
                'description' => 'required|unique:website_departments,description',
            ];
        } else {
            $rules = [
                'name' => 'required|unique:website_departments,name,' . request()->department,
                'description' => 'required|unique:website_departments,description,' . request()->department,
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
            'code' => 'código',
            'tel_no' => 'contacto',
            'email' => 'email',
            'description' => 'descrição',
            'show_on_contact_page' => 'Mostrar na Página dos Contactos',
        ];
    }

     /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            
        ]);
    }
}
