<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehicleRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'board' => 'required|string|unique:vehicles|size:7',
            'brand' => 'required|string',
            'model' => 'required|string',
            'color' => 'required|string',
            'year' => 'required|string|date_format:Y'
        ];
    }
}
