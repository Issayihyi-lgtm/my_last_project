<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFoodController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'food_id'=>'required|exists:food_seggestions,id',
        ]);
        $user=auth()->user();
        $user->foods()->syncWithoutDetaching([$request->food_id]);

        return response()->json(['message'=>'تمت اضافة الصنف بنجاح']);
    }
    public function index(){
        $foods= auth()->user()->foods;
        return response()->json(['data'=>$foods]);

    }

    public function destory($foodid){
        auth()->user()->foods()->detach($foodid);
        return response()->json(['message'=>'تم حذف الصنف']);
    }
}
