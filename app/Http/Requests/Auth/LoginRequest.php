<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'national_code' => ['required', 'digits_between:10,11'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'national_code.required' => 'کد ملی الزامی است.',
            'national_code.digits_between' => 'کد ملی باید ۱۰ یا ۱۱ رقم باشد.',
            'password.required' => 'رمز عبور الزامی است.',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function credentials(): array
    {
        return $this->only('national_code', 'password');
    }
}
