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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('test', 'TestController@testView');


// Home Page
Route::get('/', 'Home\HomeController@showShedule');

// Authorization
//Auth::routes();
Route::get('/home', 'Users\HomeController@index')->name('home');

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::post('logout','Auth\LoginController@logout')->name('logout');
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset','Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('register','Users\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Users\RegisterController@register');

// Shedule
Route::get('shedule', 'Shedule\SheduleController@getShedule');

// Stat
Route::get('statistic/{id}', 'Stat\StatController@showUserStat')->middleware('stat_user');
Route::get('editstatistic', 'Stat\TeacherStatController@showTeacherStatForm')->middleware('is_teacher');
Route::post('editstatistic', 'Stat\TeacherStatController@redirectStatForm')->middleware('is_teacher');
Route::get('updatestatistic/student/{studentID}/lesson/{lessonID}', 'Stat\TeacherStatController@showEditStatForm')->middleware('is_teacher');
Route::post('updatestatistic/student/{studentID}/lesson/{lessonID}', 'Stat\TeacherStatController@updateStat')->middleware('is_teacher');
Route::get('updatestatistic/student/{studentID}/lesson/{lessonID}/addstatistic', 'Stat\TeacherStatController@showAddStatForm')->middleware('is_teacher');
Route::post('updatestatistic/student/{studentID}/lesson/{lessonID}/addstatistic', 'Stat\TeacherStatController@addStat')->middleware('is_teacher');
Route::get('delstatistic/{id}', 'Stat\TeacherStatController@delStat')->middleware('is_teacher');

// Request
Route::get('showrequests', 'Request\RequestController@showRequests')->middleware('parent_request');
Route::get('request', 'Request\RequestController@showSelectTeacherForm')->middleware('parent_request');
Route::post('request', 'Request\RequestController@addRequest')->middleware('parent_request');
Route::get('teacherrequests', 'Request\TeacherRequestController@showRequests')->middleware('is_teacher');
Route::post('teacherrequests', 'Request\TeacherRequestController@updateRequest')->middleware('is_teacher');

// No Permission Page
Route::get('NoPermission', function () { return view('NoPermission'); });

// Test
Route::post('test', function () {
    echo 'Test';
});
