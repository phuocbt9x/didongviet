<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
                'type' => 'required',
                'title' => '',
                'content' => '',
                'link' => 'nullable|url',
                'image' => 'required|image',
                'time_start' => 'required|date',
                'time_end' => 'required|date|after:time_start',
                'activated' => ''
            ];
        }
        return [
            'type' => 'required',
            'title' => '',
            'content' => '',
            'link' => 'nullable|url',
            'image' => 'image',
            'time_start' => 'required|date',
            'time_end' => 'required|date|after:time_start',
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
            'date' => 'Dữ liệu trường :attribute không đúng định dạng!',
            'url' => 'Dữ liệu trường :attribute không đúng định dạng!',
            'image' => 'Dữ liệu trường :attribute không đúng định dạng!',
            'after' => 'Dữ liệu trường :attribute cần phải là sau time start!'
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
    }
}
