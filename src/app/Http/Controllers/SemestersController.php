<?php

namespace App\Http\Controllers;

use App\Models\Semesters;
use App\Models\Students;
use App\Models\Transcripts;
use App\Models\Criterias;
use App\Models\Transcript_details;
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
    if (session("permission") == 1) {
      return view('semesters.list', compact('semesters'));
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
    if (session("permission") == 1) {
      $semesters_db = DB::table('semesters')->get();
      $semesters = [];
      foreach ($semesters_db as $value) {
        $semesters[] = (array) $value;
      }
      return view('semesters.create', compact('semesters'));
    }
    else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
    set_time_limit(12000);
    $semesters = new Semesters();
    $semesters->name = $request->name;
    $semesters->last_semester = $request->last_semester;
    $semesters->start_time = $request->start_time;
    $semesters->end_time = $request->end_time;
    $semesters->created_at = date('Y-m-d');
    $semesters->updated_at = date('Y-m-d');
    $semesters->save();
    if($semesters->save()){
      $students = DB::table('students')->get();
      foreach ($students as $student) {
      $transcripts = new Transcripts();
      $transcripts->semester_id = $semesters->id;
      $transcripts->student_id = $student->id;
      $transcripts->evaluate = NULL;
      $transcripts->total_self_score = 0;
      $transcripts->total_class_score = 0;
      $transcripts->created_at = date('Y-m-d');
      $transcripts->updated_at = date('Y-m-d');
      $transcripts->save();
      if($transcripts->save()){
        $criterias = DB::table('criterias')->get();
        foreach ($criterias as $criteria){
          $transcript_detail = new Transcript_details();
          $transcript_detail->criteria_id = $criteria->id;
          $transcript_detail->transcript_id  = $transcripts->id;
          $transcript_detail->self_score = 0;
          $transcript_detail->class_score = 0;
          $transcript_detail->save();
        }
      }
    }
    }
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
    $semesters_db = DB::table('semesters')->get();
    $semesters = [];
    foreach ($semesters_db as $value) {
      $semesters[] = (array) $value;
    }
    $semester = Semesters::find($id);
      $par_semester = (array) DB::table('semesters')->where('id','=',$semester['last_semester'])->get()[0];
    
    if (session("permission") == 1) {
      return view('semesters.update', compact('semester', 'semesters', 'par_semester'));
    }
    else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $semesters = Semesters::find($id);
    $semesters->name = $request->name;
    $semesters->last_semester = $request->last_semester;
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
    set_time_limit(12000);
    // $semesters = Semesters::find($id);
    $semesters = Semesters::where('id', $id);
    $transcripts = Transcripts::where('semester_id', $id);
    $transcripts_db = DB::table('transcripts')->where('semester_id', '=', $id)->get();

    foreach($transcripts_db as $transcript){
      $transcript_details = Transcript_details::where('transcript_id', $transcript->id);
      $transcript_details->delete();
      }
      $transcripts->delete();
      $semesters->delete();
    
    return response()->json(['success' => 'record had been delete !']);
  }

}
