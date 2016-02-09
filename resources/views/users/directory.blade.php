@extends('layouts.app')

@section('title')
Plant Directory
@stop

@section('styles')
<link rel="stylesheet" href="/css/interior.css" type="text/css" />
@stop

@section('content')
<h1>Plant directory</h1>
<div class='island'>
  <h2>Managers</h2>
  <div>
  @foreach ($managers as $user)
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
  @endforeach
</div>

  <h2>Employees</h2>
  <div>
  @foreach ($employees as $user)
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
    <div class='color-sample' style='background-color: {!! $user->color !!}; border: solid 1px black'>
      Shift color
    </div>
  @endforeach
</div>
</div>
@stop
