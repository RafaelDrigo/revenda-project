<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|required',
            'cpf' => 'required|unique:clients|size:11',
            'email' => 'required|unique:clients|email',
            'phone' => 'present|string|unique:clients|nullable'
        ];
    }
}
