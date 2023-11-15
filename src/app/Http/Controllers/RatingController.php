<?php

namespace App\Http\Controllers;

use App\Models\Criterias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Inheric docs.
 */
class RatingController extends Controller {

  /**
   * Inheric docs.
   */
  public function list() {
    return view('rating.list');
  }

  /**
   * Inheric docs.
   */
  public function action(Request $request) {
    if ($request->ajax()) {
      $query = $request->get('query');
      $output = '';
      if ($query != '') {
        $data = DB::table('criterias')
          ->where('name', 'LIKE', '%' . $query . '%')
          ->get();
      }
      else {
        $data = DB::table('criterias')->get();
      }
      $total_row = $data->count();
      if ($total_row > 0) {
        foreach ($data as $row) {
          if ($row->status == 1) {
            $status = "Đang hoạt động";
          }
          else {
            $status = "Tạm ngưng";
          }
          $output .= '
                <tr id="' . $row->id . '">
                    <td>' . $row->name . '</td>
                    <td>' . $row->max_score . '</td>
                    <td>' . $status . '</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a type="button" href="/admin/update-criterias/' . $row->id . '" class="btn btn-info">Chỉnh Sửa</a>
                            <a type="button" href="/admin/create-criterias/' . $row->id . '" class="btn btn-warning">Thêm</a>
                            <button type="button" value="' . $row->id . '" id="delete"  class="btn btn-danger">Xóa</button>
                        </div>
                    </td>
                </tr>';
        }
      }
      else {
        $output = '
        <tr>
            <td align="center" colspan="5">No Data Found</td>
        </tr>
        ';
      }
      $data = [
        'table_data' => $output,
      ];
      echo json_encode($data);
    }
  }

  /**
   * Inheric docs.
   */
  public function create($id = 0) {
    $par = Criterias::find($id);
    $critetias_db = Criterias::all()->toArray();
    $critetias = [];
    foreach ($critetias_db as $value) {
      if ($value['field_level'] != 3) {
        $critetias[] = $value;
      }
    }
    return view('rating.create', compact('critetias', 'par'));
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
    $critetias_db = Criterias::all()->toArray();
    $criterias = new Criterias();
    // $par = NULL;
    $weight = 1;
    $level = 1;
    foreach ($critetias_db as $value) {
      if ($value['id'] == $request->parent_criteria_id) {
        // $par = $value;
        $level = $value['field_level'] + 1;
      }
      if ($value['parent_criteria_id'] == $request->parent_criteria_id) {
        $weight++;
      }
    }
    // $criterias->id = @ $request->name;
    $criterias->name = $request->name;
    $criterias->parent_criteria_id = $request->parent_criteria_id;
    $criterias->max_score = $request->max_score;
    $criterias->default_score = $request->default_score;
    $criterias->is_violent = $request->is_violent;
    $criterias->weight = $weight;
    $criterias->field_level = $level;
    $criterias->status = 1;
    $criterias->created_at = date('Y-m-d');
    $criterias->updated_at = date('Y-m-d');
    $criterias->save();
    return redirect('/admin/criterias');
  }

  /**
   * Inheric docs.
   */
  public function show(criterias $criterias) {
    return $criterias;
  }

  /**
   * Inheric docs.
   */
  public function edit($id) {
    $criterias = Criterias::all()->toArray();
    $criteria = (array) DB::select('select * from criterias where id = ?', [$id])[0];
    $parent_criteria = NULL;
    if ($criteria['parent_criteria_id'] != NULL) {
      $parent_criteria = (array) DB::select('select * from criterias where id = ?', [$criteria['parent_criteria_id']])[0];
    }
    return view('rating.update', compact('criteria', 'criterias', 'parent_criteria'));
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $critetias_db = Criterias::all()->toArray();
    $critetia = Criterias::find($id);

    // $par = NULL;
    $level = 1;
    foreach ($critetias_db as $value) {
      if ($value['id'] == $request->parent_criteria_id) {
        // $par = $value;
        $level = $value['field_level'] + 1;
      }
    }
    // $criterias->id = @ $request->name;
    $critetia->name = $request->name;
    $critetia->parent_criteria_id = 1;
    $critetia->max_score = $request->max_score;
    $critetia->default_score = $request->default_score;
    $critetia->is_violent = $request->is_violent;
    $critetia->field_level = $level;
    $critetia->status = $request->status;
    $critetia->updated_at = date('Y-m-d');
    $critetia->save();
    // Return $criterias;.
    return redirect('/admin/criterias');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id) {
    $criterias = Criterias::find($id);
    $criterias->delete();
    return response()->json(['success' => 'record had been delete !']);
  }

}
