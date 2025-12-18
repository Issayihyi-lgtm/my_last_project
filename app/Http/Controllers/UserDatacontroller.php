<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserDataRequest;
use App\Http\Requests\UpdateUserDataRequest;
use App\Models\User;


class UserDataController extends Controller
{
    // public function store(StoreUserDataRequest $request)
    // {
    //     $user=auth()->user();
    //     if($user->data){
    //         return response()->json([
    //             'message'=>'User data already exists'
    //         ],409);
    //     }
    //     $userData = $user->data()->create($request->validated());
    //     return response()->json(['message'=>'User data created successfully','data'=>$userData],201);
    // }
    public function store(StoreUserDataRequest $request){
    $user = auth()->user();

    // تحقق إذا عنده بيانات مسبقاً
    if ($user->data()->exists()) {
        return response()->json([
            'message' => 'User data already exists'
        ], 409);
    }

    // إنشاء بيانات جديدة
    $userData = $user->data()->create($request->validated());

    return response()->json([
        'message' => 'User data created successfully',
        'data'    => $userData
    ], 201);
    }

    public function show()
    {
        return response()->json(auth()->user()->date);
    }

    public function update(UpdateUserDataRequest $request)
    {
        $user=auth()->user();
        $user->data->update($request->validated());
        return response()->json(['message'=>'User data updated Successfully','data'=>$user->data]);
    }

    public function destroy()
    {
        $user=auth()->user();
        $user->data->delete();
        return response()->json(['message'=>'User data deleted Successfully']);
    }
}
