<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;

class CreateOrEditRequest extends FormRequest
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
            'parent_id' => ['nullable', 'integer', function ($attribute, $value, $fail) {
                if ($value !== 0 && !DB::table('categories')->where('id', $value)->exists()) {
                    $fail('The selected parent category does not exist.');
                }
            }],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('categories', 'slug')->ignore($this->category)],
            'icon' => ['required', 'string'],
            'status' => ['required', 'boolean'],
            'is_visible_on_home' => ['required', 'boolean'],
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }
}
