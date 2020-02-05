<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

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
     * @return array
     */
    public function rules()
    {
        App::setLocale('fa');
        return [

            'first_name' => ['required', 'string', 'max:255'],

            'last_name' =>['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'address' =>['required','string'],
            'phone' => ['required'],
            'city' => 'required',
            'state' => 'required',
            'postcode' => 'required|digits:10',
            'national_code' => 'required|digits:10',
            'password' => ['required']



        ];
    }

    public function messages()
    {return[
        'first_name.required'=>'نام را وارد کنید',

    ];
        
    }

}
