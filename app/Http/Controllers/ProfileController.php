<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use JWTAuth;

use Tymon\JWTAuth\Exceptions\JWTException;

use Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return $user;
    }

    public function update(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->getMessages(), 400);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();
    }
}
