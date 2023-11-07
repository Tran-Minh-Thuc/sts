<?php

namespace App\Http\Controllers;

use App\Models\Semesters;
use Illuminate\Http\Request;

/**
 * Inheric docs.
 */
class SemestersController extends Controller {

  /**
   * Inheric docs.
   */
  public function list() {
    $semesters = Semesters::all()->toArray();
    return view('semesters.list', compact('semesters'));
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
    return redirect('/admin/semesters');
  }

}
