<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\user_project;
use App\project;
use App\Enums\UserAccessLevel;
use Auth;

class ProjectController extends Controller
{
    //

 public function add_update(Request $request){ 

		


 	$validator = Validator::make($request->all(), 
		[   
			'name' => 'required', 
			'description' => 'required'
		]); 
	 if ($validator->fails()){ 
		return response()->json(['error'=>$validator->errors()], 401); 
	 }
     $user = Auth::user(); 
	 $inputtmp = $request->all();
	 $input['name'] = $inputtmp['name'];
	 $input['description'] = $inputtmp['description'];
	 
 	 $project = Project::create($input); 
 	 $input_project['project_id'] = $project->id;
 	 $input_project['user_id'] = $user->id;
 	 $input_project['access_id'] = UserAccessLevel::Owner;
 	 $user_project = user_project::create($input_project);  	 
 	 return response()->json(['error'=>$validator->errors()], 200); 
 }  

}
