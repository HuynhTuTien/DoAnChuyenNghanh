<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'nullable|string|max:255',
            'current_password' => 'nullable|required_with:new_password,new_password_confirmation|current_password',
            'new_password' => 'nullable|string|min:8|confirmed',
            'new_password_confirmation' => 'nullable|string|min:8',
        ];
    }

    /**
     * Get the custom validation messages for the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được để trống.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'phone.string' => 'Số điện thoại phải là một chuỗi ký tự.',
            'phone.max' => 'Số điện thoại không được vượt quá 20 ký tự.',
            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'current_password.required_with' => 'Mật khẩu cũ là bắt buộc khi mật khẩu mới được cung cấp.',
            'current_password.current_password' => 'Mật khẩu hiện tại không chính xác.',
            'new_password.min' => 'Mật khẩu mới không được ít hơn 8 ký tự.',
            'new_password.confirmed' => 'Mật khẩu mới không khớp với xác nhận mật khẩu.',
            'new_password_confirmation.min' => 'Xác nhận mật khẩu mới không được ít hơn 8 ký tự.',
        ];
    }
}

