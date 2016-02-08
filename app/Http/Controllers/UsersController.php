<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\User;

class UsersController extends Controller
{
  // show a directory of users, organized by role type
  public function index() {
    $managers = User::oldest('name')->isManager()->get();
    $employees = User::oldest('name)->isEmployee()-get();

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
    $input = $request->all();
    User::create($input);
    return redirect('directory');
  }
}
