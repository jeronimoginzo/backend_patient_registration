<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use HTMLPurifier;
use HTMLPurifier_Config;




class RegisterPatientRequest extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:256',
            'email' => 'required|email',
            'cellphone' => 'required|string|max:128',
            'file_url' => 'required|string|max:255',
        ];
    }

    public function sanitize()
    {
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $this->merge([
            'name' => $purifier->purify($this->input('name')),
            'email' => $purifier->purify($this->input('email')),
            'cellphone' => $purifier->purify($this->input('cellphone')),
        ]);
    }

    public function messages(): array
    {
        return [
            '*.required' => 'Es necesario completar el campo ":attribute" para registrarse.',
            '*.max' => 'El campo ":attribute" no puede superar los :max caracteres.',
            '*.email' => 'El campo ":attribute" debe tener un formato válido.',
            'file_url.required' => 'Debe subir una foto de su documento para poder registrarse.',
        ];
    }
}
