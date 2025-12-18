<?php

namespace App\Http\Controllers;

use App\Models\FoodSuggestion;
use Illuminate\Http\Request;

class FoodSuggestionController extends Controller
{
    public function index(Request $request){
        $query=FoodSuggestion::query();

        if($request->filled('type')){
            $query->where('type',$request->type);
        }

        if ($request->filled('search')){
            $query->where('food_name','like','$'.$request->secure.'$');
        }
        return response()->json(['data'=>$query->orderBy('food_name')->get()]);
    }
    public function show($id){
        $food=FoodSuggestion::findOrFail($id);
        return response()->json(['data'=>$food]);
    }


}
