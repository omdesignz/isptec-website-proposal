<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageSliderRequest extends FormRequest
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
            'title' => 'required|unique:website_sliders,title',
            'page_id' => 'required|exists:website_pages,id',
            'image.*.title' => 'nullable',
            'image.*.link' => 'nullable',
            'image.*.description' => 'nullable',
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
            'title' => 'nome',
            'height' => 'altura',
            'width' => 'largura',
            'interval' => 'intervalo',
            'page_id' => 'página',
            'image.*.title' => 'nome',
            'image.*.link' => 'tema',
            'image.*.description' => 'contacto',
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
