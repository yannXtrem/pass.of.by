<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessPaymentRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('pay', $this->reservation);
    }

    public function rules()
    {
        return [
            'payment_method_id' => 'required|string',
        ];
    }
}