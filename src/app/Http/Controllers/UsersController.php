<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Teachers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Inheric docs.
 */
class UsersController extends Controller
{

  /**
   * Inheric docs.
   */
  public function list()
  {
    $students = Students::all()->toArray();
    $teachers = Teachers::all()->toArray();
    $all_user = [];
    $all_user[] = $students;
    $all_user[] = $teachers;
    return view('user.listuser', compact('students'));
  }

  /**
   * Inheric docs.
   */
  public function create()
  {
    return view('user.create');
  }

  public function login(Request $request)
  {
    $resultLogin = -1;
    $username = $request->input('username');
    $password = $request->input('password');
    $arrLogin = DB::select('select * from accounts where user_name = ?', [$username]);
    if ($arrLogin && $arrLogin[0]->password == $password) {
      session(['user_id' => $arrLogin[0]->id, 'username' => $arrLogin[0]->user_name]);
      $resultLogin = 1;
      return redirect('admin/create-criterias');
    } else {
      $resultLogin = 0;
    }
    return view('user.login', ['resultLogin' => $resultLogin]);
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request)
  {
  }

  /**
   * Inheric docs.
   */
  public function show(User $user)
  {
  }

  /**
   * Inheric docs.
   */
  public function edit(User $user)
  {
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, User $user)
  {
  }

  /**
   * Inheric docs.
   */
  public function destroy(User $user)
  {
  }
}
