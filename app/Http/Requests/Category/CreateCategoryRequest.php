<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'name' => 'required|min:2|max:255|string|unique:categories,name',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'nullable'
        ];
    }

    /**
     * Custom messages for validation errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được để trống.',
            'name.min' => 'Tên phải có ít nhất 2 ký tự.',
            'name.max' => 'Tên không được quá 255 ký tự.',
            'name.unique' => 'Danh mục đã tồn tại.',
            'image.required' => 'Ảnh không được để trống.',
            'image.image' => 'File phải là định dạng hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
            'image.max' => 'Kích thước ảnh không được vượt quá 2MB.',
        ];
    }
}
