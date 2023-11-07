<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Inheric docs.
 */
class AccountsController extends Controller {

  /**
   * Inheric docs.
   */
  public function list() {
    $accounts_db = DB::select('SELECT accounts.*, permissions.name AS permission_name FROM accounts LEFT JOIN permissions ON accounts.permission_id = permissions.id;');
    $accounts = [];
    foreach ($accounts_db as $account) {
      $accounts[] = (array) $account;
    }
    return view('accounts.list', compact('accounts'));
  }

  /**
   * Inheric docs.
   */
  public function create() {
    $permissions = Permissions::all()->toArray();
    return view('accounts.create', compact('permissions'));
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
    return view('accounts.update', compact('account', 'permissions'));
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
    return redirect('/admin/accounts');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id) {
    $account = Accounts::find($id);
    // return($critetia);
    $account->delete();
    return redirect('/admin/accounts');
  }

}
