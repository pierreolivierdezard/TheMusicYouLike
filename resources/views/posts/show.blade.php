@extends('layouts.app')
@section('content')
    <h14>Click on the title above to go back to the home page</h14>
    <h1>Comments</h1>
    <div class="post">
        <img src="{{secure_asset("$post->image")}}" class="postImage" alt="postImage"></img>
         <div class="postText">
            <div class="postHeader">
                <h4>{{$post->title}}</h4>
            </div>
            <p class="postMessage">{{$post->message}}</p>
            <h5 class="postDate">{{date('d F Y H:i:s', strtotime($post->created_at))}}</h5>
        </div>
    </div>
    
    <form id="formUser col-xs-12" method="post" action="/comment">
       {{csrf_field()}}
       <input type="hidden" name="id" value="{{$post->id}}"/>
        <div class="formUserComment">
            <label>Comment:</label>
            <textarea class="formUserMessageContent" name="comment" rows="3" wrap="hard"></textarea>
            <input class="btn btn-primary" type="submit" value="Add Comment">
        </div>
    </form>
    @if(count($errors)>0)
        <div class="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="commentsArea">
        @foreach ($comments as $comment)
            <div class="comment">
                @foreach($users as $user)
                    @if($user->id == $comment->user_id)
                        <label class="commentUser">{{$user->name}}:</label>
                    @endif
                @endforeach
                <span class="commentMessage">{{$comment->comment}}</span>
                @if($comment->user_id == Auth::id())
                    <form class="formDelete" method="POST" action="/comment/{{$comment->id}}">
                        {{csrf_field()}}
                        {{ method_field('DELETE')}}
                        <input type="image" class="commentCancel" src="{{secure_asset('icons/cancel.svg')}}"/>
                    </form>
                @endif
            </div>
        @endforeach
        <div class="wrapper">
            {{$comments->links()}}
        </div>
    </div>
@endsection