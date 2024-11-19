<?php

namespace App\Http\Requests\Dish;

use Illuminate\Foundation\Http\FormRequest;

class CreateDishRequest extends FormRequest
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
    public function rules()
    {
        return [
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'Trường ID danh mục là bắt buộc.',
            'category_id.integer' => 'Trường ID danh mục phải là số nguyên.',
            'name.required' => 'Trường tên món ăn là bắt buộc.',
            'name.string' => 'Trường tên món ăn phải là chuỗi ký tự.',
            'name.max' => 'Trường tên món ăn không được vượt quá 255 ký tự.',
            'description.required' => 'Trường mô tả món ăn là bắt buộc.',
            'description.string' => 'Trường mô tả món ăn phải là chuỗi ký tự.',
            'price.required' => 'Trường giá món ăn là bắt buộc.',
            'price.numeric' => 'Trường giá món ăn phải là số.',
            'price.min' => 'Trường giá món ăn không được là số âm.',
            'quantity.required' => 'Trường số lượng món ăn là bắt buộc.',
            'quantity.numeric' => 'Trường số lượng món ăn phải là số.',
            'quantity.min' => 'Trường số lượng món ăn không được là số âm.',
            'image.required' => 'Trường hình ảnh món ăn là bắt buộc.',
            'image.image' => 'Trường hình ảnh món ăn phải là một hình ảnh.',
            'image.mimes' => 'Trường hình ảnh món ăn phải có định dạng: jpeg, png, jpg, gif.',
            'image.max' => 'Trường hình ảnh món ăn không được vượt quá 2048 kilobyte.',
            'status.required' => 'Trường trạng thái món ăn là bắt buộc.',
            'status.integer' => 'Trường trạng thái món ăn phải là số nguyên.',
        ];
    }
}
