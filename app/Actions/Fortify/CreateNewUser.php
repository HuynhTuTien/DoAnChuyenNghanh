<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array<string, string> $input
     * @return User
     */
    public function create(array $input): User
    {
        // Validate the input data
        $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'phone' => [
                'required',
                'string',
                'max:10',
                'unique:users',
                'regex:/^(0[3|5|7|8|9])[0-9]{8}$|^(086|096|097|098|032|033|034|035|036|037|038|039|070|076|077|078|079|089|090|093|081|082|083|084|085|088|091|094|052|056|058|092|059|099|087)[0-9]{7}$/',
            ],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ], $this->messages()); // Gọi hàm messages() để truyền thông báo lỗi tiếng Việt

        if ($validator->fails()) {
            // Xử lý thông báo lỗi tại đây mà không trả về RedirectResponse
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        // Tạo người dùng mới và trả về đối tượng User
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone' => $input['phone'],
        ]);
    }

    /**
     * Custom validation messages in Vietnamese.
     *
     * @return array
     */
    protected function messages()
    {
        return [
            'required' => ':attribute là bắt buộc.',
            'string' => ':attribute phải là một chuỗi.',
            'max' => ':attribute không được vượt quá :max ký tự.',
            'unique' => ':attribute đã tồn tại trong hệ thống.',
            'regex' => ':attribute không hợp lệ.',
            'email' => ':attribute phải là một địa chỉ email hợp lệ.',
            'accepted' => ':attribute phải được chấp nhận.',
            // Các thông báo lỗi khác cho các trường bạn cần
            'attributes' => [
                'name' => 'Tên',
                'email' => 'Email',
                'password' => 'Mật khẩu',
                'phone' => 'Số điện thoại',
                'terms' => 'Điều khoản',
            ],
        ];
    }
}
