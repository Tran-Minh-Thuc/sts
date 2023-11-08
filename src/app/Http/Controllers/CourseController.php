<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Inheric docs.
 */
class CourseController extends Controller
{

  /**
   * Inheric docs.
   */
  public function index()
  {
    $course = Course::all()->toArray();
    return $course;
  }

  /**
   * Inheric docs.
   */
  public function list(Request $request)
  {
    $courses = [];
    if ($request->name != NULL) {
      $search_box = "%" . $request->name . "%";
      $courses_search_db = DB::select('SELECT courses.* FROM courses WHERE courses.name LIKE ?;', [$search_box]);
      foreach ($courses_search_db as $course) {
        $courses[] = (array) $course;
      }
    } else {
      $courses = Course::all()->toArray();
    }
    return view('course.list', compact('courses'));
  }

  /**
   * Inheric docs.
   */
  public function create()
  {
    return view('course/create');
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request)
  {
    $course = new Course();
    $course->name = $request->name;
    $course->start_time = $request->start_time;
    $course->end_time = $request->end_time;
    $course->created_at = date('Y-m-d');
    $course->updated_at = date('Y-m-d');
    $course->save();
    return redirect('/admin/courses');
  }

  /**
   * Inheric docs.
   */
  public function show(Course $course)
  {
  }

  /**
   * Inheric docs.
   */
  public function edit($id)
  {
    $course = Course::find($id);
    return view('course.update', compact('course'));
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id)
  {
    $course = Course::find($id);
    $course->name = $request->name;
    $course->start_time = $request->start_time;
    $course->end_time = $request->end_time;
    $course->updated_at = date('Y-m-d');
    $course->save();
    return redirect('/admin/courses');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id)
  {
    $course = Course::find($id);
    $course->delete();
    return redirect('/admin/courses');
  }
}
