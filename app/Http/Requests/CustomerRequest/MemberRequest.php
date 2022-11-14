<?php

namespace App\Http\Requests\CustomerRequest;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class MemberRequest extends FormRequest
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
            if (Route::getCurrentRoute()->uri() == 'login/login/login') {
                return [
                    'emailLogin' => 'required|email',
                    'passwordLogin' => 'required',
                    'remember' => ''
                ];
            }
            return [
                'email' => 'required|email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => 'Trường :attribute bắt buộc!',
            'email' => 'Trường :attribute không đúng định dạng!',
            'confirmed' => 'Trường confirm password không khớp với trường password!',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function passedValidation()
    {
        if ($this->filled('password')) {
            $this->merge([
                'password' => bcrypt(request('password'))
            ]);
        }
        if (Route::getCurrentRoute()->uri() == 'login/login/login') {
            $this->merge([
                'email' => $this->emailLogin,
                'password' => $this->passwordLogin
            ]);
        }
    }
}
