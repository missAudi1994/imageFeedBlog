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

//Post Routes

Route::resource('posts','PostController')->names([
 'show' => 'userposts',
 'index' => 'posts',
 'create' => 'addpost',
 'store' => 'insertpost',
 'edit' => 'editpost',
 'update' => 'updatepost',
 'destroy' => 'deletepost',
]);



//Comment Routes

Route::get('/showcomments/{id}', 'CommentController@show' )->name('comments');
Route::post('/{post}/comments', 'CommentController@store')->name('addcomment');



Route::get('/logout', function () {
    Auth::logout();
    return redirect('/posts')->with('logout_message','You have been logged out');  
})->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/',function(){
return redirect('/login');

});
