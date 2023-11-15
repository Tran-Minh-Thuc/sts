<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Provinces;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Inheric docs.
 */
class StudentsController extends Controller {

  /**
   * Inheric docs.
   */
  public function list(Request $request) {
    $students = [];
    $students_db = [];
    if ($request->name != NULL) {
      $search_box = "%" . $request->name . "%";
      $students_db = DB::select('SELECT students.*, classes.name AS class_name FROM students LEFT JOIN classes ON students.class_id = classes.id WHERE students.full_name LIKE ?;', [$search_box]);
    }
    else {
      $students_db = DB::select('SELECT students.*, classes.name AS class_name FROM students LEFT JOIN classes ON students.class_id = classes.id;');
    }
    foreach ($students_db as $student) {
      $students[] = (array) $student;
    };
    return view('students.list', compact('students'));
  }

  /**
   * Inheric docs.
   */
  public function action(Request $request) {
    if ($request->ajax()) {
      $query = $request->get('query');
      $output = '';
      if ($query != '') {
        $data = DB::table('students')
          ->where('full_name', 'LIKE', '%' . $query . '%')
          ->orWhere('student_code', 'LIKE', '%' . $query . '%')
          ->orWhere('email', 'LIKE', '%' . $query . '%')
          ->orWhere('phone_number', 'LIKE', '%' . $query . '%')
          ->get();
      }
      else {
        $data = DB::table('students')
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
                    <td>' . $row->student_code . '</td>
                    <td>' . $row->email . '</td>
                    <td>' . $row->phone_number . '</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a type="button" href="/admin/update-students/' . $row->id . '" class="btn btn-info">Chỉnh Sửa</a>
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
    $classes = Classes::all();
    return view('students.create', compact('provinces', 'classes'));
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
    $students = new Students();
    $students->student_code = $request->student_code;
    $students->account_id = $request->account_id;
    $students->class_id = $request->class_id;
    $students->full_name = $request->full_name;
    $students->image = !empty($request->image) ? (string) base64_encode(file_get_contents($request->image)) : NULL;
    $students->sex = $request->sex;
    $students->date_of_birth = $request->date_of_birth;
    $students->place_of_birth = $request->place_of_birth;
    $students->phone_number = $request->phone_number;
    $students->id_citizent = $request->id_citizent;
    $students->email = $request->email;
    $students->created_at = date('Y-m-d');
    $students->updated_at = date('Y-m-d');
    $students->save();
    return redirect('/admin/students');
  }

  /**
   * Inheric docs.
   */
  public function show(Students $students) {
  }

  /**
   * Inheric docs.
   */
  public function edit($id) {
    $students_db = DB::select('SELECT students.*, classes.name AS class_name FROM students LEFT JOIN classes ON students.class_id = classes.id WHERE students.id = ?;', [$id]);
    $student = (array) $students_db[0];
    $classes = Classes::all();
    $provinces = Provinces::all();
    return view('students.update', compact('student', 'classes', 'provinces'));
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $students = Students::find($id);
    $students->student_code = $request->student_code;
    $students->class_id = $request->class_id;
    $students->full_name = $request->full_name;
    $students->sex = $request->sex;
    if ($request->image) {
      $students->image = (string) base64_encode(file_get_contents($request->image));
    }
    $students->date_of_birth = $request->date_of_birth;
    $students->place_of_birth = $request->place_of_birth;
    $students->phone_number = $request->phone_number;
    $students->id_citizent = $request->id_citizent;
    $students->email = $request->email;
    $students->updated_at = date('Y-m-d');
    $students->save();
    return redirect('/admin/students');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id) {
    $students = Students::find($id);
    $students->delete();
    return response()->json(['success' => 'record had been delete !']);
  }

}
