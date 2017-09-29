@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form class="search" method="get" action="/user">
            {{csrf_field()}}
            {{ method_field('GET')}}
            <img class="glass" src="{{secure_asset('icons/search.svg')}}"></img>
            <input class="searchBar" type="text" name="searchBar" placeholder="Search for user name ..."/><br>
        </form>
        <div class="col-md-8 col-md-offset-2">
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
    </div>
</div>
@endsection
