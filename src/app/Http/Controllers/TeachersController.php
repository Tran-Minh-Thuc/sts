<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;

/**
 * Inheric docs.
 */
class TeachersController extends Controller {

/**
   * Inheric docs.
   */
  public function index() {
    $teachers = Teachers::all()->toArray();
    return $teachers;
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
    $teachers = new Teachers();
    $teachers->teacher_code = $request->teacher_code;
    $teachers->account_id = $request->account_id;
    $teachers->full_name = $request->full_name;
    $teachers->sex = $request->sex;
    $teachers->date_of_birth = $request->date_of_birth;
    $teachers->place_of_birth = $request->place_of_birth;
    $teachers->phone_number = $request->phone_number;
    $teachers->id_citizent = $request->id_citizent;
    $teachers->email = $request->email;
    $teachers->created_at = date('Y-m-d');
    $teachers->updated_at = date('Y-m-d');
    $teachers->save();
    return redirect('/admin/teachers');
  }

  /**
   * Inheric docs.
   */
  public function show(Teachers $teachers) {
  }

  /**
   * Inheric docs.
   */
  public function edit($id) {
    $teachers = Teachers::find($id);
    return $teachers;
    // Return view('teachers.update', compact('teachers'));.
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $teachers = Teachers::find($id);
    $teachers->student_code = $request->student_code;
    $teachers->account_id = $request->account_id;
    $teachers->full_name = $request->full_name;
    $teachers->sex = $request->sex;
    $teachers->date_of_birth = $request->date_of_birth;
    $teachers->place_of_birth = $request->place_of_birth;
    $teachers->phone_number = $request->phone_number;
    $teachers->id_citizent = $request->id_citizent;
    $teachers->email = $request->email;
    $teachers->updated_at = date('Y-m-d');
    $teachers->save();
    return redirect('/admin/teachers');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id) {
    $teachers = Teachers::find($id);
    $teachers->delete();
    return redirect('/admin/teachers');
  }

}
