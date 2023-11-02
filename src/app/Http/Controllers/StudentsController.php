<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

/**
 * Inheric docs.
 */
class StudentsController extends Controller {

   /**
   * Inheric docs.
   */
  public function index() {
    $students = Students::all()->toArray();
    return $students;
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
    $students = new Students();
    $students->student_code = $request->student_code;
    $students->account_id = $request->account_id;
    $students->class_id = $request->class_id;
    $students->full_name = $request->full_name;
    $students->sex = $request->sex;
    $students->date_of_birth = $request->date_of_birth;
    $students->place_of_birth = $request->place_of_birth;
    $students->phone_number = $request->phone_number;
    $students->id_citizent = $request->id_citizent;
    $students->email = $request->email;
    $students->created_at = date('Y-m-d');
    $students->updated_at = date('Y-m-d');
    $students->save();
    return redirect('/admin/students');
  }

  /**
   * Inheric docs.
   */
  public function show(Students $students) {
  }

  /**
   * Inheric docs.
   */
  public function edit($id) {
    $students = Students::find($id);
    return $students;
    // Return view('students.update', compact('students'));.
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $students = Students::find($id);
    $students->student_code = $request->student_code;
    $students->account_id = $request->account_id;
    $students->class_id = $request->class_id;
    $students->full_name = $request->full_name;
    $students->sex = $request->sex;
    $students->date_of_birth = $request->date_of_birth;
    $students->place_of_birth = $request->place_of_birth;
    $students->phone_number = $request->phone_number;
    $students->id_citizent = $request->id_citizent;
    $students->email = $request->email;
    $students->updated_at = date('Y-m-d');
    $students->save();
    return redirect('/admin/students');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id) {
    $students = Students::find($id);
    $students->delete();
    return redirect('/admin/students');
  }
}
