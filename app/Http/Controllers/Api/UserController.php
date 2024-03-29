<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * This function creating a user.
     *
     * @param Request $request .
     * @return \Illuminate\Http\JsonResponse.
     */
    public function createUser(Request $request){
        try {
            //validation
            $validateUser = Validator::make($request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required'
                ]
            );

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ],401);
            }



            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'user created successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ],200);
        }catch (\Throwable $throwable){

            return response()->json([
                'status' => false,
                'message' => $throwable->getMessage()
            ],500);
        }

    }

    /**
     * This function creating a user.
     *
     * @param Request $request .
     * @return \Illuminate\Http\JsonResponse.
     */
    public function loginUser(Request $request){
        try {
            //validation
            $validateUser = Validator::make($request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ],401);
            }

            if(!Auth::attempt($request->only(['email','password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email or Password not match with our record.'
                ],401);
            }

            $user = User::where('email',$request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ],200);
        }catch (\Throwable $throwable){
            return response()->json([
                'status' => false,
                'message' => $throwable->getMessage()
            ],500);
        }
    }
}
