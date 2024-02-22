<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //get credentials from request
        $credentials = $request->only('email', 'password');

        //if auth failed
        if(!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah'
            ], 401);
        }

        $user = auth()->guard('api')->user();
    
            $role = $user->role_id; 
            if($role === 1){
                return response()->json([
                    'success' => true,
                    'user' => $user,
                    'token' => $token,
                    'message' => 'selamat datang admin',
                    'role' => $role
                ], 200);
            }elseif($role === 2){
                return response()->json([
                    'success' => true,
                    'user' => $user,
                    'token' => $token,
                    'message' => 'selamat datang user',
                    'role' => $role

                ], 200);
            }

        //if auth success
        return response()->json([
            'success' => true,
            'user'    => auth()->guard('api')->user(),    
            'token'   => $token,
            'message' => 'Selamat Datang User' 
        ], 200);
    }
}