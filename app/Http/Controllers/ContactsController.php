<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    public function index() {
      $name = "Charles Montgomery Burns";
      $email = "mrburns@test.net";
      $phone = "(123) 456-7890";

      return view('contact', compact('name', 'email', 'phone'));
    }
}
