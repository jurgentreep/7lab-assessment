<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\ProfileRequest;

use JWTAuth;

use Tymon\JWTAuth\Exceptions\JWTException;

use Validator;

class ProfileController extends Controller
{
    /**
     * Return corrent user
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return $user;
    }

    /**
     * Update profile
     * @param  ProfileRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        $user->save();

        return $user;
    }
}
