<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use App\Models\Provinces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * Inheric docs.
 */
class TeachersController extends Controller {

/**
   * Inheric docs.
   */
  public function list(Request $request) {
    $teachers = [];
    if ($request->name != NULL) {
      $search_box = "%" . $request->name . "%";
      $teachers_search_db = DB::select('SELECT teachers.* FROM teachers WHERE teachers.full_name LIKE ?;', [$search_box]);
      foreach ($teachers_search_db as $course) {
        $teachers[] = (array) $course;
      }
    } else {
      $teachers = Teachers::all()->toArray();
    }
    return view('teachers.list',compact('teachers'));
  }

  /**
   * Inheric docs.
   */
  public function create() {
    $provinces = Provinces::all();
    return view('teachers.create',compact('provinces'));
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
    $teachers->image = !empty($request->image) ? (string) base64_encode(file_get_contents($request->image)) : NULL;
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
    $teacher = Teachers::find($id);
    $provinces = Provinces::all();
    return view('teachers.update', compact('teacher','provinces'));
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $teachers = Teachers::find($id);
    $teachers->teacher_code = $request->teacher_code;
    $teachers->account_id = $request->account_id;
    $teachers->full_name = $request->full_name;
    $teachers->sex = $request->sex;
    if($request->image){
      $teachers->image = (string) base64_encode(file_get_contents($request->image));
    }
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
