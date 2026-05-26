<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageRequest extends FormRequest
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
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'nome',
            'description' => 'descrição',
            'code' => 'código',
            'status' => 'status',
        ];
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
                'title' => 'required|unique:website_pages,title',
                'code' => 'required|unique:website_pages,code',
            ];
        } else {
            $rules = [
                'title' => 'required|unique:website_pages,title,' . request()->page,
                'code' => 'required|unique:website_pages,code,' . request()->page,
            ];
        }

        return $rules;
    }
}
