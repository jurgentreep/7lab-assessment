<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use JWTAuth;

use Tymon\JWTAuth\Exceptions\JWTException;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (JWTAuth::parseToken()->authenticate())
            return true;

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'summary' => 'required|max:500',
            'price' => 'required|regex:/^\d*\,\d{2}$/',
            'stock' => 'required|integer',
        ];
    }
}
