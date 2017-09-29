@extends('layouts.app')
@section('content')
    <form class="search" method="get" action="/user">
        {{csrf_field()}}
        {{ method_field('GET')}}
        <img class="glass" src="{{secure_asset('icons/search.svg')}}"></img>
        <input class="searchBar" type="text" name="searchBar" placeholder="Search for user name ..."/><br>
    </form>
    
    <div class="col-sm-3 col-xs-12">
        <div class="userInfo">
            @if(Auth::check())
                @if(Auth::id() == $user->id)
                @elseif(!Auth::user()->friends->contains($user))
                    <form method="POST" action="/friends">
                        {{csrf_field()}}
                        <input type="hidden" name="friendsId" value="{{$user->id}}"/>
                        <input type="image" class="addFriend" src="{{secure_asset('icons/add.svg')}}"/>
                    </form>
                @else
                    <form method="POST" action="/friends/{{$user->id}}">
                        {{csrf_field()}}
                        {{ method_field('DELETE')}}
                        <input type="image" class="addFriend" src="{{secure_asset('icons/cancel.svg')}}"/>
                    </form>
                @endif
            @endif
            <img src="{{secure_asset("$user->profileImage")}}" class="profileImage" alt="profileImage"></img><br>
            <h3>{{$user->name}}, {{$age}} years old</h3>
        </div>
        
        @if(Auth::check())
            @if(Auth::id() == $user->id)
                <form id="formUser" method="post" action="/post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    
                    <label>Title:</label>
                    <input class="formUserNameContent" type="text" name="title"/>
                    
                    <label>Privacy:</label>
                    <select class="formUserNameContent" name="privacy">
                        <option value="public">Public</option>
                        <option value="friends">Friends</option>
                        <option value="private">Private</option>
                    </select>
                    
                    <label>Image:</label>
                    <input type="file" name="image"/>
                    
                    <label>Message:</label>
                    <textarea class="formUserMessageContent" name="message" rows="4" wrap="hard"></textarea>
                    <input class="btn btn-primary" type="submit" value="Add Post">
                    
                    @if(count($errors)>0)
                        <div class="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            @endif
        @endif
    </div>
    
    <div class="col-sm-8 col-xs-12" id="posts">
        <div class="postsArea">
            @foreach ($posts as $post)
                <div class="post">
                    <img src="{{url($post->image)}}" class="postImage" alt="postImage"></img>
                    <div class="postText">
                        <div class="postHeader">
                            @foreach($users as $user)
                                @if($user->id == $post->user_id)
                                    <h5 class="postTitle"><b>{{$user->name}}:</b> {{$post->title}}</h5>
                                @endif
                            @endforeach
                            @if($post->user_id == Auth::id())
                                <div class="postEdit">
                                    <a href='/post/{{$post->id}}/edit'><img class="edit" src="{{secure_asset('icons/edit.svg')}}"></img></a>
                                    <form class="formDelete" method="POST" action="/post/{{$post->id}}">
                                        {{csrf_field()}}
                                        {{ method_field('DELETE')}}
                                        <input type="image" class="cancel" src="{{secure_asset('icons/cancel.svg')}}"/>
                                    </form>
                                </div>
                            @endif
                        </div>
                        <p class="postMessage">{{$post->message}}</p>
                        <div class="postFooter">
                            <h5 class="postDate">{{date('d F Y H:i:s', strtotime($post->created_at))}}</h5>
                            <a href="/post/{{$post->id}}" class="commentNotif">
                                <div class="commentNb">{{count($comments->whereIn('post_id', $post->id))}}</div>
                                <img class="commentIcon" src="{{secure_asset('icons/comment.svg')}}"></img>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection