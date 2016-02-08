<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShiftController extends Controller
{
  public function create() {
    return view('shift/create');
  }

  public function edit() {
    return view('shift/edit');
  }
}
