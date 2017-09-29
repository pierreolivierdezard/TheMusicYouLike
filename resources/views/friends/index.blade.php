@extends('layouts.app')
@section('content')
    @if($friends->isEmpty())
        <h4>You don't have friends :'(</h4>
    @endif
    @foreach($friends as $friend)
        <div class="userSearch">
            <form method="POST" action="/friends/{{$friend->id}}">
                {{csrf_field()}}
                {{ method_field('DELETE')}}
                <input type="image" class="addFriend" src="{{secure_asset('icons/cancel.svg')}}"/>
            </form>
            <img src="{{secure_asset("$friend->profileImage")}}" class="profileImage" alt="profileImage"></img><br>
            <h3>{{$friend->name}}, {{((date_create(str_replace('/', '-', $friend->birthDate)))->diff($now))->y}} years old</h3>
        </div>
    @endforeach
@endsection