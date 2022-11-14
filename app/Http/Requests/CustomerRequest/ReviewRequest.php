<?php

namespace App\Http\Requests\CustomerRequest;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'star' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
            'product_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Trường :attribute bắt buộc!',
            'email' => 'Trường :attribute không đúng định dạng email!'
        ];
    }
}
