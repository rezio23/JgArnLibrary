<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $categoryRule = ['required', 'integer', 'exists:categories,CategoryID'];

        return [
            'BookName' => ['required', 'string', 'max:255'],
            'CategoryID' => $categoryRule,
            'Qty' => ['required', 'integer', 'min:0'],
            'Description' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
