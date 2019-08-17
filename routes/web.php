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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


Route::get('/posts', 'c_post@showpost' );
Route::get('/addpost', 'c_post@addpost' )->middleware("auth") ;
Route::post('/insertpost', 'c_post@insertpost' )->middleware("auth");
Route::get('/editpost/{id}', 'c_post@editpost' )->middleware("auth");
Route::post('/updatepost/{id}', 'c_post@updatepost' )->middleware("auth");  
Route::get('/deletepost/{id}', 'c_post@deletepost' )->middleware("auth");




Route::get('/logout', function () {
    Auth::logout();
    return redirect('/posts');  // we use a special route with logout  which is redirect to redirect the user to another page instead of view
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
