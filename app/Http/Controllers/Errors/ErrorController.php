<?php

namespace Scheduler\Http\Controllers\Errors;

use Illuminate\Http\Request;

use Scheduler\Http\Requests;
use Scheduler\Http\Controllers\Controller;

class ErrorController extends Controller
{
    public function index()
    {
      return view('errors/error');
    }
}
