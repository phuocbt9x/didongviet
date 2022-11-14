<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductRequest extends FormRequest
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
                'category_id' => 'required',
                'name' => 'required|min:3|unique:tbl_product',
                'stock' => 'required|numeric',
                'price' => "required|numeric",
                'image' => 'required|image',
                'description' => 'required',
                'activated' => ''
            ];
        }
        $id = request()->route()->productModel->id;
        return [
            'category_id' => 'required',
            'name' => 'required|min:3|unique:tbl_product,name,' . $id,
            'stock' => 'required|numeric',
            'price' => "required|numeric",
            'image' => 'image',
            'description' => 'required',
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
            'image' => 'Dữ liệu trường :attribute không đúng!',
            'numeric' => 'Dữ liệu trường :attribute không đúng!'
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

        if (!$this->filled('slug')) {
            $this->merge([
                'slug' => Str::slug($this->name)
            ]);
        }
    }

    public function attributes()
    {
        return [
            'category_id' => 'category'
        ];
    }

    public function validated($key = null, $default = null)
    {
        if (!$this->filled('slug')) {
            $this->merge([
                'slug' => Str::slug($this->name)
            ]);
        }
        return $this;
    }
}
