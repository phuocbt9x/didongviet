<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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
                'name' => 'required|min:3|unique:tbl_attribute',
                'activated' => ''
            ];
        }
        $id = request()->route()->attributeModel->id;
        return [
            'name' => 'required|min:3|unique:tbl_attribute,name,' . $id,
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
