<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
    //	return auth()->chech();
      //  return false;
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
	        "title"=> "required|min:5|max:256",
	        "slug"=> "max:256",
	        "description"=> "string|max:500|min:3",
	        "parent_id"=> "required|integer|exists:blog_categories,id"

        ];
    }
}
