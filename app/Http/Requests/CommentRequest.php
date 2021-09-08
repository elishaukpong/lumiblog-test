<?php

namespace App\Http\Requests;

use App\Models\Comment;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //only allow authenticated non-admin users when the
        // comment is from the normal post show page

        if(($this->routeIs('post.comment') && $this->user())
            || $this->user()->hasRole('Admin')){
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Comment::rules;
    }
}
