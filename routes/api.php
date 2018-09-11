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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('test', function (Request $request) {
    print_r($request->all());
});

Route::get('data', function () {
   $arr = [
       'x1' => 'a1',
       'x2' => 'a2',
   ];

   $data = json_encode($arr);

   return $data;
});
