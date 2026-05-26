<?php

namespace App\Http\Requests;

use App\Rules\currentPasswordMatch;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
                'name' => 'required',
                'username' => 'nullable|unique:users,username',
                'email' => 'required|unique:users,email',
                'locale' => 'nullable|string',
                'password' => ['required', 'confirmed', Rules\Password::min(8)->numbers()->symbols()->mixedCase()],
                'permissions.*' => 'required|exists:permissions,id',
                'roles.*' => 'required|exists:roles,id',
            ];
        } else {
            $rules = [
                'name' => 'required',
                'username' => 'nullable|unique:users,username,' . request()->user,
                'email' => 'required|unique:users,email,' . request()->user,
                'locale' => 'nullable|string',
                'current_password' => ['nullable', Rule::requiredIf(!is_null(request()->password)), new currentPasswordMatch()],
                'password' => ['nullable', 'confirmed', Rules\Password::min(8)->numbers()->symbols()->mixedCase()],
                'permissions.*' => 'required|exists:permissions,id',
                'roles.*' => 'required|exists:roles,id',
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
            'username' => 'sumário',
            'email' => 'email',
            'current_password' => 'senha actual',
            'password' => 'senha',
            'password_confirmation' => 'confirmar senha',
            'permissions.*' => 'permissão',
            'roles.*' => 'função',
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
