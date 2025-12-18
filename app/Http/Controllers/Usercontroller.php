<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    // public function store(StoreUserRequest $request)
    // {
    //     $data = $request->validated();
    //     $data['password'] = Hash::make($data['password']);

    //     $user = User::create($data);

    //     return response()->json(['message'=>'User created Successfully','user'=>$user],201);
    // }

    public function show()
    {
        return response()->json(auth()->user()->load('data'));
    }

    public function update(UpdateUserRequest $request)
    {
        $user=auth()->user();
        $data = $request->validated();

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return response()->json(['message'=>'User updated Successfully','user'=>$user]);
    }

    public function destroy()
    {
        $user=auth()->user();
        $user->delete();
        return response()->json(['message'=>'User deleted Successfully']);
    }
}
