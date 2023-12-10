<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

  public function show(){
    $user = Auth::user();
    return $user;
  }

  public function store(Request $request)
  {

    $rules = [
      'email' => 'required|email|unique:users,email'
    ];

    $this->validate($request,$rules);

    $userFields['name'] = strtolower($request['name']);
    $userFields['lastname'] = strtolower($request['lastname']);
    $userFields['email'] = strtolower($request['email']);
    $userFields['identificationType'] = $request['identificationType'];
    $userFields['identificationNumber'] = strtolower($request['identificationNumber']);
    $userFields['gender'] = $request['gender'];
    $userFields['geoAddress'] = $request['geoAddress'];
    $userFields['phone'] = $request['phone'];
    $userFields['photoIdFront'] = $request['photoIdFront'];
    $userFields['photoIdBack'] = $request['photoIdBack'];
    $userFields['photoFacial'] = $request['photoFacial'];
    $userFields['password'] = bcrypt($request->password);

    $user = User::create($userFields);
    return response()->json(['message' => 'Sucess'], 200);



  }

  public function update(Request $request)
  {
    $user = Auth::user();
    $user->update($request->all());
    return response()->json(['message' => 'Sucess'], 200);
  }

  public function destroy()
  {
    
  }

  public function updatePassword(Request $request){
    $user = Auth::user();
    $rules = [
      'current_password' => 'required',
      'password' => 'required|min:6',
    ];

    $this->validate($request, $rules);


    if (!Hash::check($request->input('current_password'), $user->password)) {
      return response()->json(['message' => 'La contraseña actual no coincide'], 401);
    }

    $user->password = bcrypt($request->input('password'));
    $user->save();

    return response()->json(['message' => 'Contraseña actualizada con éxito'], 200);

  }



}
