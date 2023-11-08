<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Course;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Inheric docs.
 */
class ClassesController extends Controller {

  /**
   * Inheric docs.
   */
  public function list(Request $request) {
    $classes = [];
    $classes_db = [];
    if ($request->name != NULL) {
      $search_box = "%" . $request->name . "%";
      $classes_db = DB::select('SELECT classes.*, teachers.full_name AS teacher_name, courses.name AS course_name FROM classes LEFT JOIN teachers ON classes.teacher_id = teachers.id LEFT JOIN courses ON classes.course_id = courses.id WHERE classes.name LIKE ?;', [$search_box]);
    }else{
      $classes_db = DB::select('SELECT classes.*, teachers.full_name AS teacher_name, courses.name AS course_name FROM classes LEFT JOIN teachers ON classes.teacher_id = teachers.id LEFT JOIN courses ON classes.course_id = courses.id;');
    }
    foreach ($classes_db as $class) {
      $classes[] = (array) $class;
    }
    return view('classes.list', compact('classes'));
  }

  /**
   * Inheric docs.
   */
  public function create() {
    $teachers = Teachers::all()->toArray();
    $courses = Course::all()->toArray();
    return view('classes.create', compact('teachers', 'courses'));
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
    $classes_db = DB::select('SELECT classes.*, teachers.full_name AS teacher_name, teachers.teacher_code AS teacher_code, courses.name AS course_name FROM classes LEFT JOIN teachers ON classes.teacher_id = teachers.id LEFT JOIN courses ON classes.course_id = courses.id WHERE classes.id = ?;', [$id]);
    $class = (array) $classes_db[0];
    $teachers = Teachers::all()->toArray();
    $courses = Course::all()->toArray();
    return view('classes.update', compact('class', 'teachers', 'courses'));
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
