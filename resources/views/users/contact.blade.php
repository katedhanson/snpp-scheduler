@extends('app')

@section('title')
Contact
@stop

@section('styles')
<link rel="stylesheet" href="/css/interior.css" type="text/css" />
@stop

@section('content')
<h1>{!! $user->name !!}</h1>
<div class='island'>
  <h4>{!! $user->name !!}</h4>
@if ($user->email)
  <div>
    email: {!! $user->email !!}
  </div>
@endif

@if ($user->phone)
  <div>
    phone: {!! $user->phone !!}
  </div>
@endif
</div>
@stop
