<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => ['nullable', 'regex:/^0[0-9]{9,}$/', 'unique:users,phone'],
            'address' => 'nullable|string|max:255',
            'role' => 'required|string|in:admin,user,staff',
            'password' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu không được ít hơn 6 ký tự.',
            'email.required' => 'Email không được để trống.',
            'email.string' => 'Email phải là một chuỗi ký tự.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'email.unique' => 'Email đã được sử dụng.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.string' => 'Số điện thoại phải là một chuỗi ký tự.',
            'phone.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có đúng 10 chữ số.',
            'phone.unique' => 'Số điện thoại đã được sử dụng.',
            'address.required' => 'Địa chỉ không được để trống.',
            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'role.required' => 'Vai trò không được để trống.',
            'role.string' => 'Vai trò phải là một chuỗi ký tự.',
            'role.in' => 'Vai trò không hợp lệ. Chọn giữa admin hoặc user.',
        ];
    }
}
