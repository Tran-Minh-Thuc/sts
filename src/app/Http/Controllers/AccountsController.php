<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\Accounts;
use App\Models\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

/**
 * Inheric docs.
 */
class AccountsController extends Controller {

  /**
   * Inheric docs.
   */
  public function list(Request $request) {
    if (session("permission") == 1) {
      return view('accounts.list');
    }
    else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function action(Request $request) {
    if ($request->ajax()) {
      $query = $request->get('query');
      $output = '';
      if ($query != '') {
        $data = DB::table('accounts')
          ->where('user_name', 'LIKE', '%' . $query . '%')
          ->get();
      }
      else {
        $data = DB::table('accounts')->get();
      }
      $total_row = $data->count();
      if ($total_row > 0) {
        foreach ($data as $row) {
          if ($row->status == TRUE) {
            $status = "Đang hoạt động";
          }
          else {
            $status = "Tạm ngưng";
          }
          $output .= '
                <tr id="' . $row->id . '">
                    <td>' . $row->user_name . '</td>
                    <td>' . $row->password . '</td>
                    <td>' . $status . '</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a type="button" href="/admin/update-accounts/' . $row->id . '" class="btn btn-info">Chỉnh Sửa</a>
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
  public function create() {
    $permissions = Permissions::all()->toArray();
    if (session("permission") == 1) {
      return view('accounts.create', compact('permissions'));
    }
    else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
    $account = new Accounts();
    $account->user_name = $request->user_name;
    $account->password = $request->password;
    $account->permission_id = $request->permission_id;
    $account->status = $request->status;
    $account->created_at = date('Y-m-d');
    $account->updated_at = date('Y-m-d');
    $account->save();
    return redirect('/admin/accounts');
  }

  /**
   * Inheric docs.
   */
  public function show(Accounts $accounts) {
  }

  /**
   * Inheric docs.
   */
  public function edit($id) {
    $permissions = Permissions::all()->toArray();
    $account_db = DB::select('SELECT accounts.*, permissions.name AS permission_name FROM accounts LEFT JOIN permissions ON accounts.permission_id = permissions.id WHERE accounts.id = ?;', [$id]);
    $account = (array) $account_db[0];
    if (session("permission") == 1) {
      return view('accounts.update', compact('account', 'permissions'));
    }
    else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $account = Accounts::find($id);
    $account->user_name = $request->user_name;
    $account->password = $request->password;
    $account->permission_id = $request->permission_id;
    $account->status = $request->status;
    $account->updated_at = date('Y-m-d');
    $account->save();
    if ($account->save()) {
      $user = DB::table('students')->where('student_code', '=', $request->user_name)->get();
      if ($user->isEmpty()) {
        $user = DB::table('teachers')->where('teacher_code', '=', $request->user_name)->get();
      }
      if ($user->isNotEmpty()) {
        $mail = [];
        $mail['to'] = $user[0]->email;
        $mail['header'] = "Tài khoản đã được cấp thành công !";
        $mail['body'] = "Tên tài khoản: " . $request->user_name . "Mật khẩu: " . $request->password;
        // $request->session()->put('mail', $mail);
        Mail::to($user[0]->email)->send(new MailNotify($mail));
      }

    }
    return redirect('/admin/accounts');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id) {
    $account = Accounts::find($id);
    // return($critetia);
    $account->delete();
    return response()->json(['success' => 'record had been delete !']);
  }

}
