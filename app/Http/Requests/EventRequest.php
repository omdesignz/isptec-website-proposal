<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
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
        return [
            'title' => 'required',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'link' => 'nullable|url',
            'venue' => 'nullable|string',
            'speaker.*.full_name' => 'required',
            'speaker.*.topic' => 'nullable',
            'speaker.*.contact' => 'nullable',
            'speaker.*.bio' => 'nullable',
            'speaker.*.avatar' => 'nullable|image',
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
            'description' => 'sumário',
            'venue' => 'localização',
            'start_date' => 'início',
            'end_date' => 'fim',
            'link' => 'link',
            'speaker.*.full_name' => 'nome',
            'speaker.*.topic' => 'tema',
            'speaker.*.contact' => 'contacto',
            'speaker.*.bio' => 'bio',
            'speaker.*.avatar' => 'foto',
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
