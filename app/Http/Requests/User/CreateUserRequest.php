<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => [
                'required',
                'string',
                'size:10',  // Yêu cầu độ dài 10 ký tự
                'unique:users',  // Đảm bảo số điện thoại là duy nhất
                'regex:/^(0[3|5|7|8|9])[0-9]{8}$|^(086|096|097|098|032|033|034|035|036|037|038|039|070|076|077|078|079|089|090|093|081|082|083|084|085|088|091|094|052|056|058|092|059|099|087)[0-9]{7}$/',  // Kiểm tra số điện thoại theo nhà mạng tại Việt Nam
            ],
            'address' => 'required|string|max:255',
            'role' => 'required|string|in:admin,user,staff',
            'password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/',  // Yêu cầu mật khẩu bảo mật
            'ngay_sinh' => 'required|date|before:today|before:-18 years', // Kiểm tra ngày sinh và yêu cầu lớn hơn 18 tuổi
            'can_cuoc' => ['required', 'regex:/^\d{12}$/', 'unique:users,can_cuoc'], // Kiểm tra định dạng CCCD và duy nhất
            'que_quan' => 'required|string|max:255',  // Quê quán là bắt buộc
            'chuc_vu' => 'required|string|max:255',   // Chức vụ là bắt buộc
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
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu không được ít hơn 6 ký tự.',
            'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ cái viết hoa, một chữ cái viết thường, một số và một ký tự đặc biệt.',
            'email.required' => 'Email không được để trống.',
            'email.string' => 'Email phải là một chuỗi ký tự.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'email.unique' => 'Email đã được sử dụng.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.size' => 'Số điện thoại có 10 số.',

            'phone.regex' => 'Số điện thoại không hợp lệ. Vui lòng nhập số điện thoại của một trong các nhà mạng Việt Nam.',
            'phone.unique' => 'Số điện thoại đã được sử dụng.',
            'address.required' => 'Địa chỉ không được để trống.',
            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'role.required' => 'Vai trò không được để trống.',
            'role.string' => 'Vai trò phải là một chuỗi ký tự.',
            'role.in' => 'Vai trò không hợp lệ. Chọn giữa admin, user hoặc staff.',
            'ngay_sinh.required' => 'Ngày sinh không được để trống.',
            'ngay_sinh.date' => 'Ngày sinh không đúng định dạng.',
            'ngay_sinh.before' => 'Ngày sinh phải là ngày trong quá khứ và người dùng phải lớn hơn 18 tuổi.',
            'can_cuoc.required' => 'Căn cước công dân không được để trống.',
            'can_cuoc.regex' => 'Căn cước công dân phải có đúng 12 chữ số.',
            'can_cuoc.unique' => 'Căn cước công dân đã được sử dụng.',
            'que_quan.required' => 'Quê quán không được để trống.',
            'que_quan.string' => 'Quê quán phải là một chuỗi ký tự.',
            'que_quan.max' => 'Quê quán không được vượt quá 255 ký tự.',
            'chuc_vu.required' => 'Chức vụ không được để trống.',
            'chuc_vu.string' => 'Chức vụ phải là một chuỗi ký tự.',
            'chuc_vu.max' => 'Chức vụ không được vượt quá 255 ký tự.',
        ];
    }
}
