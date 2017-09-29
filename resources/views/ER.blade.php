@extends('layouts.app')
@section('title')
  ER Diagram
@endsection

@section('content')
<h14>Click on the title above to go back to the home page</h14>
<h1>ER Diagram</h1>
<img src="{{secure_asset("images/ER.PNG")}}" alt="ERimage"></img>
@endsection