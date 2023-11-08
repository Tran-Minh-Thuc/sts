<?php

namespace App\Http\Controllers;

use App\Models\Notices;
use App\Models\Semesters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Inheric docs.
 */
class NoticesController extends Controller {

  /**
   * Inheric docs.
   */
  public function list() {
    $notices_db = DB::select('SELECT notices.*, semesters.name AS semester_name FROM notices LEFT JOIN semesters ON notices.semester_id = semesters.id;');
    $notices = [];
    foreach ($notices_db as $notice) {
      $notices[] = (array) $notice;
    }

    return view('notices.list', compact('notices'));
  }

  /**
   * Inheric docs.
   */
  public function create() {
    $semesters = Semesters::all()->toArray();
    return view('notices.create', compact('semesters'));
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
    $notices = new Notices();
    $notices->semester_id = $request->semester_id;
    $notices->begin_time = $request->begin_time;
    $notices->end_time = $request->end_time;
    $notices->image = !empty($request->image) ? (string) base64_encode(file_get_contents($request->image)) : NULL;
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
  public function uploadfile($file) {
  }

  /**
   * Inheric docs.
   */
  public function edit($id) {
    $notices_db = DB::select('SELECT notices.*, semesters.name AS semester_name FROM notices LEFT JOIN semesters ON notices.semester_id = semesters.id WHERE notices.id = ?;', [$id]);
    $semesters = Semesters::all()->toArray();
    $notice = (array) $notices_db[0];
    return view('notices.update', compact('notice', 'semesters'));
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $notices = Notices::find($id);
    $notices->semester_id = $request->semester_id;
    $notices->begin_time = $request->begin_time;
    $notices->end_time = $request->end_time;
    if ($request->image) {
      $notices->image = (string) base64_encode(file_get_contents($request->image));
    }
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
