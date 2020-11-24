<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        if ($request->method() == "GET"){
            return view("admin.auth.register");
        } else {
            $validator = Validator::make($request->all(),[
                "user_name" => "required|string|max:255|unique:users,user_name",
                "email" => "required|email|max:255|unique:users,email",
                "password" => "required|confirmed",
                "password_confirmation" => "required",
            ]);

            if ($validator->fails()){
                return response()->json(["status" => "validation","errors" => $validator->errors()]);
            }
        }
    }

    public function login(Request $request)
    {
        if ($request->method() == "GET"){
            return view("admin.auth.login");
        } else {

        }
    }
}
