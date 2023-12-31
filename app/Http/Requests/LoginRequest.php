<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 * @package App\Http\Requests
 *
 * Form request for handling user login requests.
 */
class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // The authorization logic is intentionally set to true for simplicity.
        // You may customize it based on your specific requirements and policies.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Prepare the data for validation.
     * This method is called before the actual validation rules are applied.
     */
    protected function prepareForValidation()
    {
        // Merge the 'email' input into 'Email' to match the expected case
        $this->merge([
            'Email' => $this->has('email') ? $this->input('email') : null,
        ]);
    }
}
