<?php

namespace App\Http\Controllers;

use App\Models\Transcripts;
use App\Models\Students;
use App\Models\Semesters;
use Illuminate\Http\Request;

/**
 * Inheric docs.
 */
class TranscriptsController extends Controller {

  /**
   * Inheric docs.
   */
  public function index() {
    $transcripts = Transcripts::all()->toArray();
    return $transcripts;
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
  public function show(Transcripts $transcripts) {
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
