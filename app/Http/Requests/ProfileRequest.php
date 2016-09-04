<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use JWTAuth;

use Tymon\JWTAuth\Exceptions\JWTException;

class ProfileRequest extends FormRequest
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
        $user = JWTAuth::parseToken()->authenticate();
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'password' => 'required|min:6',
        ];
    }
}
