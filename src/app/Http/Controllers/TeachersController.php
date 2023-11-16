<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Provinces;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Inheric docs.
 */
class TeachersController extends Controller {

  /**
   * Inheric docs.
   */
  public function list(Request $request) {
    $teachers = [];
    if ($request->name != NULL) {
      $search_box = "%" . $request->name . "%";
      $teachers_search_db = DB::select('SELECT teachers.* FROM teachers WHERE teachers.full_name LIKE ?;', [$search_box]);
      foreach ($teachers_search_db as $course) {
        $teachers[] = (array) $course;
      }
    }
    else {
      $teachers = Teachers::all()->toArray();
    }
    if (session("permission") == 1) {
      return view('teachers.list', compact('teachers'));
    }
    else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function action(Request $request) {
    if ($request->ajax()) {
      $query = $request->get('query');
      $output = '';
      if ($query != '') {
        $data = DB::table('teachers')
          ->where('full_name', 'LIKE', '%' . $query . '%')
          ->orWhere('teacher_code', 'LIKE', '%' . $query . '%')
          ->orWhere('email', 'LIKE', '%' . $query . '%')
          ->orWhere('phone_number', 'LIKE', '%' . $query . '%')
          ->get();
      }
      else {
        $data = DB::table('teachers')
          ->get();
      }
      $total_row = $data->count();
      if ($total_row > 0) {
        foreach ($data as $row) {
          $output .= '
                <tr id="' . $row->id . '">
                    <td>
                    <span class="avatar avatar-online"><img src="data:image/png;base64,' . $row->image . '" alt="avatar"></span>
                    ' . $row->full_name . '
                    </td>
                    <td>' . $row->teacher_code . '</td>
                    <td>' . $row->email . '</td>
                    <td>' . $row->phone_number . '</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a type="button" href="/admin/update-teachers/' . $row->id . '" class="btn btn-info">Chỉnh Sửa</a>
                            <button type="button" value="' . $row->id . '" id="delete"  class="btn btn-danger">Xóa</button>
                        </div>
                    </td>
                </tr>';
        }
      }
      else {
        $output = '
        <tr>
            <td align="center" colspan="5">No Data Found</td>
        </tr>
        ';
      }
      $data = [
        'table_data' => $output,
      ];
      echo json_encode($data);
    }
  }

  /**
   * Inheric docs.
   */
  public function create() {
    $provinces = Provinces::all();
    if (session("permission") == 1) {
      return view('teachers.create', compact('provinces'));
    }
    else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
    $teachers = new Teachers();
    $teachers->teacher_code = $request->teacher_code;
    $teachers->account_id = $request->account_id;
    $teachers->full_name = $request->full_name;
    $teachers->sex = $request->sex;
    $teachers->image = !empty($request->image) ? (string) base64_encode(file_get_contents($request->image)) : NULL;
    $teachers->date_of_birth = $request->date_of_birth;
    $teachers->place_of_birth = $request->place_of_birth;
    $teachers->phone_number = $request->phone_number;
    $teachers->id_citizent = $request->id_citizent;
    $teachers->email = $request->email;
    $teachers->created_at = date('Y-m-d');
    $teachers->updated_at = date('Y-m-d');
    $teachers->save();
    if ($teachers->save()) {
      $account = new Accounts();
      $account->user_name = $request->teacher_code;
      $account->password = str_replace(['\'', '"', ',', ';', '<', '-'], '', $request->date_of_birth);
      $account->permission_id = 2;
      $account->status = TRUE;
      $account->created_at = date('Y-m-d');
      $account->updated_at = date('Y-m-d');
      $account->save();
      $teachers->account_id = $account->id;
      $teachers->save();

      echo "<script>alert(\"Thêm tài khoản cho giảng viên ( {{$request->full_name}} ) thành công !\")</script>";
    }
    return redirect('/admin/teachers');
  }

  /**
   * Inheric docs.
   */
  public function show(Teachers $teachers) {
  }

  /**
   * Inheric docs.
   */
  public function edit($id) {
    $teacher = Teachers::find($id);
    $provinces = Provinces::all();
    if (session("permission") == 1) {
      return view('teachers.update', compact('teacher', 'provinces'));
    }
    else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $teachers = Teachers::find($id);
    $teachers->teacher_code = $request->teacher_code;
    $teachers->account_id = $request->account_id;
    $teachers->full_name = $request->full_name;
    $teachers->sex = $request->sex;
    if ($request->image) {
      $teachers->image = (string) base64_encode(file_get_contents($request->image));
    }
    $teachers->date_of_birth = $request->date_of_birth;
    $teachers->place_of_birth = $request->place_of_birth;
    $teachers->phone_number = $request->phone_number;
    $teachers->id_citizent = $request->id_citizent;
    $teachers->email = $request->email;
    $teachers->updated_at = date('Y-m-d');
    $teachers->save();
    return redirect('/admin/teachers');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id) {
    $teachers = Teachers::find($id);
    $teachers->delete();
    return response()->json(['success' => 'record had been delete !']);
  }

}
