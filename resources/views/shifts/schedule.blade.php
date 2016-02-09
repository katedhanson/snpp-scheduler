@extends('layouts.app')

@section('title')
Schedule
@stop

@section('styles')
<link rel="stylesheet" href="/css/interior.css" type="text/css" />
<link rel="stylesheet" href="/css/monthly.css" type="text/css" />
@stop

@section('scripts')
    <script type="text/javascript" src="js/monthly.js"></script>
    <script type="text/javascript">
    $(function() {
      $('#mycalendar').monthly({
        mode: 'event',
        xmlUrl: 'events.xml'
      });
    });
    </script>
@stop

@section('content')
<h1>Monthly schedule</h1>

<div class="island">
  <div class="monthly" id="mycalendar"></div>
</div>
@stop
