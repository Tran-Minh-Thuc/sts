<?php

namespace App\Http\Controllers;

use App\Models\Semesters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Inheric docs.
 */
class SemestersController extends Controller {

  /**
   * Inheric docs.
   */
  public function list(Request $request) {
    $semesters = [];
    if ($request->name != NULL) {
      $search_box = "%" . $request->name . "%";
      $semesters_search_db = DB::select('SELECT semesters.* FROM semesters WHERE semesters.name LIKE ?;', [$search_box]);
      foreach ($semesters_search_db as $course) {
        $semesters[] = (array) $course;
      }
    }
    else {
      $semesters = Semesters::all()->toArray();
    }
    return view('semesters.list', compact('semesters'));
  }

  /**
   * Inheric docs.
   */
  public function action(Request $request) {
    if ($request->ajax()) {
      $query = $request->get('query');
      $output = '';
      if ($query != '') {
        $data = DB::table('semesters')
          ->where('name', 'LIKE', '%' . $query . '%')
          ->get();
      }
      else {
        $data = DB::table('semesters')
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
                            <a type="button" href="/admin/update-semesters/' . $row->id . '" class="btn btn-info">Chỉnh Sửa</a>
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
    return view('semesters.create');
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
    $semesters = new Semesters();
    $semesters->name = $request->name;
    $semesters->start_time = $request->start_time;
    $semesters->end_time = $request->end_time;
    $semesters->created_at = date('Y-m-d');
    $semesters->updated_at = date('Y-m-d');
    $semesters->save();
    return redirect('/admin/semesters');
  }

  /**
   * Inheric docs.
   */
  public function show(Semesters $semesters) {
  }

  /**
   * Inheric docs.
   */
  public function edit($id) {
    $semester = Semesters::find($id);
    return view('semesters.update', compact('semester'));
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $semesters = Semesters::find($id);
    $semesters->name = $request->name;
    $semesters->start_time = $request->start_time;
    $semesters->end_time = $request->end_time;
    $semesters->updated_at = date('Y-m-d');
    $semesters->save();
    return redirect('/admin/semesters');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id) {
    $semesters = Semesters::find($id);
    $semesters->delete();
    return response()->json(['success' => 'record had been delete !']);
  }

}
