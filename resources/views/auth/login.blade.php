@extends('layouts.app')

@section('title')
SNPP scheduling system
@stop

@section('styles')
<link rel="stylesheet" href="/css/exterior.css" type="text/css" />
@stop

@section('content')
<div class="island">
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
    {!! csrf_field() !!}

    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
      <label class="control-label">Username</label>
      <input type="username" class="form-control" name="username" value="{{ old('username') }}">

      @if ($errors->has('username'))
      <span class="help-block">
        <strong>{{ $errors->first('username') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <label class="control-label">Password</label>
      <input type="password" class="form-control" name="password">

      @if ($errors->has('password'))
      <span class="help-block">
        <strong>{{ $errors->first('password') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-default">
        Login
      </button>
    </div>
    <div class="form-group">
      <a class="form-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
    </div>
  </div>
</form>
</div>
@endsection
