<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Post;
use App\Comment;
use App\User;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
           'title' => 'required|max:40',
           'message' => 'required',
           'privacy' => 'required',
           'image' => 'required|image',
        ]);
        $image_store=request()->file('image')->store('posts_images','public');
        $post = new Post();
        $post->title = $request->title;
        $post->message = $request->message;
        $post->privacy = $request->privacy;
        $post->image = $image_store;
        $post->user_id = Auth::id();
        $post->save();
        return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::whereRaw('post_id = ?', $id)->paginate(6);
        $users = User::all();
        return view('posts.show')->with('post', $post)->with('comments', $comments)->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit_form')->with('post', $post);
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
        $this->validate($request, [
           'title' => 'required|max:40',
           'message' => 'required',
           'updateImage' => 'required|image',
        ]);
        $post = Post::find($id);
        $image_store=request()->file('updateImage')->store('posts_images','public');
        $post->title = $request->title;
        $post->message = $request->message;
        $post->privacy = $request->privacy;
        $post->image = $image_store;
        $post->user_id = Auth::id();
        $post->save();
        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $comments = Comment::whereRaw('post_id == ?', $id)->get();
        foreach($comments as $comment){
            $comment->delete();
        }
        $post->delete();
        return redirect("/");
    }
}
