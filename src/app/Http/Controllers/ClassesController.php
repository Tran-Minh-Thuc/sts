<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Course;
use App\Models\Teachers;
use Illuminate\Http\Request;

/**
 * Inheric docs.
 */
class ClassesController extends Controller {

  /**
   * Inheric docs.
   */
  public function index() {
    $classes = Classes::all()->toArray();
    return $classes;
  }

  /**
   * Inheric docs.
   */
  public function create() {
    $teacher = Teachers::all()->toArray();
    $course = Course::all()->toArray();
    return 123;
    // Return view('classes.create', compact('teacher', 'course'));.
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
    $classes = new Classes();
    $classes->teacher_id = $request->teacher_id;
    $classes->name = $request->name;
    $classes->department_name = $request->department_name;
    $classes->course_id = $request->course_id;
    $classes->created_at = date('Y-m-d');
    $classes->updated_at = date('Y-m-d');
    $classes->save();
    return redirect('/admin/classes');
  }

  /**
   * Inheric docs.
   */
  public function show(Classes $classes) {
  }

  /**
   * Inheric docs.
   */
  public function edit($id) {
    $classes = Classes::find($id);
    return $classes;
    // Return view('classes.update', compact('classes'));.
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $classes = Classes::find($id);
    $classes->teacher_id = $request->teacher_id;
    $classes->name = $request->name;
    $classes->department_name = $request->department_name;
    $classes->course_id = $request->course_id;
    $classes->updated_at = date('Y-m-d');
    $classes->save();
    return redirect('/admin/classes');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id) {
    $classes = Classes::find($id);
    $classes->delete();
    return redirect('/admin/classes');
  }

}
