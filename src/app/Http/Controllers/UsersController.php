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
class UsersController extends Controller {

  /**
   * Inheric docs.
   */
  public function list() {
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
  public function create() {
    return view('user.create');
  }

  /**
   * Inheric docs.
   */
  // Public function login(Request $request) {
  //     $resultLogin = -1;
  //     $username = $request->input('username');
  //     $password = $request->input('password');
  //     $arrLogin = DB::select('select * from accounts where user_name = ?', [$username]);
  //     if ($arrLogin && $arrLogin[0]->password == $password) {
  //       session(['user_id' => $arrLogin[0]->id, 'username' => $arrLogin[0]->user_name]);
  //       $resultLogin = 1;
  //       return redirect('admin/create-criterias');
  //     }
  //     else {
  //       $resultLogin = 0;
  //     }
  //     return view('user.login', ['resultLogin' => $resultLogin]);
  //   }.

  /**
   * Inheric docs.
   */
  public function login() {
    if (session('user_info') && session('permission') == 1) {
      return redirect('admin/criterias');
    }
    if (session('user_info') && session('permission') != 1) {
      return redirect('user/news');
    }
    $error = "";
    return view('user.login', compact('error'));
  }

  /**
   * Inheric docs.
   */
  public function userLogin(Request $request) {

    session()->forget(['errors']);
    $data = $request->input();
    if (empty($data['user_name'])) {
      $errors = "<div class=\"container-login100-form-btn\"><span style=\"color: #bc27c3fa;  font-style: italic; margin-top: -25px; margin-bottom: -25px;\" class=\"txt1\">Tên người dùng không được trống</span></div>";
      $request->session()->put('errors', $errors);
      return redirect('login');
    }
    if (empty($data['password'])) {
      $errors = "<div class=\"container-login100-form-btn\"><span style=\"color: #bc27c3fa;  font-style: italic; margin-top: -25px; margin-bottom: -25px;\" class=\"txt1\">Mật khẩu không được trống</span></div>";
      $request->session()->put('errors', $errors);
      return redirect('login');
    }
    $acount_db = DB::table('accounts')
      ->where('user_name', '=', $data['user_name'])
      ->get();
    if ($acount_db->count() == 0) {
      $errors = "<div class=\"container-login100-form-btn\"><span style=\"color: #bc27c3fa;  font-style: italic; margin-top: -25px; margin-bottom: -25px;\" class=\"txt1\">Tài khoản không chính xác</span></div>";
      $request->session()->put('errors', $errors);
      return redirect('login');
    }
    elseif ($acount_db->count() == 1) {
      if ($acount_db[0]->password != $data['password']) {
        $errors = "<div class=\"container-login100-form-btn\"><span style=\"color: #bc27c3fa;  font-style: italic; margin-top: -25px; margin-bottom: -25px;\" class=\"txt1\">Mật khẩu không chính xác</span></div>";
        $request->session()->put('errors', $errors);
        return redirect('login');
      }
      elseif ($acount_db[0]->permission_id == 1) {
        $user_db = DB::table('teachers')
          ->where('account_id', '=', $acount_db[0]->id)
          ->get();
        $request->session()->put('user_info', $user_db[0]);
        $request->session()->put('permission', $acount_db[0]->permission_id);
        return redirect('admin/criterias');
      }
      elseif ($acount_db[0]->permission_id == 2) {
        $user_db = DB::table('teachers')
          ->where('account_id', '=', $acount_db[0]->id)
          ->get();
        $request->session()->put('user_info', $user_db[0]);
        $request->session()->put('permission', $acount_db[0]->permission_id);
        return redirect('user/news');
      }
      else {
        $user_db = DB::table('students')
          ->where('account_id', '=', $acount_db[0]->id)
          ->get();
        $request->session()->put('user_info', $user_db[0]);
        $request->session()->put('permission', $acount_db[0]->permission_id);
        return redirect('user/news');
      }
    }
  }

  /**
   * Inheric docs.
   */
  public function userLogout(Request $request) {
    $request->session()->flush();
    return redirect('login');
  }

  /**
   * Inheric docs.
   */
  public function rattingscore(Request $request) {
    if (session('user_info')) {
      return view('user.rattingscore');
    }
    else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function news(Request $request) {
    if (session('user_info')) {
      return view('user.news');
    }
    else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
  }

  /**
   * Inheric docs.
   */
  public function show(User $user) {
  }

  /**
   * Inheric docs.
   */
  public function edit(User $user) {
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, User $user) {
  }

  /**
   * Inheric docs.
   */
  public function destroy(User $user) {
  }

}
