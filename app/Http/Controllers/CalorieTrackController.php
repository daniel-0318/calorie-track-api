<?php

namespace App\Http\Controllers;

use App\Models\calorieTrack;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CalorieTrackController extends Controller
{
  public function index(){
    $user = Auth::user();
    return calorieTrack::where('user_id', $user->id)->latest()->paginate();
  }

  public function show($id){
    return calorieTrack::find($id);
  }

  public function store(Request $request){
    $rules = [
      "food" => "required",
      "quantity"=> "required|numeric",
      "calories"=> "required|numeric",
      "dateFood"=> "required",
    ];

    $this->validate($request,$rules);
    $user = Auth::user();

    $field['food']= $request->food;
    $field['user_id']= $user->id;
    $field['quantity']= $request->quantity;
    $field['calories']= $request->calories;
    $field['dateFood']= $request->dateFood;
    $calorieTrack = calorieTrack::create($field);
    return $calorieTrack;
  }

  public function destroy($id){

    $calorieTrack = calorieTrack::find($id);
    $calorieTrack->delete();
    return response()->json([
      'message'=>'Success'
    ], 204);
  
  }

  public function update(Request $request, $id){
    $rules = [
      "food" => "required",
      "quantity"=> "required|numeric",
      "calories"=> "required|numeric",
      "dateFood"=> "required",
    ];
    $this->validate($request,$rules);
    $calorieTrack = calorieTrack::find($id);
    $calorieTrack->update($request->all());
    return response()->json([
      'message'=>'Success'
    ], 200);
  }

}
