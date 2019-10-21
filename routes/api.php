<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware('auth:api')->group(function () {

      Route::post('project', 'ProjectController@add_update');

       Route::get('project', 'ProjectController@get_proj');
   




/*    Route::post('activate', 'PassportController@activate')->middleware('log');
    
    
    Route::get('user', 'PassportController@details')->middleware('log');
    Route::get('user_admin', 'PassportController@admin_details')->middleware('log');
    Route::post('lockaccount', 'PassportController@lockaccount')->middleware('log');
    Route::post('deleteaccount', 'PassportController@deleteaccount')->middleware('log');
  
    Route::post('set_tfa', 'UserController@set_tfa')->middleware('log');
  
    
    
    
    Route::get('GetPendingAppointments', 'UserController@doc_appts_pending')->middleware('log');
    Route::get('GetAppointments', 'UserController@doc_appts')->middleware('log');
    Route::get('timer_period_func/{id}', 'UserController@timer_period_func')->middleware('log');
    Route::get('timer_period_func_doc/{id}', 'UserController@timer_period_func_doc')->middleware('log');
    
    
    
    Route::get('GetAppointment/{id}', 'UserController@get_appt')->middleware('log');
    Route::get('get_dashboard', 'UserController@get_statistics')->middleware('log');
    //Route::resource('appointments', 'AppointmentsController')->middleware('log');
    Route::get('logout', 'PassportController@logout')->middleware('log');    
    Route::post('SetAppointment', 'UserController@set_appts')->middleware('log');
    Route::post('StartAppointment', 'UserController@start_appts')->middleware('log');
    Route::post('PauseAppointment', 'UserController@pause_appts')->middleware('log');
  
    
    
    
    
    Route::post('ConfirmAppointment', 'UserController@confirm_appt')->middleware('log');
    Route::post('AddNotes', 'UserController@add_notes')->middleware('log');
    Route::post('create_session', 'UserController@initialize_video_session')->middleware('log');
    Route::post('download_notes', 'UserController@download_notes')->middleware('log');  
    
    Route::get('check_notifications', 'UserController@check_notifications')->middleware('log');    
    Route::post('uploadfile/{id}', 'UserController@uploadfile')->middleware('log');
    Route::get('get_uploads/{id}', 'UserController@get_uploads')->middleware('log'); 
    Route::get('del_file/{id}', 'UserController@del_file')->middleware('log'); 
    
    //CRONOFY
    
      
      Route::get('cronofy_auth', 'UserController@cronofy_auth')->middleware('log'); 
      Route::get('get_token/{id}', 'UserController@get_token')->middleware('log'); 
      Route::get('list_calanders', 'UserController@list_calanders')->middleware('log'); 
      Route::get('read_calander_events', 'UserController@read_calander_events')->middleware('log'); 
      Route::get('revoke_profile/{id}', 'UserController@revoke_profile')->middleware('log'); 
      
      
      Route::get('Getusers', 'UserController@Getusers')->middleware('log'); 
      Route::get('payments', 'UserController@payments')->middleware('log'); 
 //RESET
   Route::post('resetpass', 'PassportController@resetpass')->middleware('log'); 
   
   //CHAT
      Route::post('save_chat_doc', 'AppointmentsController@save_chat_doc')->middleware('log');  
      Route::get('get_chat_doc/{id}', 'AppointmentsController@get_chat_doc')->middleware('log'); 
     */ 
});
