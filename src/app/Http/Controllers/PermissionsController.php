<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use Illuminate\Http\Request;

/**
 * Inheric docs.
 */
class PermissionsController extends Controller {

  /**
   * Inheric docs.
   */
  public function list() {
    $permissions = Permissions::all()->toArray();
    return view('permissions.list', compact('permissions'));
  }

  /**
   * Inheric docs.
   */
  public function create() {
    return view('permissions.create');
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
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
  public function show(Permissions $permissions) {
  }

  /**
   * Inheric docs.
   */
  public function edit($id) {
    $permission = Permissions::find($id);
    return view('permissions.update', compact('permission'));
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $permissions = Permissions::find($id);
    $permissions->name = $request->name;
    $permissions->updated_at = date('Y-m-d');
    $permissions->save();
    return redirect('/admin/permissions');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id) {
    $permissions = Permissions::find($id);
    $permissions->delete();
    return redirect('/admin/permissions');
  }

}
