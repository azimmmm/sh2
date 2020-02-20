<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
    protected function prepareForValidation()
    {
        if($this->input('slug')){
            $this->merge(['slug'=>make_slug($this->input('slug'))]);
        }else{
            $this->merge(['slug'=>make_slug($this->input('title'))]);

        }
    }
    public function rules()
    {
        return [
            'title'=>'required',
            'category_id'=>'required',
            'status'=>'required',
//            'slug'=>Rule::unique('products')->ignore(request()->product)
            'brand_id'=>'required',
            'price'=>'required',

        ];
    }

    public function messages()
    {
        return[
            'category_id.required'=>' عنوان دسته را وارد کنید.',
            'brand_id.required'=>' عنوان برند را وارد کنید.',
//            'slug.unique' => 'این نام مستعار قبلا استفاده شده',
            'price.required'=>' قیمت را وارد کنید.',
        ];

    }
}
