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
            '*.required' => 'The ":attribute" field is required to register.',
            '*.max' => 'The ":attribute" field cannot exceed :max characters.',
            '*.email' => 'The ":attribute" field must have a valid format.',
            'file_url.required' => 'You must upload a photo of your document to register.',

        ];
    }
}
