<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

/**
 * Class RegisterRequest
 * @package App\Http\Requests
 *
 * Form request for handling user registration requests.
 */
class RegisterRequest extends FormRequest
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
            'userName' => ['required', 'string', 'between:2,100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', 'min:6'],
            'role' => ['required', 'integer'],
        ];
    }

    /**
     * Prepare the data for validation.
     * This method is called before the actual validation rules are applied.
     */
    protected function prepareForValidation()
    {
        // Merge the 'role' input into 'RoleID' to match the expected case
        $this->merge([
            'RoleID' => $this->has('role') ? $this->input('role') : null,
            'Username' => $this->has('userName') ? $this->input('userName') : null,
            'Email' => $this->has('email') ? $this->input('email') : null,
        ]);
    }
}
