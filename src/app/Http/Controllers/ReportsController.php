<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Inheric docs.
 */
class ReportsController extends Controller {

  /**
   * Inheric docs.
   */
  public function list() {
    return view('reports.list');
  }

  /**
   * Inheric docs.
   */
  public function action(Request $request) {
    if ($request->ajax()) {
      $query = $request->get('query');
      $output = '';
      if ($query != '') {
        $data = DB::table('reports')
          ->where('name', 'LIKE', '%' . $query . '%')
          ->orwhere('sender_code', 'LIKE', '%' . $query . '%')
          ->orwhere('sender_email', 'LIKE', '%' . $query . '%')
          ->get();
      }
      else {
        $data = DB::table('reports')
          ->get();
      }
      $total_row = $data->count();
      if ($total_row > 0) {
        foreach ($data as $row) {
          if ($row->status == 'Pending') {
            $output .= '
                <tr id="' . $row->id . '">
                    <td>' . $row->name . '</td>
                    <td>' . $row->sender_code . '</td>
                    <td>' . $row->sender_email . '</td>
                    <td>' . $row->status . '</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a type="button" href="/admin/update-reports/' . $row->id . '" class="btn btn-info">Chi tiết</a>
                            <a type="button" href="/admin/update-status-reports/' . $row->id . '" class="btn btn-warning">Giải quyết</a>
                            <button type="button" value="' . $row->id . '" id="delete"  class="btn btn-danger">Xóa</button>
                        </div>
                    </td>
                </tr>';
          }
          elseif ($row->status == 'In Progress') {
            $output .= '
                <tr id="' . $row->id . '">
                    <td>' . $row->name . '</td>
                    <td>' . $row->sender_code . '</td>
                    <td>' . $row->sender_email . '</td>
                    <td>' . $row->status . '</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a type="button" href="/admin/update-reports/' . $row->id . '" class="btn btn-info">Chi tiết</a>
                            <a type="button" href="/admin/update-status-reports/' . $row->id . '" class="btn btn-warning">Hoàn thành</a>
                            <button type="button" value="' . $row->id . '" id="delete"  class="btn btn-danger">Xóa</button>
                        </div>
                    </td>
                </tr>';
          }
          else {
            $output .= '
                <tr id="' . $row->id . '">
                    <td>' . $row->name . '</td>
                    <td>' . $row->sender_code . '</td>
                    <td>' . $row->sender_email . '</td>
                    <td>' . $row->status . '</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a type="button" href="/admin/update-reports/' . $row->id . '" class="btn btn-info">Chi tiết</a>
                            <a type="button" href="/admin/update-status-reports/' . $row->id . '" class="btn btn-warning">Đã hoàn thành</a>
                            <button type="button" value="' . $row->id . '" id="delete"  class="btn btn-danger">Xóa</button>
                        </div>
                    </td>
                </tr>';
          }

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
  public function create($id) {
    $id_user = NULL;
    $id_trans_lv_1 = NULL;
    $student = NULL;
    $trans = NULL;
    if (session('user_info')) {
      $id_user = session('user_info')->id;
      $student = DB::table('students')->where('id', '=', $id_user)->get()[0];
    }
    if ($id) {
      $id_trans_lv_1 = $id;
      $trans = DB::table('transcript_details')
        ->join('criterias', 'criterias.id', '=', 'transcript_details.criteria_id')
        ->select('transcript_details.*', 'criterias.name as criteria_name')
        ->where('transcript_details.id', '=', $id_trans_lv_1)->get()[0];
    }
    return view('user.report', compact('id_user', 'id_trans_lv_1', "student", "trans"));
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
    $report = new Reports();
    $report->sender_code = $request->sender_code;
    $report->sender_email = $request->sender_email;
    $report->name = $request->name;
    $report->description = $request->description;
    $report->status = "Pending";
    $report->updated_at = date('Y-m-d');
    $report->created_at = date('Y-m-d');
    $report->save();
    $msg = "<script>alert(\"Yêu cầu gửi đi thành công !\");</script>";
    if (session('user_info')) {
      return redirect('user/rattingscore')->with('status', $msg);
    }
    else {
      return redirect('/login')->with('status', $msg);
    }
  }

  /**
   * Inheric docs.
   */
  public function show(Reports $reports) {
  }

  /**
   * Inheric docs.
   */
  public function edit($id) {
    $report = Reports::find($id);
    $status = ["In Progress", "Resolved", "Pending"];
    foreach ($status as $key => $stt) {
      if ($stt == $report->status) {
        unset($status[$key]);
        // Assuming there's only one matching status.
        break;
      }
    }
    return view('reports.update', compact('report'));
  }

  /**
   * Inheric docs.
   */
  public function update($id) {
    $report = Reports::find($id);
    if ($report->status == "Pending") {
      $report->status = "In Progress";
    }
    elseif ($report->status == "In Progress") {
      $report->status = "Resolved";
    }
    $report->save();
    return redirect()->back();
  }

  /**
   * Inheric docs.
   */
  public function destroy($id) {
    $reports = Reports::find($id);
    $reports->delete();
    return response()->json(['success' => 'record had been delete !']);
  }

}
