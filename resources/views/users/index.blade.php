@extends('layouts.app')
@section('content')
    @if($errors)
        @foreach($errors as $error)
            <li class="alert">{{$error}}</li>
        @endforeach
    @else
        @foreach($users as $user)
            <div class="userSearch">
                @if(Auth::check())
                    @if(!$loggedUser->friends->contains($user))
                        <form method="POST" action="/friends">
                            {{csrf_field()}}
                            <input type="hidden" name="friendsId" value="{{$user->id}}"/>
                            <input type="image" class="addFriend" src="{{secure_asset('icons/add.svg')}}"/>
                        </form>
                    @endif
                @endif
                <a href="/user/{{$user->id}}"><img src="{{secure_asset("$user->profileImage")}}" class="profileImage" alt="profileImage"></img></a><br>
                <h3>{{$user->name}}, {{((date_create(str_replace('/', '-', $user->birthDate)))->diff($now))->y}} years old</h3>
            </div>
        @endforeach
    @endif
@endsection