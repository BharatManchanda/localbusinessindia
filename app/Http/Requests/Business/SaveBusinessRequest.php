<?php

namespace App\Http\Requests\Business;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class SaveBusinessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Change to your auth logic if needed
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array {
        return [
            'name' => 'required|string|max:255',
            // 'slug' => 'required|string|max:255|unique:businesses,slug',
            'email' => 'required|email|max:255|unique:businesses,email',
            'phone' => 'required|string|max:10',
            'category_id' => 'required|integer|exists:categories,id',
            'sub_category_id' => 'required|integer|exists:categories,id',
            'city' => 'required|string|max:255',
            'business_address' => 'required|string|max:500',
            // 'website' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'facebook_url' => 'nullable|url|max:255',
            'business_logo'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'declaration'      => 'required|in:1',
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }
}
