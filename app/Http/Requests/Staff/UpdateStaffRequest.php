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
    public function rules(): array
    {
        $userId = $this->route('id'); // Lấy ID người dùng từ URL

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admin_staff,email,' . $userId, // Sử dụng bảng admin_staff
            'phone' => [
                'nullable',
                'regex:/^(03[89]|05[789]|07[6789]|08[89]|09[0-9])\d{7}$/',
                'unique:admin_staff,phone,' . $userId, // Chuyển thành admin_staff
            ],
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|min:6',
            'ngay_sinh' => 'nullable|date|before:today|before:-18 years',
            'can_cuoc' => ['nullable', 'regex:/^\d{12}$/', 'unique:admin_staff,can_cuoc,' . $userId], // admin_staff
            'que_quan' => 'nullable|string|max:255',
            'chuc_vu' => 'nullable|string|max:255',
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
            'email.unique' => 'Email đã được sử dụng.',
            'phone.size' => 'Số điện thoại có 10 số.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'phone.unique' => 'Số điện thoại đã được sử dụng.',
            'address.required' => 'Địa chỉ không được để trống.',
            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ cái viết hoa, một chữ cái viết thường, một số và một ký tự đặc biệt.',
            'ngay_sinh.required' => 'Ngày sinh không được để trống.',
            'ngay_sinh.date' => 'Ngày sinh không đúng định dạng.',
            'ngay_sinh.before' => 'Ngày sinh phải là ngày trong quá khứ và người dùng phải lớn hơn 18 tuổi.',
            'can_cuoc.required' => 'Căn cước công dân không được để trống.',
            'can_cuoc.regex' => 'Căn cước công dân phải có đúng 12 chữ số.',
            'can_cuoc.unique' => 'Căn cước công dân đã được sử dụng.',
            'que_quan.required' => 'Quê quán không được để trống.',
            'chuc_vu.required' => 'Chức vụ không được để trống.',
        ];
    }
}
