<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Http\Request;

/**
 * Inheric docs.
 */
class AccountsController extends Controller {

  /**
   * Inheric docs.
   */
  public function index() {
    $accounts = Accounts::all()->toArray();
    return $accounts;
    // return view('accounts.index', compact('accounts'));
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
  public function show(Accounts $accounts) {
  }

  /**
   * Inheric docs.
   */
  public function edit(Accounts $accounts) {
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, Accounts $accounts) {
  }

  /**
   * Inheric docs.
   */
  public function destroy(Accounts $accounts) {
  }

}
