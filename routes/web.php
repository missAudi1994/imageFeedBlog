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
Route::get('/userposts/{id}','PostController@showUserPosts')->name('userposts');

Route::get('/posts', 'PostController@showpost' )->name('posts');
Route::get('/addpost', 'PostController@addpost' )->middleware("auth")->name('addpost') ;
Route::post('/insertpost', 'PostController@insertpost' )->middleware("auth")->name('insertpost');
Route::get('/editpost/{id}', 'PostController@editpost' )->middleware("auth")->name('editpost');
Route::post('/updatepost/{id}', 'PostController@updatepost' )->middleware("auth")->name('updatepost');  
Route::get('/deletepost/{id}', 'PostController@deletepost' )->middleware("auth")->name('deletepost');



//Comment Routes
Route::get('/showcomments/{id}', 'CommentController@showComment' )->name('comments');
Route::post('/{post}/comments', 'CommentController@store')->name('addcomment');



Route::get('/logout', function () {
    Auth::logout();
    return redirect('/posts');  // we use a special route with logout  which is redirect to redirect the user to another page instead of view
})->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/',function(){
return redirect('/login');

});
