<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     // return view('welcome');
//        return view('home');
// });

Route::view('register','register');
Route::post('/register','RestController@register');
Route::get('/logout','RestController@logout');

Route::post('/login','RestController@login');
Route::get('login',function(){
    return view('login');
});

Route::group(['middleware' => "admin"], function(){

    Route::get('/','RestController@index');
    Route::get('/list','RestController@list');
    Route::post('/add   ','RestController@add');
    Route::view('add','add');
    Route::get('/delete/{id}','RestController@delete');
    Route::post('/edit/{id}','RestController@update');
    Route::get('/edit/{id}','RestController@edit');

});
