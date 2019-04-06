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
Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});
Route::get('nm', function (){
    event( new App\Events\NewMessage('hello'));
});

Route::get('env', function (){
   dd(env('APP_ENV'));
});

Route::get('chat', function (){
   return view('chat');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/trans', function (){
  dd(App\User::first()->notify(new App\Notifications\VerifyEmail));
});

