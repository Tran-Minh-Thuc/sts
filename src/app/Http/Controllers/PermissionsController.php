<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Inheric docs.
 */
class PermissionsController extends Controller
{

  /**
   * Inheric docs.
   */
  public function list(Request $request)
  {
    $permissions = [];
    if ($request->name != NULL) {
      $search_box = "%" . $request->name . "%";
      $permissions_search_db = DB::select('SELECT permissions.* FROM permissions WHERE permissions.name LIKE ?;', [$search_box]);
      foreach ($permissions_search_db as $course) {
        $permissions[] = (array) $course;
      }
    } else {
      $permissions = Permissions::all()->toArray();
    }
    if (session("permission") == 1) {
      return view('permissions.list', compact('permissions'));
    } else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function action(Request $request)
  {
    if ($request->ajax()) {
      $query = $request->get('query');
      $output = '';
      if ($query != '') {
        $data = DB::table('permissions')
          ->where('name', 'LIKE', '%' . $query . '%')
          ->get();
      } else {
        $data = DB::table('permissions')
          ->get();
      }
      $total_row = $data->count();
      if ($total_row > 0) {
        foreach ($data as $row) {
          $output .= '
                <tr id="' . $row->id . '">
                    <td>' . $row->name . '</td>
                    <td>' . $row->created_at . '</td>
                    <td>' . $row->updated_at . '</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a type="button" href="/admin/update-permissions/' . $row->id . '" class="btn btn-info">Chỉnh Sửa</a>
                            <button type="button" value="' . $row->id . '" id="delete"  class="btn btn-danger">Xóa</button>
                        </div>
                    </td>
                </tr>';
        }
      } else {
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
  public function create()
  {
    if (session("permission") == 1) {
      return view('permissions.create');
    } else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request)
  {
    $permissions = new Permissions();
    $permissions->name = $request->name;
    $permissions->created_at = date('Y-m-d');
    $permissions->updated_at = date('Y-m-d');
    $permissions->save();
    return redirect('/admin/permissions');
  }

  /**
   * Inheric docs.
   */
  public function show(Permissions $permissions)
  {
  }

  /**
   * Inheric docs.
   */
  public function edit($id)
  {
    $permission = Permissions::find($id);
    if (session("permission") == 1) {
      return view('permissions.update', compact('permission'));
    } else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id)
  {
    $permissions = Permissions::find($id);
    $permissions->name = $request->name;
    $permissions->updated_at = date('Y-m-d');
    $permissions->save();
    return redirect('/admin/permissions');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id)
  {
    $permissions = Permissions::find($id);
    $permissions->delete();
    return response()->json(['success' => 'record had been delete !']);
  }
}
