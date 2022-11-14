<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CouponRequest extends FormRequest
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
                'code' => 'required|min:3|unique:tbl_coupon',
                'type' => 'required',
                'value' => 'required|numeric',
                'stock' => 'required|numeric',
                'time_start' => 'required',
                'time_end' => 'required|after:time_start',
                'activated' => ''

            ];
        }
        $id = request()->route()->couponModel->id;
        return [
            'code' => 'required|min:3|unique:tbl_coupon,code,' . $id,
            'type' => 'required',
            'value' => 'required|numeric',
            'stock' => 'required|numeric',
            'time_start' => 'required',
            'time_end' => 'required|after:time_start',
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
            'unique' => 'Dữ liệu trường :attribute đã tồn tại!',
            'numeric' => 'Dữ liệu trường :attribute không đúng!',
            'after' => 'Dữ liệu trường :attribute kết thúc sau time_start!'
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if (!$this->filled('activated')) {
            $this->merge([
                'activated' => 0
            ]);
        }
        $this->merge([
            'code' => Str::upper($this->code)
        ]);
    }
}
