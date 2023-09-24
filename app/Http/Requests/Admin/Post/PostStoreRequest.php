<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
            'summary' => 'required|max:300|min:5',
            'body' => 'required|max:2000|min:5',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif',
            'published_at' => 'required|numeric',
            'category_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:categories,id',
        ];
    }
}
