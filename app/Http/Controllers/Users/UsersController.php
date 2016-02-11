<?php

namespace Scheduler\Http\Controllers\Users;

use Scheduler\Http\Requests;
use Scheduler\Http\Controllers\Controller;
use \Scheduler\Domain\User\User;
use \Scheduler\Domain\Shift\Shift;
use Illuminate\Http\Request;
use Auth;
use File;
use Response;

class UsersController extends Controller
{
  /**
  * Every route through this controller should be authenticated
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * show a directory of users, organized by role type
  */
  public function index() {
    $managers = User::oldest('name')->isManager()->get();
    $employees = User::oldest('name')->isEmployee()->get();

    return view('users/directory', compact('managers', 'employees'));
  }

  /**
  * Given a user id, display that user's contact info
  */
  public function show($id) {
    $user = User::findOrFail($id);
    return view('users/contact', compact('user'));
  }

  /**
  * Display the form to cerate a new user
  */
  public function create()
  {
    return view('users/create');
  }

  /**
  * Process a post request, creating a new user
  *
  * Note: we don't just create using the raw request data because the password
  * needs to be encrypted
  */
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

    // after we create the user, go to the directory
    return redirect('directory');
  }
}
