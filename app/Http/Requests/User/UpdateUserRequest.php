<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('id');

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $userId,
            'phone' => ['nullable', 'regex:/^0[0-9]{9,}$/', 'unique:users,phone,' . $userId],
            'address' => 'nullable|string|max:255',
            'role' => 'required|string|in:admin,user,staff',
            'active' => 'required|string|in:active,inactive',
            'password' => 'nullable|min:6',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'password.min' => 'Mật khẩu không được ít hơn 6 ký tự.',
            'email.required' => 'Email không được để trống.',
            'email.string' => 'Email phải là một chuỗi ký tự.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'email.unique' => 'Email đã được sử dụng.',
            'phone.unique' => 'Số điện thoại đã được sử dụng.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.string' => 'Số điện thoại phải là một chuỗi ký tự.',
            'phone.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có đúng 10 chữ số.',
            'address.required' => 'Địa chỉ không được để trống.',
            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'role.required' => 'Vai trò không được để trống.',
            'role.string' => 'Vai trò phải là một chuỗi ký tự.',
            'role.in' => 'Vai trò không hợp lệ. Chọn giữa admin hoặc user.',
            'active.required' => 'Hoạt dộng không được để trống.',
            'active.string' => 'Hoạt dộng phải là một chuỗi ký tự.',
            'active.in' => 'Hoạt dộng không hợp lệ. Chọn giữa active hoặc inactive.',
        ];
    }
}
