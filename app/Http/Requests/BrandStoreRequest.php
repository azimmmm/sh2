<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BrandStoreRequest extends FormRequest
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
        $id=$this->request->get('id');
        return [
            'title' => [
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('brands')->where(function ($query) use ($id) {
                    return $query->where('id', $id);
                })
//                Rule::unique('brands')->ignore($this->request->get('id'),'title'),
            ],
            'desc'=>'required',
            'photo_id'=>'required',

        ];
    }

    public function messages()
    {
        return[
            'title.required'=>' عنوان برند را وارد کنید',
            'title.unique'=>'این برند قبلا ثبت شده است',
            'desc.required'=>'توضیح برند را وارد کنید',
            'photo_id.required'=>'برای برند یک عکس انتخاب کنید',

        ];
        
    }
}
