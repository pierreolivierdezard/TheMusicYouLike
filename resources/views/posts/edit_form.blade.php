@extends('layouts.app')
@section('title')
    Post Create Form
@endsection
@section('content')
<h1>Edit Post</h1>
<form method="POST" action="/post/{{$post->id}}" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PUT')}}
    <label>Title: </label>
    <input class="formUserNameContent" type="text" name="title" value="{{ old('title') }}"/>
    @if ($errors->has('title'))
        <li class="alert">{{ $errors->first('title') }}</li>
    @endif
    
    <label>Privacy:</label>
    <select class="formUserNameContent" name="privacy">
        <option value="public">Public</option>
        <option value="friends">Friends</option>
        <option value="private">Private</option>
    </select>
    
    <label>Image:</label><br>
    <input class="input-file" type="file" name="updateImage"/><br>
    
    <p class="formUserMessage">
        <label>Message: </label>
        <textarea class="formUserMessageContent" name="message" rows="4" wrap="hard" placeholder="{{$post->message}}" value="{{ old('title') }}"></textarea>
        @if ($errors->has('message'))
            <li class="alert">{{ $errors->first('message') }}</li>
        @endif
    </p>
    <input class="btn btn-primary" type="submit" value="Update"/>
    <a class="btn btn-default" href='/'>Cancel</a>
</form>
@endsection