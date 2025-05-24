<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('comment', $this->event);
    }

    public function rules()
    {
        return [
            'content' => 'required|string|min:10|max:500',
            'rating' => 'required|integer|between:1,5',
        ];
    }
}