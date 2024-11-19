<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStaffRequest extends FormRequest
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
        $id = $this->route('id'); // Lấy ID của bản ghi từ route

        return [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => ['required', 'regex:/^0[0-9]{9,}$/', 'unique:staffs,phone,' . $id],
            'address' => 'required|string|max:255',
            'position' => 'required|string|max:100',
            'salary' => 'required|numeric|min:0'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên là trường bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            
            'image.image' => 'Tệp phải là một hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2048 KB.',
            
            'phone.required' => 'Số điện thoại là trường bắt buộc.',
            'phone.string' => 'Số điện thoại phải là một chuỗi ký tự.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'phone.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
            'phone.unique' => 'Số điện thoại đã tồn tại.',
            
            'address.required' => 'Địa chỉ là trường bắt buộc.',
            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            
            'position.required' => 'Chức vụ là trường bắt buộc.',
            'position.string' => 'Chức vụ phải là một chuỗi ký tự.',
            'position.max' => 'Chức vụ không được vượt quá 100 ký tự.',
            
            'salary.required' => 'Lương là trường bắt buộc.',
            'salary.numeric' => 'Lương phải là một số.',
            'salary.min' => 'Lương phải lớn hơn hoặc bằng 0.'
        ];
    }
}
