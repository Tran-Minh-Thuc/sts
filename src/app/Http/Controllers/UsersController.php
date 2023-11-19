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

  /**
   * Inheric docs.
   */
  public function login()
  {
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
  public function userLogin(Request $request)
  {
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
    } elseif ($acount_db->count() == 1) {
      if ($acount_db[0]->password != $data['password']) {
        $errors = "<div class=\"container-login100-form-btn\"><span style=\"color: #bc27c3fa;  font-style: italic; margin-top: -25px; margin-bottom: -25px;\" class=\"txt1\">Mật khẩu không chính xác</span></div>";
        $request->session()->put('errors', $errors);
        return redirect('login');
      } elseif ($acount_db[0]->permission_id == 1) {
        $user_db = DB::table('teachers')
          ->where('account_id', '=', $acount_db[0]->id)
          ->get();
        $currentDate = now(); // Lấy ngày hiện tại

        $semesters = DB::table('semesters')
          ->where('start_time', '<', $currentDate)
          ->where('end_time', '>', $currentDate)
          ->get();
        if ($semesters) {
          $request->session()->put('semester', $semesters[0]->id);
        }
        $request->session()->put('user_info', $user_db[0]);
        $request->session()->put('permission', $acount_db[0]->permission_id);
        return redirect('admin/criterias');
      } elseif ($acount_db[0]->permission_id == 2) {
        $user_db = DB::table('teachers')
          ->where('account_id', '=', $acount_db[0]->id)
          ->get();
        $currentDate = now(); // Lấy ngày hiện tại

        $semesters = DB::table('semesters')
          ->where('start_time', '<', $currentDate)
          ->where('end_time', '>', $currentDate)
          ->get();
        if ($semesters) {
          $request->session()->put('semester', $semesters[0]->id);
        }
        $request->session()->put('user_info', $user_db[0]);
        $request->session()->put('permission', $acount_db[0]->permission_id);
        return redirect('user/news');
      } else {
        $user_db = DB::table('students')
          ->where('account_id', '=', $acount_db[0]->id)
          ->get();
        $currentDate = now(); // Lấy ngày hiện tại

        $semesters = DB::table('semesters')
          ->where('start_time', '<', $currentDate)
          ->where('end_time', '>', $currentDate)
          ->get();
        if ($semesters) {
          $request->session()->put('semester', $semesters[0]->id);
        }
        $request->session()->put('user_info', $user_db[0]);
        $request->session()->put('permission', $acount_db[0]->permission_id);
        return redirect('user/news');
      }
    }
  }

  /**
   * Inheric docs.
   */
  public function userLogout(Request $request)
  {
    $request->session()->flush();
    return redirect('login');
  }

  /**
   * Inheric docs.
   */
  public function rattingscore(Request $request)
  {

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
    } else {
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
      } else {
        $childs[] = $td;
      }
    }
    $parent_rows = count($parents);
    return view('user.rattingscore', compact('parents', 'child_parents', 'childs', 'msg', 'parent_rows', 'trans'));
  }

  /**
   * Inheric docs.
   */
  public function news(Request $request)
  {
    if (session('user_info')) {
      return view('user.news');
    } else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function updateUserRatings(Request $request, $id)
  {
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
      if ($trans_detail->save()) {
        $check = 1;
      } else {
        $check = 0;
        break;
      }
    }
    if ($check == 1) {
      return redirect('/user/news');
    }
  }

  /**
   * Inheric docs.
   */
  public function rattingClass()
  {
    if (!session('user_info')) {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
    $msg = '';
    return view('user.rattingclass', compact('msg'));
  }

  /**
   * Inheric docs.
   */
  public function action(Request $request)
  {
    if ($request->ajax()) {
      $query = $request->get('query');
      $id = $request->get('id');
      $typeName = '';
      $numId = '';
      if ($id != '') {
        $parts = explode('_', $id);
        $typeName = $parts[0];
        $numId = $parts[1];
      }
      if ($id == '') {
        $output = '';
        $header = '';
        if ($query != '') {
          $data = DB::table('classes')
            ->where('teacher_id', '=', session('user_info')->id)
            ->where('name', 'LIKE', '%' . $query . '%')
            ->get();
        } else {
          $data = DB::table('classes')->where('teacher_id', '=', session('user_info')->id)->get();
        }
        $total_row = $data->count();
        if ($total_row > 0) {
          $header = '
        <tr>
        <th>STT</th>
        <th>Tên lớp</th>
        <th>Sỉ số</th>
        <th>Đã đánh giá</th>
        <th>Hành động</th>
        </tr>';
          foreach ($data as $key => $row) {
            $num_student_class = DB::table('students')->where('class_id', '=', $row->id)->select(DB::raw('count(*) as total_student'))->get();
            $num_student_class_ratting = DB::table('students')
              ->join('transcripts', 'students.id', '=', 'transcripts.student_id')
              ->where('transcripts.evaluate', '<>', null)
              ->where('transcripts.semester_id', '=', session('semester'))
              ->where('class_id', '=', $row->id)
              ->count();
            $output .= '
          <tr>
          <td style="padding-top: 25px">' . $key + 1 . '</td>
          <td style="padding-top: 25px">' . $row->name . '</td>
          <td style="padding-top: 25px">' . $num_student_class[0]->total_student . '</td>
          <td style="padding-top: 25px">' . $num_student_class_ratting . '</td>
          <td><button type="button" value="class_' . $row->id . '" id="detail"  class="form-control border-0 py-3">Danh sách lớp</button></td>
      </tr>';
          }
        } else {
          $output = '
        <tr>
            <td align="center" colspan="5">No Data Found</td>
        </tr>
        ';
        }
        $data = [
          'table_data' => $output,
          'header' => $header,
        ];
        echo json_encode($data);
      }
      if ($typeName == 'class') {
        $output = '';
        $header = '';
        if ($query != '') {
          $data = DB::table('students')
            ->where('class_id', '=', $numId)
            ->where('full_name', 'LIKE', '%' . $query . '%')
            ->get();
        } else {
          $data = DB::table('transcripts')
            ->join('students', 'transcripts.student_id', '=', 'students.id')
            ->select('transcripts.*', 'students.full_name', 'students.student_code')
            ->where('students.class_id', '=', 1)
            ->get();;
        }
        $total_row = $data->count();
        if ($total_row > 0) {
          $header = '
        <tr>
        <th>Họ và tên</th>
        <th>Mã sinh viên</th>
        <th>Tự đánh giá</th>
        <th>Lớp đánh giá</th>
        <th>Điểm tổng kết</th>
        <th>Hành động</th>
        </tr>';
          foreach ($data as $key => $row) {
            $output .= '
          <tr>
          <td style="padding-top: 25px">' . $row->full_name . '</td>
          <td style="padding-top: 25px">' . $row->student_code . '</td>
          <td style="padding-top: 25px">' . $row->total_self_score . '</td>
          <td style="padding-top: 25px">' . $row->total_class_score .  '</td>
          <td style="padding-top: 25px">' . $row->total_score .  '</td>
          <td><button type="button" value="transcript_' . $row->id . '" id="detail"  class="form-control border-0 py-3">Xem chi tiết</button></td>
      </tr>';
          }
        } else {
          $output = '
        <tr>
            <td align="center" colspan="5">No Data Found</td>
        </tr>
        ';
        }
        $data = [
          'table_data' => $output,
          'header' => $header,
        ];
        echo json_encode($data);
      }
      if ($typeName == 'transcript') {
        $output = '';
        $header = '';
        if ($query != '') {
          $data = DB::table('transcript_details')
            ->join('criterias', 'transcript_details.criteria_id', '=', 'criterias.id')
            ->select('transcript_details.*', 'criterias.name as criteria_name')
            ->where('name', 'LIKE', '%' . $query . '%')
            ->where('transcript_details.transcript_id', '=', $numId)
            ->get();
        } else {
          $data = DB::table('transcript_details')
            ->join('criterias', 'transcript_details.criteria_id', '=', 'criterias.id')
            ->select('transcript_details.*', 'criterias.name as criteria_name', 'criterias.max_score', 'criterias.field_level', 'criterias.parent_criteria_id', 'criterias.id as criteria_id')
            ->where('transcript_details.transcript_id', '=', $numId)
            ->get();
        }
        $total_row = $data->count();
        if ($total_row > 0) {
          $header = '
          <tr>
          <th>Nội Dung Đánh Giá</th>
          <th>Điểm tối đa</th>
          <th>Điểm Sinh Viên Tự Đánh Giá</th>
          <th>Điểm lớp đánh giá</th>
          <th>Ghi Chú</th>
          </tr>';
          $parents = [];
          $child_parents = [];
          $childs = [];
          foreach ($data as $key => $row) {
            if ($row->field_level == 1) {
              $parents[] = $row;
            } elseif ($row->field_level == 2) {
              $child_parents[] = $row;
            } else {
              $childs[] = $row;
            }
          }
          foreach ($parents as $parent) {
            if ($parent->note == NULL) {
              $output .= '
                          <tr>
                          <td style="font-weight: bold ;padding-top: 25px">' . $parent->criteria_name . ':</td>
                          <td style="padding-top: 25px">' . $parent->max_score . '</td>
                          <td style="padding-top: 25px">' . $parent->self_score . '</td>
                          <td style="padding-top: 25px">' . $parent->class_score .  '</td>
                          <td style="padding-top: 25px">Sinh viên tự đánh giá</td>
                      </tr>';
            } else {
              $output .= '
                          <tr>
                          <td style="font-weight: bold ;padding-top: 25px">' . $parent->criteria_name . ':</td>
                          <td style="padding-top: 25px">' . $parent->max_score . '</td>
                          <td style="padding-top: 25px">' . $parent->self_score . '</td>
                          <td style="padding-top: 25px">' . $parent->class_score .  '</td>
                          <td style="padding-top: 25px">' . $parent->note .  '</td>
                          </tr>';
            }
            foreach ($child_parents as $child_parent) {
              if ($child_parent->parent_criteria_id == $parent->criteria_id) {
                if ($child_parent->note == NULL) {
                  $output .= '
                            <tr>
                            <td style="padding-left:30px; padding-top: 25px">' . $child_parent->criteria_name . '</td>
                            <td style="padding-top: 25px">' . $child_parent->max_score . '</td>
                            <td style="padding-top: 25px">' . $child_parent->self_score . '</td>
                            <td style="padding-top: 25px">' . $child_parent->class_score .  '</td>
                            <td style="padding-top: 25px">Sinh viên tự đánh giá</td>
                        </tr>';
                } else {
                  $output .= '
                            <tr>
                            <td style="padding-left:30px; padding-top: 25px">' . $child_parent->criteria_name . '</td>
                            <td style="padding-top: 25px">' . $child_parent->max_score . '</td>
                            <td style="padding-top: 25px">' . $child_parent->self_score . '</td>
                            <td style="padding-top: 25px">' . $child_parent->class_score .  '</td>
                            <td style="padding-top: 25px">' . $child_parent->note .  '</td>
                            </tr>';
                }
                foreach ($childs as $child) {
                  if ($child->parent_criteria_id == $child_parent->criteria_id) {
                    if ($child->note == NULL) {
                      $output .= '
                              <tr>
                              <td style="padding-left:60px; font-style: italic ;padding-top: 25px">' . $child->criteria_name . '</td>
                              <td style="padding-top: 25px">' . $child->max_score . '</td>
                              <td style="padding-top: 25px">' . $child->self_score . '</td>
                              <td style="padding-top: 25px">' . $child->class_score .  '</td>
                              <td style="padding-top: 25px">Sinh viên tự đánh giá</td>
                          </tr>';
                    } else {
                      $output .= '
                              <tr>
                              <td style="padding-left:60px; font-style: italic ;padding-top: 25px">' . $child->criteria_name . '</td>
                              <td style="padding-top: 25px">' . $child->max_score . '</td>
                              <td style="padding-top: 25px">' . $child->self_score . '</td>
                              <td style="padding-top: 25px">' . $child->class_score .  '</td>
                              <td style="padding-top: 25px">' . $child->note .  '</td>
                              </tr>';
                    }
                  }
                }
              }
            }
          }
        } else {
          $output = '
          <tr>
              <td align="center" colspan="5">No Data Found</td>
          </tr>
          ';
        }
        $data = [
          'table_data' => $output,
          'header' => $header,
        ];
        echo json_encode($data);
      }
    }
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
