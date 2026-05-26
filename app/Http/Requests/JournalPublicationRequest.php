<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JournalPublicationRequest extends FormRequest
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
            'title' => 'required',
            'summary' => 'required',
            'authors' => 'required',
            'category_id' => 'required|exists:website_journal_cats,id'
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
            'title' => 'título',
            'summary' => 'sumário',
            'extra_data' => 'dados adicionais',
            'published_at' => 'publicação',
            'journal_name' => 'nome do jornal / revista',
            'authors' => 'autores',
            'reference' => 'referência',
            'lecturers' => 'docentes',
            'external_url' => 'link externo',
            'category_id' => 'categoria',
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
        ]);
    }
}
