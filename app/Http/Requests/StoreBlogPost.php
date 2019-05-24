<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
        return [
            'brand_name' => 'required|unique:brand|max:10',
            'brand_logo' => 'required',
            'brand_url' => 'required',
            'brand_desc' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'brand_name.required'=>'品牌名不能为空',
            'brand_name.unique'=>'品牌名已经拥有',
            'brand_name.max'=>'品牌名最大长度为10',
            'brand_logo.required'=>'logo不能为空',
            'brand_url.required'=>'品牌网址不能为空',
            'brand_desc.required'=>'品牌介绍不能为空',
        ];
    }
}
