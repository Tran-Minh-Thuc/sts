<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Inheric docs.
 */
class CourseController extends Controller {

  /**
   * Inheric docs.
   */
  public function index() {
    $course = Course::all()->toArray();
    return $course;
  }

  /**
   * Inheric docs.
   */
  public function list(Request $request) {
    $courses = [];
    if ($request->name != NULL) {
      $search_box = "%" . $request->name . "%";
      $courses_search_db = DB::select('SELECT courses.* FROM courses WHERE courses.name LIKE ?;', [$search_box]);
      foreach ($courses_search_db as $course) {
        $courses[] = (array) $course;
      }
    }
    else {
      $courses = Course::all()->toArray();
    }
    return view('course.list', compact('courses'));
  }

  /**
   * Inheric docs.
   */
  public function action(Request $request) {
    if ($request->ajax()) {
      $query = $request->get('query');
      $output = '';
      if ($query != '') {
        $data = DB::table('courses')
          ->where('user_name', 'LIKE', '%' . $query . '%')
          ->get();
      }
      else {
        $data = DB::table('courses')
          ->get();
      }
      $total_row = $data->count();
      if ($total_row > 0) {
        foreach ($data as $row) {
          $output .= '
                <tr id="' . $row->id . '">
                    <td>' . $row->name . '</td>
                    <td>' . $row->start_time . '</td>
                    <td>' . $row->end_time . '</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a type="button" href="/admin/update-courses/' . $row->id . '" class="btn btn-info">Chỉnh Sửa</a>
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
    return view('course/create');
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
    $course = new Course();
    $course->name = $request->name;
    $course->start_time = $request->start_time;
    $course->end_time = $request->end_time;
    $course->created_at = date('Y-m-d');
    $course->updated_at = date('Y-m-d');
    $course->save();
    return redirect('/admin/courses');
  }

  /**
   * Inheric docs.
   */
  public function show(Course $course) {
  }

  /**
   * Inheric docs.
   */
  public function edit($id) {
    $course = Course::find($id);
    return view('course.update', compact('course'));
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $course = Course::find($id);
    $course->name = $request->name;
    $course->start_time = $request->start_time;
    $course->end_time = $request->end_time;
    $course->updated_at = date('Y-m-d');
    $course->save();
    return redirect('/admin/courses');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id) {
    $course = Course::find($id);
    $course->delete();
    return response()->json(['success' => 'record had been delete !']);
  }

}
