<?php

namespace App\Http\Controllers;

use App\Models\Transcripts;
use App\Models\Students;
use Illuminate\Support\Facades\DB;
use App\Models\Semesters;
use Illuminate\Http\Request;

/**
 * Inheric docs.
 */
class TranscriptsController extends Controller
{

  /**
   * Inheric docs.
   */
  public function list(Request $request)
  {
    $transcripts = [];
    $transcripts_db = [];
    if ($request->name != NULL) {
      $search_box = "%" . $request->name . "%";
      $transcripts_db = DB::select('SELECT transcripts.*, semesters.name AS semester_name, students.student_code AS student_code FROM transcripts LEFT JOIN semesters ON transcripts.semester_id = semesters.id LEFT JOIN students ON transcripts.student_id = students.id WHERE students.student_code LIKE ?;', [$search_box]);
    } else {
      $transcripts_db = DB::select('SELECT transcripts.*, semesters.name AS semester_name, students.student_code AS student_code FROM transcripts LEFT JOIN semesters ON transcripts.semester_id = semesters.id LEFT JOIN students ON transcripts.student_id = students.id;');
    }
    foreach ($transcripts_db as $transcript) {
      $transcripts[] = (array) $transcript;
    }
    return view('transcripts.list', compact('transcripts'));
  }

  /**
   * Inheric docs.
   */
  public function action(Request $request)
  {
    if ($request->ajax()) {
      $query = $request->get('query');
      $output = '';
      if ($query != '') {
        $data = DB::table('transcripts')
          ->join('semesters', 'semesters.id', '=', 'transcripts.semester_id')
          ->join('students', 'students.id', '=', 'transcripts.student_id')
          ->select('transcripts.*', 'students.full_name as student_name', 'students.student_code as student_code', 'semesters.name as semesters_name')
          ->where('name', 'LIKE', '%' . $query . '%')
          ->get();
      } else {
        $data = DB::table('transcripts')
          ->join('semesters', 'semesters.id', '=', 'transcripts.semester_id')
          ->join('students', 'students.id', '=', 'transcripts.student_id')
          ->select('transcripts.*', 'students.full_name as student_name', 'students.student_code as student_code', 'semesters.name as semesters_name')
          ->get();
      }
      $total_row = $data->count();
      if ($total_row > 0) {
        foreach ($data as $row) {
          $output .= '
                <tr id="' . $row->id . '">
                    <td>' . $row->semesters_name . '</td>
                    <td>' . $row->student_name . ' ' . $row->student_code . '</td>
                    <td>' . $row->total_self_score . '</td>
                    <td>' . $row->total_class_score . '</td>
                    <td>' . $row->evaluate . '</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a type="button" href="/admin/detail-transcripts/' . $row->id . '" class="btn btn-info">Chi tiết</a>
                            <button type="button" value="' . $row->id . '" id="delete"  class="btn btn-danger">Xóa</button>
                        </div>
                    </td>
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
      ];
      echo json_encode($data);
    }
  }

  /**
   * Inheric docs.
   */
  public function create()
  {
    $Semesters = Semesters::all()->toArray();
    $students = Students::all()->toArray();

    return 123;
    // return view('classes.create', compact('semesters', 'students'));
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request)
  {
    $transcripts = new Transcripts();
    $transcripts->semester_id = $request->semester_id;
    $transcripts->student_id = $request->student_id;
    $transcripts->evaluate = $request->evaluate;
    $transcripts->total_score = $request->total_score;
    $transcripts->created_at = date('Y-m-d');
    $transcripts->updated_at = date('Y-m-d');
    $transcripts->save();
    return redirect('/admin/transcripts');
  }

    /**
   * Inheric docs.
   */
  public function show($id)
  { 
    $transcripts = [];
    $transcripts_detail_db = DB::table('transcript_detail')
    ->join('criterias', 'criterias.id', '=', 'transcript_detail.criteria_id')
    ->select('transcript_detail.*',  'criterias.name as criteria_name')
    ->where('transcript_id', '=', $id)
    ->get();
    $student_info = (array) DB::table('transcripts')
    ->join('students', 'students.id', '=', 'transcripts.student_id')
    ->select('transcripts.*', 'students.full_name as student_name', 'students.student_code as student_code')
    ->where('transcripts.id', '=',(int) $id)
    ->get()[0];
    foreach ($transcripts_detail_db as $row) {
      $transcripts[] = (array) $row;
    }
    return view('transcripts.detail', compact('transcripts', 'student_info'));
  }


  /**
   * Inheric docs.
   */
  public function edit($id)
  {
    $transcripts = Transcripts::find($id);
    return $transcripts;
    // Return view('transcripts.update', compact('transcripts'));.
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id)
  {
    $transcripts = Transcripts::find($id);
    $transcripts->semester_id = $request->semester_id;
    $transcripts->student_id = $request->student_id;
    $transcripts->evaluate = $request->evaluate;
    $transcripts->total_score = $request->total_score;
    $transcripts->updated_at = date('Y-m-d');
    $transcripts->save();
    return redirect('/admin/transcripts');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id)
  {
    $transcripts = Transcripts::find($id);
    $transcripts->delete();
    return redirect('/admin/transcripts');
  }
}
