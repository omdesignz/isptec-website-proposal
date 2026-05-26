<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MediaPublicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'summary' => 'nullable|string',
            'body' => 'nullable|string',
            'published_at' => 'nullable|date',
            // 'featured_image' => 'nullable|string',
            // 'featured_image_caption' => 'nullable|string',
            'meta' => 'nullable|array',
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
            'body' => 'corpo',
            'published_at' => 'data de publicação',
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
            // 'categories' => collect(request()->categories)->pluck('id')->toArray() ?? null,
        ]);
    }
}
