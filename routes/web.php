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

Route::get('/','PagesController@index');
Route::resources(['chat'=> 'ChatController']);



Route::post(
    '/token',
    ['uses' => 'TokenController@generate', 'as' => 'token-generate']
);
Route::get(
    '/twilio', 'TwilioChatController@index'
);
Route::post('send', 'ChatController@send');
Route::post('saveToSession', 'ChatController@saveToSession');
Route::post('getOldMessage', 'ChatController@getOldMessage');
Route::get('check', function(){
  return session('chat');
});


Route::get('/services', 'PagesController@services');
Route::resources(['posts'=>'PostsController',
                 'loads'=>'loadController',
                 'movements'=>'movementController',
                 'stops'=>'stopController']);
Route::get('/about', function(){
  return view('pages.about');
  }
);


// Route::get('/users/{id}/{name}', function($id, $name){
//   return 'This is User'.$id.' and name is '.$name;
// });
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
