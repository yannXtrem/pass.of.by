<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', $this->event);
    }

    public function rules()
    {
        return [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string|min:20',
            'date' => 'sometimes|date|after:now',
            'location' => 'sometimes|string|max:255',
            'capacity' => 'sometimes|integer|min:1',
            'price' => 'sometimes|numeric|min:0',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}