<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    
 
 /** login api * @return \Illuminate\Http\Response */ 
 public function login(){ 
 	if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
 		{ 
 			$user = Auth::user(); 
 			$success['token'] = $user->createToken('pcm')-> accessToken; 
 			$success['status'] = 1; # working
 			return response()->json(['success' => $success], 200); } 
 			else{ 
 				return response()->json(['error'=>'Unauthorised'], 401); 
 			} 
 	} 

/* Register api * @return \Illuminate\Http\Response */ 


public function register(Request $request) { 
	$validator = Validator::make($request->all(), 
		[   'name' => 'required', 
			'email' => 'required|email', 
			'password' => 'required', 
			'confirm_password' => 'required|same:password'
		, ]); 
	if ($validator->fails()){ 
		return response()->json(['error'=>$validator->errors()], 401); 
	} 

	$input = $request->all(); 
	$input['password'] = bcrypt($input['password']); 
	$user = User::where([['email','=',$input['email']],])->count();	
	if($user > 0 ){
		return response()->json(['success'=> -1 ], 200); 
	}else{
		$user = User::create($input); 
		$success['token'] = $user->createToken('pcm')-> accessToken; 
		$success['name'] = $user->name; 
		return response()->json(['success'=>$success], 200); 

		}
	}
 }


