<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * Inheric docs.
 */
class UserController extends Controller {

  /**
   * Inheric docs.
   */
  public function index() {
    return view('user.listuser');
  }

  /**
   * Inheric docs.
   */
  public function create() {
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
  }

  /**
   * Inheric docs.
   */
  public function show(User $user) {
  }

  /**
   * Inheric docs.
   */
  public function edit(User $user) {
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, User $user) {
  }

  /**
   * Inheric docs.
   */
  public function destroy(User $user) {
  }

}
