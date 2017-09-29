@extends('layouts.master')
@section('title')
  Comments
@endsection

@section('content')
<h14>Click on the title above to go back to the home page</h14>
<h1>Comments</h1>
<div class="post">
    <img src="{{secure_asset("$post->image")}}" class="postImage" alt="postImage"></img>
     <div class="postText">
        <div class="postContent">
            <h4>{{$userPost[0]->name}} - {{$post->dateCreation}}</h4>
        </div>
        <p class="postMessage">{{$post->message}}</p>
    </div>
</div>

<form id="formUser col-xs-12" method="post" action="/add_comment_action">
   {{csrf_field()}}
   <input type="hidden" name="id" value="{{$post->id}}"/>
   <div class="formUserName col-sm-3 col-xs-12">
        <label>Name:</label>
        <input class="formUserNameContent" type="text" name="name"/>
    </div>
    <div class="formUserComment">
        <label>Comment:</label>
        <textarea class="formUserMessageContent" name="comment" rows="3" wrap="hard"></textarea>
        <input class="submit" type="submit" value="Add Comment">
    </div>
</form>

<div class="commentsArea">
    @foreach ($comments as $comment)
        @if ($comment->PostId == $post->id)
            <div class="comment">
                <label class="commentUser">{{$comment->name}}:</label>
                <span class="commentMessage">{{$comment->comment}}</span>
                <a href="{{url("delete_comment/$comment->id")}}"><img class="commentCancel" src="{{secure_asset('icons/cancel.svg')}}"></img></a>
            </div>
        @endif
    @endforeach
</div>
@endsection