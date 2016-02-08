@extends('app')

@section('title')
Plant Directory
@stop

@section('styles')
<link rel="stylesheet" href="/css/interior.css" type="text/css" />
@stop

@section('content')
<h1>Plant directory</h1>
<div class='island'>

  <div class="nav-links">
    <a href="schedule">Monthly schedule</a>
  </div>

  <h2>Managers</h2>
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

  <h2>Employees</h2>
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
  @endforeach
</div>
@stop
