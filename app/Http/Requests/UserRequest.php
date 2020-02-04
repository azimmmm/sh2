<?php

namespace App\Http\Requests;

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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],

            'last_name' =>['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'address' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'state' => 'required',
            'national_code' => 'required',
            'national_code' => 'required',
            'password' => ['required']


        ];
    }
    public function messages()
    {
        return [
            'first_name.required'=> 'نام خالی است.',
            'last_name.required'=> 'نام خانوادگی  خالی است.',
 'address.required'=> 'آدرس خالی است.',
 'email.required'=> 'ایمیل خالی است',
 'email.email' => 'ایمیل اشتباه است',
 'city.required'=> 'پیغام خالی است',
 'state.required'=> 'پیغام خالی است',
 ];
 }
}
