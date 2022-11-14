<?php

namespace App\Http\Requests\AdminRequest;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'role_id' => 'required',
                'name' => 'required|min:3',
                'gender' => 'required',
                'email' => 'required|email|unique:tbl_admin',
                'phone' => ['required', new Phone('Không đúng định dạng số điện thoại!'), 'unique:tbl_admin'],
                'password' => 'required|min:4',
                'birth' => 'required|date|before:today',
                'avatar' => 'required|image',
                'address' => '',
                'city_id' => 'required',
                'district_id' => 'required',
                'ward_id' => 'required',
                'activated' => ''
            ];
        }
        $id = request()->route()->userModel->id;
        return [
            'role_id' => 'required',
            'name' => 'required|min:3',
            'gender' => 'required',
            'email' => 'required|email|unique:tbl_admin,email,' . $id,
            'phone' => ['required', new Phone('Không đúng định dạng số điện thoại!'), 'unique:tbl_admin,phone,' . $id],
            'password' => '',
            'birth' => 'required|date|before:today',
            'avatar' => 'image',
            'address' => '',
            'city_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
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
            'date' => 'Dữ liệu trường :attribute không đúng định dạng!',
            'email' => 'Dữ liệu trường :attribute không đúng định dạng!',
            'image' => 'Dữ liệu trường :attribute không đúng định dạng!',
            'before' => 'Dữ liệu trường :attribute cần phải là trước đó!'
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

        if ($this->filled('password')) {
            $this->merge([
                'password' => bcrypt(request('password'))
            ]);
        } else {
            $this->request->remove('password');
        }
    }

    /**
     * attributes
     *
     * @return void
     */
    public function attributes()
    {
        return [
            "role_id" => 'role',
            "city_id" => 'city',
            "district_id" => 'district',
            "ward_id" => 'ward'
        ];
    }
}
