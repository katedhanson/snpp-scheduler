@extends('app')

@section('title')
Contact
@stop

@section('content')
<h1>{!! $name !!}</h1>

@if ($email)
  <div>
    email: {!! $email !!}
  </div>
@endif

@if ($phone)
  <div>
    phone: {!! $phone !!}
  </div>
@endif
@stop
