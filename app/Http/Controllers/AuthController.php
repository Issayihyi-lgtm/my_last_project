<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create($request->validated());
        // UserData::create([
        //     'user_id'=>$user->id,
        //     ...$request->validated()['user_data']
        // ]);
        // if ($request->has('user_data')) {
        //     UserData::create([
        //         'user_id' => $user->id,
        //         ...$request->validated('user_data',[])
        //     ]);
        // }


        $token=$user->createToken('api-token')->plainTextToken;
        return response()->json([
            'user'=>$user,
            'token'=>$token
        ],201);
    }
    public function login(LoginRequest $request){
        if(!Auth::attempt($request->validated())){
            return response()->json(['message'=>'Invalid credentials'],401);

        }
        $user=Auth::user();
        $token=$user->createToken('api-token')->plainTextToken;
        return response()->json([
            'user'=>$user,
            'token'=>$token
        ]);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message'=>'Logged out']);

    }
}
