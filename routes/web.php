<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//get graph

Route::get('/graph', function () {
  return view('results/graph');
});

Route::get('/guage', function () {
  return view('results/guage');
});

Route::get('/map', function () {
  return view('results/map');
});
/*
resouce route for teachers
*/ 

Route::group(['prefix'=>'admin'],function(){

  Route::resource('teachers','TeachersController');

  Route::resource('students','StudentsController');

  Route::resource('rooms','RoomsController');
  
  Route::resource('teachers_subjects','Teachers_SubjectsController');
  
  // set subject route
  Route::Post('setroom','Teachers_SubjectsController@setRoom')->name('setRoom');
  
  Route::resource('subjects','SubjectsController');

  Route::resource('std_parents','Student_ParentController');

  Route::resource('teacherRoom','TeacherRoomController');
  
});

  Route::resource('teacherPages','TeacherPages\TeacherPagesController');
 
  Route::resource('profile','ProfileController');
  Route::resource('result_chart','ResultChartController');

Route::group(['prefix'=>'teacher'],function(){
    //redirect teacher
    Route::get('/home', function(){
      return view('teacher/home');
    });

    Route::resource('reports','ReportsController');
    Route::resource('results','ResultsController'); 

    // marks
    Route::resource('marks','EnterMarksController');

    // set subject
    // Route::get('set_sub/{id}','EnterMarksController@setSub');
    
    

 });  


//pdf routes 	
Route::get('/pdf', 'PdfController@index')->name('pdf');
Route::get('/pdf/report/{id}', 'PdfController@report');
Route::get('/pdf/{id}', 'PdfController@viewPDF');
 
 


Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin_login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'teacher'], function () {
  Route::get('/login', 'TeacherAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'TeacherAuth\LoginController@login');
  Route::post('/logout', 'TeacherAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'TeacherAuth\RegisterController@showRegistrationForm')->name('teachers_register');
  Route::post('/register', 'TeacherAuth\RegisterController@register');

  Route::post('/password/email', 'TeacherAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'TeacherAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'TeacherAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'TeacherAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'student'], function () {
  Route::get('/login', 'StudentAuth\LoginController@showLoginForm')->name('student_login');
  Route::post('/login', 'StudentAuth\LoginController@login');
  Route::post('/logout', 'StudentAuth\LoginController@logout')->name('logout');

  // Route::get('/register', 'StudentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StudentAuth\RegisterController@register');

  Route::post('/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StudentAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');
});
