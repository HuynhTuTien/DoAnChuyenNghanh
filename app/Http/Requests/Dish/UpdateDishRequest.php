<?php

namespace App\Http\Requests\Dish;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDishRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'status' => 'required|string',
            'image' => 'nullable|image',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'category_id.required' => 'Trường ID danh mục là bắt buộc.',
            'category_id.integer' => 'Trường ID danh mục phải là số nguyên.',
            'name.required' => 'Trường tên món ăn là bắt buộc.',
            'name.string' => 'Trường tên món ăn phải là chuỗi ký tự.',
            'name.max' => 'Trường tên món ăn không được vượt quá 255 ký tự.',
            'description.string' => 'Trường mô tả món ăn phải là chuỗi ký tự.',
            'price.required' => 'Trường giá món ăn là bắt buộc.',
            'price.numeric' => 'Trường giá món ăn phải là số.',
            'price.min' => 'Trường giá món ăn không được là số âm.',
            'quantity.required' => 'Trường số lượng món ăn là bắt buộc.',
            'quantity.numeric' => 'Trường số lượng món ăn phải là số.',
            'quantity.min' => 'Trường số lượng món ăn không được là số âm.',
            'status.required' => 'Trường trạng thái món ăn là bắt buộc.',
            'status.string' => 'Trường trạng thái món ăn phải là chuỗi ký tự.',
            'image.image' => 'Trường hình ảnh món ăn phải là một hình ảnh.',
        ];
    }
}
