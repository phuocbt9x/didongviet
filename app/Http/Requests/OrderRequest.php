<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'member' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Trường này không được bỏ trống!'
        ];
    }
}
