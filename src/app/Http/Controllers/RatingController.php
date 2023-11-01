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
    $pars = [];
    $childs = [];
    $par_childs = [];
    foreach ($critetias as $value) {
      if($value['field_level'] == 1){
        $pars[] = $value;
      }
      elseif($value['field_level'] == 2){
        $par_childs[] = $value;
      }
      elseif($value['field_level'] == 3){
        $childs[] = $value;
      }
    }
    return view('rating.allrating', compact('pars', 'par_childs', 'childs'));

  }

  /**
   * Inheric docs.
   */
  public function create() {
    $critetias_db = Criterias::all()->toArray();
    $critetias = [];
    foreach ($critetias_db as $value) {
      if($value['field_level'] != 3){
        $critetias[] = $value;
      }
    }
    return view('rating.create', compact('critetias'));
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
    $critetias_db = Criterias::all()->toArray();
    $criterias = new Criterias;
    $par = NULL;
    $weight = 1;
    $level = 1;
    foreach ($critetias_db as $value) {
      if($value['id'] == $request->parent_criteria_id){
        $par = $value;
        $level = $value['field_level'] + 1;
      }
      if($value['parent_criteria_id'] == $request->parent_criteria_id){
        $weight++;
      }
    }    
    // $criterias->id = @ $request->name;
    $criterias->name = $request->name;
    $criterias->parent_criteria_id = $request->parent_criteria_id;
    $criterias->max_score = $request->max_score;
    $criterias->default_score = $request->default_score;
    $criterias->is_violent = $request->is_violent;
    $criterias->weight = $weight;
    $criterias->field_level = $level;
    $criterias->status = 1;
    $criterias->created_at = date('Y-m-d');
    $criterias->updated_at = date('Y-m-d');
    $criterias->save();
    return redirect('/admin/criterias');
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
