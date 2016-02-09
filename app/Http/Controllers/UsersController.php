<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\User;
use \App\Shift;
use Illuminate\Http\Request;
use Auth;
use File;
use Response;

class UsersController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  // show a directory of users, organized by role type
  public function index() {
    $managers = User::oldest('name')->isManager()->get();
    $employees = User::oldest('name')->isEmployee()->get();

    return view('users/directory', compact('managers', 'employees'));
  }

  // show a single user's contact info
  public function show($id) {
    $user = User::findOrFail($id);
    return view('users/contact', compact('user'));
  }

  public function create()
  {
    return view('users/create');
  }

  public function store(Request $request) {
    $data = $request->all();
    User::create([
        'name' => $data['name'],
        'username' => $data['username'],
        'role' => $data['role'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'color' => $data['color'],
        'password' => bcrypt($data['password']),
    ]);
    return redirect('directory');
  }
}
