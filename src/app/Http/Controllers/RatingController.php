<?php

namespace App\Http\Controllers;

use App\Models\Criterias;
use Illuminate\Http\Request;

/**
 * Inheric docs.
 */
class RatingController extends Controller {

  /**
   * Inheric docs.
   */
  public function index() {
    $critetias = Criterias::all()->toArray();
    $par = [];
    $chil = [];
    $par_chil = [];
    foreach ($critetias as $key => $crit) {
      if ($crit['parent_criteria_id'] == NULL) {
        $par[] = $crit;
        unset($critetias[$key]);
      }
    }
    foreach ($critetias as $key => $crit) {
      foreach ($critetias as $crit2) {
        if ($crit['id'] == $crit2['parent_criteria_id']) {
          $par_chil[] = $crit;
          unset($critetias[$key]);
          break;
        }
      }
    }
    return $par_chil;
    return view('rating.allrating', compact('critetias'));

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
  public function show(criterias $criterias) {
  }

  /**
   * Inheric docs.
   */
  public function edit(criterias $criterias) {
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, criterias $criterias) {
  }

  /**
   * Inheric docs.
   */
  public function destroy(criterias $criterias) {
  }

}
