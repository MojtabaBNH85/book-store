<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->is_admin ?? false;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $bookId = $this->route('book')?->id ?? $this->route('book');

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('books', 'slug')->ignore($bookId)],
            'description' => ['nullable', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'price' => ['required', 'integer', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'cover_image' => ['nullable', 'string', 'max:255'],
            'published_at' => ['nullable', 'integer', 'digits:4', 'min:1000', 'max:2100'],
            'isbn' => ['nullable', 'string', 'max:50', Rule::unique('books', 'isbn')->ignore($bookId)],
            'is_active' => ['sometimes', 'boolean'],
            'authors' => ['nullable', 'array'],
            'authors.*' => ['exists:authors,id'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'نام کتاب الزامی است.',
            'slug.required' => 'نامک الزامی است.',
            'slug.unique' => 'این نامک قبلاً ثبت شده است.',
            'category_id.required' => 'دسته‌بندی الزامی است.',
            'category_id.exists' => 'دسته‌بندی معتبر نیست.',
            'price.required' => 'قیمت الزامی است.',
            'price.integer' => 'قیمت باید عدد صحیح (ریال) باشد.',
            'price.min' => 'قیمت نمی‌تواند منفی باشد.',
            'stock.min' => 'موجودی نمی‌تواند منفی باشد.',
            'isbn.unique' => 'این شابک قبلاً ثبت شده است.',
            'published_at.digits' => 'سال انتشار باید ۴ رقم باشد.',
        ];
    }
}
