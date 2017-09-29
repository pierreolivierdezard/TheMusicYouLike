<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $id = Auth::id();
            return redirect("/user/$id");
        } else {
            $comments = Comment::all();
            $posts = Post::whereRaw('privacy ==?', 'public')->get()->sortByDesc('created_at');
            $users = User::all();
            return view('home')->with('posts', $posts)->with('users', $users)->with('comments', $comments);
        }
    }
}
