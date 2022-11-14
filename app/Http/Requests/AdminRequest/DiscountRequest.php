<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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

        if (request()->method() === 'POST') {
            return [
                'name' => 'required|unique:tbl_discount',
                'value' => 'required|unique:tbl_discount',
                'type' => 'required',
                'activated' => ''

            ];
        }
        $id = request()->route()->discountModel->id;
        return [
            'name' => 'required|unique:tbl_discount,name,' . $id,
            'value' => 'required|unique:tbl_discount,value,' . $id,
            'type' => 'required',
            'activated' => ''
        ];
    }

    /**
     * messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'required' => 'Trường :attribute không được bỏ trống!',
            'min' => 'Dữ liệu trường :attribute quá ngắn!',
            'unique' => 'Dữ liệu trường :attribute đã tồn tại!'
        ];
    }
}
