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

 public function addProj(Request $request){ 
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
 	 return response()->json(['error'=>$validator->errors() , 'project_id' => $project->id], 200);  
 }


 public function saveProj(Request $request){ 
 	$validator = Validator::make($request->all(), 
		[   
			'id' => 'required', 
			'name' => 'required', 
			'description' => 'required'
		]); 
	 if ($validator->fails()){ 
		return response()->json(['error'=>$validator->errors()], 401); 
	 }

 	 $inputtmp = $request->all();
     $user = Auth::user(); 

     $user_project = user_project::where([['access_id','=' ,UserAccessLevel::Owner ],['project_id' , '=' , $inputtmp['id']],['user_id' , '=' ,  $user->id]])->count();
     
     if($user_project  > 0 ){
 		 $values=array('name'=>$inputtmp['name'],'description'=>$inputtmp['description']);
 		 Project::where('id', $inputtmp['id'])->update($values);
     }

 	 return response()->json(['error'=>$validator->errors()], 200);  
 }


 public function getProject(){ 
 	 $projects = array();
 	 $user = Auth::user(); 
 	 $user_projects = user_project::where([['user_id' , '=' ,  $user->id]])->get();
     
     foreach ($user_projects as $project) {
 	 	$projects[] = project::where([['id' , '=' ,  $project->id]])->first();
 	 }

 	 return response()->json($projects, 200); 
 }  
 



}
