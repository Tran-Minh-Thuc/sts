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
class TranscriptsController extends Controller {

  /**
   * Inheric docs.
   */
  public function list(Request $request) {
    $transcripts = [];
    $transcripts_db = [];
    if ($request->name != NULL) {
      $search_box = "%" . $request->name . "%";
      $transcripts_db = DB::select('SELECT transcripts.*, semesters.name AS semester_name, students.student_code AS student_code FROM transcripts LEFT JOIN semesters ON transcripts.semester_id = semesters.id LEFT JOIN students ON transcripts.student_id = students.id WHERE students.student_code LIKE ?;', [$search_box]);
    }else{
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
  public function create() {
    $Semesters = Semesters::all()->toArray();
    $students = Students::all()->toArray();
    
    return 123;
    // return view('classes.create', compact('semesters', 'students'));
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
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
  public function show($id) {
    $transcripts_db = DB::select('SELECT transcripts.*, semesters.name AS semester_name, students.student_code AS student_code FROM transcripts LEFT JOIN semesters ON transcripts.semester_id = semesters.id LEFT JOIN students ON transcripts.student_id = students.id WHERE transcripts.id = ?;',[$id]);
    $transcripts_detail_db = DB::select('SELECT transcript_detail.*, criterias.name AS criterias_name FROM transcript_detail LEFT JOIN criterias ON transcript_detail.criteria_id = criterias.id  WHERE transcript_detail.transcript_id = ?;', [$id]);
    return view('transcripts.detail', compact(''));
  }

  /**
   * Inheric docs.
   */
  public function edit($id) {
    $transcripts = Transcripts::find($id);
    return $transcripts;
    // Return view('transcripts.update', compact('transcripts'));.
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
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
  public function destroy($id) {
    $transcripts = Transcripts::find($id);
    $transcripts->delete();
    return redirect('/admin/transcripts');
  }

}
