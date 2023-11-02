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
  public function index() {
    $permissions = Permissions::all()->toArray();
    return $permissions;
  }

  /**
   * Inheric docs.
   */
  public function create() {
    return 123;
    // Return view('classes.create');.
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
    $permissions = Permissions::find($id);
    return $permissions;
    // Return view('permissions.update', compact('permissions'));.
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
