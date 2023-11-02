<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

/**
 * Inheric docs.
 */
class CourseController extends Controller {

  /**
   * Inheric docs.
   */
  public function index() {
    $course = Course::all()->toArray();
    return $course;
  }

  /**
   * Inheric docs.
   */
  public function create() {
    return 123;
    // return view('course/create');
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
    $course = new Course();
    $course->name = $request->name;
    $course->begin_year = $request->begin_year;
    $course->end_year = $request->end_year;
    $course->created_at = date('Y-m-d');
    $course->updated_at = date('Y-m-d');
    $course->save();
    return redirect('/admin/course');
  }

  /**
   * Inheric docs.
   */
  public function show(Course $course) {
  }

  /**
   * Inheric docs.
   */
  public function edit($id) {
    $course = Course::find($id);
    return $course;
    // Return view('course.update', compact('course'));.

  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $course = Course::find($id);
    $course->name = $request->name;
    $course->begin_year = $request->begin_year;
    $course->end_year = $request->end_year;
    $course->updated_at = date('Y-m-d');
    $course->save();
    return redirect('/admin/course');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id) {
    $course = Course::find($id);
    $course->delete();
    return redirect('/admin/course');
  }

}
