<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostValidation extends FormRequest
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
            'title'  =>  'required', 
            'body'  =>  'required', 
            'image_post' =>  'required|image', 
            'category_id'  =>  'required', 
            'tags'  =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' =>  'The (Title) field is required!', 
            'body.required' =>  'The (Body) field is required!', 
            'image_post.required'    =>  'The (Image) field is required!', 
            'image_post.image'   =>  'The (Image) field must be an image!', 
            'category_id.required' =>  'The (Category) field is required', 
            'tags.required' =>  'The (Tags) field is required!'
        ];
    }
}
