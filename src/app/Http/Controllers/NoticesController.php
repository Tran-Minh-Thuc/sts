<?php

namespace App\Http\Controllers;

use App\Models\Notices;
use App\Models\Semesters;
use Illuminate\Http\Request;

/**
 * Inheric docs.
 */
class NoticesController extends Controller {

  /**
   * Inheric docs.
   */
  public function index() {
    $notices = Notices::all()->toArray();
    return $notices;
  }

  /**
   * Inheric docs.
   */
  public function create() {
    $semesters = Semesters::all()->toArray();
    return 123;
    // Return view('notices.create', compact('semesters'));.
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
    $notices = new Notices();
    $notices->semester_id = $request->semester_id;
    $notices->begin_time = $request->begin_time;
    $notices->end_time = $request->end_time;
    $notices->begin_register_time = $request->begin_register_time;
    $notices->end_register_time = $request->end_register_time;
    $notices->location = $request->location;
    $notices->note = $request->note;
    $notices->name = $request->name;
    $notices->type = $request->type;
    $notices->created_at = date('Y-m-d');
    $notices->updated_at = date('Y-m-d');
    $notices->save();
    return redirect('/admin/notices');
  }

  /**
   * Inheric docs.
   */
  public function show(Notices $notices) {
  }

  /**
   * Inheric docs.
   */
  public function edit($id) {
    $notices = Notices::find($id);
    return $notices;
    // Return view('notices.update', compact('notices'));.
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $notices = Notices::find($id);
    $notices->semester_id = $request->semester_id;
    $notices->begin_time = $request->begin_time;
    $notices->end_time = $request->end_time;
    $notices->begin_register_time = $request->begin_register_time;
    $notices->end_register_time = $request->end_register_time;
    $notices->location = $request->location;
    $notices->note = $request->note;
    $notices->name = $request->name;
    $notices->type = $request->type;
    $notices->created_at = date('Y-m-d');
    $notices->updated_at = date('Y-m-d');
    $notices->save();
    return redirect('/admin/notices');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id) {
    $notices = Notices::find($id);
    $notices->delete();
    return redirect('/admin/notices');
  }

}
