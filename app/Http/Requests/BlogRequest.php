<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cover'   => request()->isMethod('blog') ? 'required|image|mimes:png,jpg,jpeg,gif|max:2048' : 'image|mimes:png,jpg,jpeg,gif|max:2048',
            'title'   => 'required|max:255|unique:blogs,title,' . optional($this->blog)->id,
            'content' => 'required',
        ];
    }

    public function message()
    {
        return [
            'cover.required'     => 'Cover is required',
            'cover.mimes'        => 'Cover must be an image',
            'cover.max'          => 'Cover must be less than 2MB',
            'title.required'     => 'Title is required',
            'title.max'          => 'Title must be less than 255 characters',
            'title.unique'       => 'Title must be unique',
            'content.required'   => 'Content is required',
        ];
    }
}
