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
    return view('auth/login');
});


Route::resource('student', 'StudentController');

Route::get('/validar/{id}/updateAdmin', 'StudentController@updateAdmin');

Route::get('/validar/{id}/updateUser', 'StudentController@updateUser');

Route::get('/exclusao/{id}/del', 'StudentController@destroy');

Route::get('/exclusaoC/{id}/del', 'CourseController@destroy');

Route::get('/enroll/{id}', 'EnrollmentController@list');



Route::get('/student', 'EnrollmentController@index');





Route::get('/course/{id}/edit', 'CourseController@edit');



Route::resource('course', 'CourseController');

Route::resource('user', 'CourseController');

Route::view('/admin/student/index', 'student.index');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
