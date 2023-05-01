<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\helpers;
use Validator;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
         ]);

        $credentials = $request->only('email', 'password');

        if ($validator->fails()) {
            return apiResponse('Validation Error', $validator->errors()->all(), 422);

        }else{

            $user = User::where('email', $request->email)->first();
            if (!$token = $user) {

                return apiResponse("Unauthorized", $token, 401);

            }else{
                $token = Auth::attempt($credentials);

                if ($token == false) {

                    return apiResponse("Password Does Not Match", $token, 401);

                } else {
                    $user_token = [
                        'user' => $user,
                        'token' => $user->createToken('User-Token')->plainTextToken,
                    ];
                    return apiResponse("User Logged In Successfully", $user_token, 200);
                }
            }
        }
    }


    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return apiResponse('Validation Error', $validator->errors()->all(), 422);

        }else{

            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
           
            return apiResponse('Register Successfully', $user, 201);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return apiResponse('Logout Success!',null, 200);
    }



}
