<?php

namespace App\Http\Requests\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class CreateCheckoutRequest extends FormRequest
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
            'phone' => ['nullable', 'regex:/^0[0-9]{9,}$/'],
            'seats' => 'required|integer|min:1',
            'reservation_date' => 'required|date',
            'reservation_time' => 'required|date_format:H:i',
            'note' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập họ tên.',
            'name.string' => 'Họ tên phải là chuỗi ký tự.',
            'name.max' => 'Họ tên không được vượt quá 255 ký tự.',
            'phone.regex' => 'Số điện thoại không hợp lệ. Số điện thoại phải bắt đầu bằng số 0 và có ít nhất 10 chữ số.',
            'seats.required' => 'Vui lòng nhập số khách.',
            'seats.integer' => 'Số khách phải là số nguyên.',
            'seats.min' => 'Số khách phải lớn hơn hoặc bằng 1.',
            'reservation_date.required' => 'Vui lòng chọn ngày.',
            'reservation_date.date' => 'Ngày không hợp lệ.',
            'reservation_time.required' => 'Vui lòng chọn giờ.',
            'reservation_time.date_format' => 'Giờ không hợp lệ. Định dạng đúng là HH:mm.',
            'note.string' => 'Lời nhắn phải là chuỗi ký tự.',
            'note.max' => 'Lời nhắn không được vượt quá 1000 ký tự.',
        ];
    }
}
