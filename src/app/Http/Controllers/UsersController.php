<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Transcript_details;
use App\Models\Teachers;
use App\Models\User;
use Carbon\Carbon;
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
<<<<<<< HEAD
  public function userLogin(Request $request)
  {
=======
  public function userLogin(Request $request) {

>>>>>>> fbb6c117011aec8dd2f83a1509ddd751fcc6e728
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
    $msg = '';
    if (!session('user_info')) {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
    $user_transcripts = DB::table('transcripts')
      ->join('semesters', 'semesters.id', '=', 'transcripts.semester_id')
      ->where('student_id', '=', session('user_info')->id)
      ->select('transcripts.*', 'semesters.start_time', 'semesters.end_time')
      ->get();

    $trans = NULL;

    foreach ($user_transcripts as $ut) {
      $end_time = Carbon::parse($ut->start_time);
      $day_diff = $end_time->diffInDays(Carbon::now());
      if ($day_diff <= 30) {
        $trans = $ut;
        break;
      }
    }
    if ($trans) {
      $trans_detail = DB::table('transcript_details')
        ->join('criterias', 'criterias.id', '=', 'transcript_details.criteria_id')
        ->where('transcript_id', '=', $trans->id)
        ->select('transcript_details.*', 'criterias.name as name', 'criterias.max_score as max_score', 'criterias.id as criteria_db_id', 'criterias.field_level as field_level', 'criterias.parent_criteria_id as parent_criteria_id')
        ->get();
    }
    else {
      $trans_detail = [];
    }
    if (empty($trans_detail)) {
      $msg = "Hết thời hạn hoặc bạn không có quyền truy cập !";
      return view('user.rattingscore', compact('msg'));
    }
    $parents = [];
    $child_parents = [];
    $childs = [];
    foreach ($trans_detail as $td) {
      if ($td->field_level == 1) {
        $parents[] = $td;
      } elseif ($td->field_level == 2) {
        $child_parents[] = $td;
<<<<<<< HEAD
      } else {
=======
      }
      else {
>>>>>>> fbb6c117011aec8dd2f83a1509ddd751fcc6e728
        $childs[] = $td;
      }
    }
    $parent_rows = count($parents);
<<<<<<< HEAD
    return view('user.rattingscore', compact('parents', 'child_parents', 'childs', 'msg', 'parent_rows'));
=======
    return view('user.rattingscore', compact('parents', 'child_parents', 'childs', 'msg', 'parent_rows', 'trans'));
>>>>>>> fbb6c117011aec8dd2f83a1509ddd751fcc6e728
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
  public function updateUserRatings(Request $request, $id) {
    $jsonData = request()->all();
    unset($jsonData['_token']);
    unset($jsonData['_method']);
    $result = [];
    foreach ($jsonData as $key => $value) {
      preg_match('/(\d+)$/', $key, $matches);
      $id = $matches[0];
      $result[$id] = [
        "class_score" => $jsonData["class_score_" . $id],
        "self_score" => $jsonData["self_score_" . $id],
      ];
    }
    $check = 0;
    foreach ($result as $key => $value) {
      $trans_detail = Transcript_details::find($key);
      $trans_detail->class_score = $value['class_score'];
      $trans_detail->self_score = $value['self_score'];
      $trans_detail->updated_at = date('Y-m-d');
      $trans_detail->save();
      if($trans_detail->save()){
        $check = 1;
      }
      else{
        $check = 0;
        break;
      }
    }
    if($check == 1){
      return redirect('/user/news');
    }
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
