<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required', 'password' => 'required',
        ];
    }
    public function messages()
    {
      return [
          'email.required' => 'Le champ "Email" est obligatoire !',
          'password.required' => 'Le champ "Mot de passe" est obligatoire !',
      ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
