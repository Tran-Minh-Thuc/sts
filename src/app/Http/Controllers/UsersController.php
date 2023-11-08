<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Teachers;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Inheric docs.
 */
class UsersController extends Controller {

  /**
   * Inheric docs.
   */
  public function list() {
    $students = Students::all()->toArray();
    $teachers = Teachers::all()->toArray();
    $all_user = [];
    $all_user[] = $students;
    $all_user[] = $teachers;
    return view('user.listuser', compact('students'));
  }

  /**
   * Inheric docs.
   */
  public function create() {
    return view('user.create');
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
