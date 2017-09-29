<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DateTime;
use App\Post;
use App\User;
use App\Comment;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = new DateTime;
        $name = request()->searchBar;
        $users = User::whereRaw('name like ?', array("%$name%"))->get();
        
        $errors = [];
        if (empty($name)) {
            $errors[] = "Please enter a name";
        }
        if (empty($users[0])) {
            $errors[] = "We didn't find a user with this name";
        }
        if(Auth::check()){
            $loggedUser = Auth::user();
            return view('users.index')->with('loggedUser', $loggedUser)->with('users', $users)->with('now', $now)->with('errors', $errors);
        }else{
            return view('users.index')->with('users', $users)->with('now', $now)->with('errors', $errors);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $errorSearch = [];
        $now = new DateTime;
        $comments = Comment::all();
        $user = User::find($id);
        $users = User::all();
        if (Auth::check()) {
            $posts = Post::whereRaw('privacy ==?', 'public')->get()->sortByDesc('created_at');
            $userPosts = Post::whereRaw('user_id ==?', $user->id)->get();
            
            $friends = $user->friends;
            $friendsPosts = [];
            foreach ($friends as $friend) {
                $fposts = Post::whereRaw('user_id ==?', $friend->id)->get();
                $friendsPosts = $fposts->where('privacy', 'friends');
            }
            
            $posts = $posts->merge($userPosts)->merge($friendsPosts)->sortByDesc('created_at');
            $age = date_create(str_replace('/', '-', $user->birthDate))->diff($now)->y;
            
            return view("users.show")->with('comments', $comments)->with('posts', $posts)->with('user', $user)->with('users', $users)->with('age', $age)->with('errorSearch', $errorSearch);
        }else{
            $postsUser = Post::whereRaw('user_id ==?', $id)->get()->sortByDesc('created_at');
            $posts = $postsUser->whereIn('privacy', 'public');
            $age = date_create(str_replace('/', '-', $user->birthDate))->diff($now)->y;
            
            return view("users.show")->with('comments', $comments)->with('posts', $posts)->with('user', $user)->with('users', $users)->with('age', $age)->with('errorSearch', $errorSearch);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
