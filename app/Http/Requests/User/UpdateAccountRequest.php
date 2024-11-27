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
            'email' => 'required|email|max:255|unique:users,email,' . $this->route('id'), // Kiểm tra email duy nhất
            'phone' => 'nullable|string|max:20|unique:users,phone,' . $this->route('id'), // Kiểm tra số điện thoại duy nhất
            'address' => 'nullable|string|max:255',
            'ngay_sinh' => 'nullable|date|before:-18 years', // Kiểm tra người dùng phải lớn hơn 18 tuổi
            'can_cuoc' => ['nullable', 'regex:/^\d{12}$/'], // Kiểm tra định dạng căn cước công dân (CCCD)
            'que_quan' => 'nullable|string|max:255',
            'chuc_vu' => 'nullable|string|max:255',
            'current_password' => 'nullable|required_with:new_password,new_password_confirmation|current_password', // Mật khẩu cũ bắt buộc khi thay đổi mật khẩu
            'new_password' => 'nullable|string|min:8|confirmed', // Kiểm tra mật khẩu mới
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
            'email.unique' => 'Email đã được sử dụng.',
            'phone.string' => 'Số điện thoại phải là một chuỗi ký tự.',
            'phone.max' => 'Số điện thoại không được vượt quá 20 ký tự.',
            'phone.unique' => 'Số điện thoại đã được sử dụng.',
            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'ngay_sinh.date' => 'Ngày sinh không đúng định dạng.',
            'ngay_sinh.before' => 'Ngày sinh phải là trước ngày hôm nay và người dùng phải lớn hơn 18 tuổi.',
            'can_cuoc.regex' => 'Căn cước công dân phải có đúng 12 chữ số.',
            'que_quan.string' => 'Quê quán phải là một chuỗi ký tự.',
            'que_quan.max' => 'Quê quán không được vượt quá 255 ký tự.',
            'chuc_vu.string' => 'Chức vụ phải là một chuỗi ký tự.',
            'chuc_vu.max' => 'Chức vụ không được vượt quá 255 ký tự.',
            'current_password.required_with' => 'Mật khẩu cũ là bắt buộc khi mật khẩu mới được cung cấp.',
            'current_password.current_password' => 'Mật khẩu hiện tại không chính xác.',
            'new_password.min' => 'Mật khẩu mới không được ít hơn 8 ký tự.',
            'new_password.confirmed' => 'Mật khẩu mới không khớp với xác nhận mật khẩu.',
            'new_password_confirmation.min' => 'Xác nhận mật khẩu mới không được ít hơn 8 ký tự.',
        ];
    }
}
