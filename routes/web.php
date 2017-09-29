<?php

use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;
use App\User;

Route::resource('post', 'PostController');
Route::resource('comment', 'CommentController');
Route::resource('user', 'UserController');
Route::resource('friends', 'FriendController');

Route::get('/', function () {
    if(Auth::check()){
        $id = Auth::id();
        return redirect("/user/$id");
    } else {
        return redirect("/home");   
    }
});

/*Display my ER diagram*/
Route::get('/ER', function(){
    return view('ER');
});

/*Display my documentation*/
Route::get('/documentation', function(){
    return view('documentation');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
