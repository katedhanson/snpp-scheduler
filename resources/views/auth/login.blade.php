@extends('app')

@section('title')
SNPP scheduling system
@stop

@section('styles')
<link rel="stylesheet" href="/css/exterior.css" type="text/css" />
@stop

@section('content')
<div class='island'>
<h1>Springfield Nuclear Power Plant</h1>
<div>scheduling system</div>
  {!! Form::open() !!}
  <div class='form-group'>
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', '', ['class' => 'form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
  </div>

  <div class='form-group'>
    {!! Form::submit('Log in', ['class' => 'btn btn-default form-control']) !!}
  </div>

  {!! Form::close() !!}
</div>
@stop
