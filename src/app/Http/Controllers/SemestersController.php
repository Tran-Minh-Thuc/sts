<?php

namespace App\Http\Controllers;

use App\Models\Semesters;
use Illuminate\Http\Request;

/**
 * Inheric docs.
 */
class SemestersController extends Controller {
  public function index() {
    $semesters = Semesters::all()->toArray();
    return $semesters;
  }

  /**
   * Inheric docs.
   */
  public function create() {
    return 123;
    // Return view('classes.create');.
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
    $semesters = new Semesters();
    $semesters->name = $request->name;
    $semesters->year = $request->year;
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
    $semesters = Semesters::find($id);
    return $semesters;
    // Return view('semesters.update', compact('semesters'));.
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $semesters = Semesters::find($id);
    $semesters->name = $request->name;
    $semesters->year = $request->year;
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
