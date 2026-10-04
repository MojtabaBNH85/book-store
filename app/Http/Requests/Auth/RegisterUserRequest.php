<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'regex:/^09[0-9]{9}$/', 'unique:users,phone'],
            'national_code' => ['required', 'digits_between:10,11', 'unique:users,national_code'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'نام الزامی است.',
            'first_name.string' => 'نام باید متن باشد.',
            'first_name.max' => 'نام حداکثر ۵۰ کاراکتر باشد.',

            'last_name.required' => 'نام خانوادگی الزامی است.',
            'last_name.string' => 'نام خانوادگی باید متن باشد.',
            'last_name.max' => 'نام خانوادگی حداکثر ۵۰ کاراکتر باشد.',

            'phone.required' => 'شماره موبایل الزامی است.',
            'phone.regex' => 'شماره موبایل معتبر نیست (مثل 09123456789).',
            'phone.unique' => 'این شماره موبایل قبلاً ثبت شده است.',

            'national_code.required' => 'کد ملی الزامی است.',
            'national_code.digits_between' => 'کد ملی باید ۱۰ یا ۱۱ رقم باشد.',
            'national_code.unique' => 'این کد ملی قبلاً ثبت شده است.',

            'password.required' => 'رمز عبور الزامی است.',
            'password.string' => 'رمز عبور باید متن باشد.',
            'password.min' => 'رمز عبور حداقل ۸ کاراکتر باشد.',
            'password.confirmed' => 'تکرار رمز عبور با رمز عبور یکی نیست.',
        ];
    }
}
