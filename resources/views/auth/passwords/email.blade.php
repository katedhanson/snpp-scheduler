@extends('layouts.app')

@section('title')
Reset password
@stop

@section('styles')
<link rel="stylesheet" href="/css/exterior.css" type="text/css" />
@stop

<!-- Main Content -->
@section('content')
<div class="island">
  @if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
  @endif

  <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
    {!! csrf_field() !!}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label class="control-label">Email</label>
      <input type="email" class="form-control" name="email" value="{{ old('email') }}">

      @if ($errors->has('email'))
      <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-default">
        Send Password Reset Link
      </button>
    </div>
  </form>
</div>
@endsection
