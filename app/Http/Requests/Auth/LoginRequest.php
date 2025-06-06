<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
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
    public function rules(): array {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ];
    }

    public function messages() {
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Enter a valid email.',
            'email.exists' => 'This email is not registered.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
        ];
    }

    protected function failedValidation(Validator $validator) {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => $errors->first(), // send the first error message
            'errors' => $errors,           // send all errors
        ], 422));
        // throw new HttpResponseException(response()->json([
        //     'errors' => $validator->errors()
        // ], 422));
    }
}
