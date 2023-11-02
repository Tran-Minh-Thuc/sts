<?php

namespace App\Http\Controllers;

use App\Models\Transcripts_detail;
use App\Models\Transcripts;
use App\Models\Criterias;
use Illuminate\Http\Request;

/**
 * Inheric docs.
 */
class TranscriptsDetailController extends Controller {

  /**
   * Inheric docs.
   */
  public function index() {
    $transcripts_detail = Transcripts_detail::all()->toArray();
    return $transcripts_detail;
  }

  /**
   * Inheric docs.
   */
  public function create() {

    $criterias = Criterias::all()->toArray();
    $transcripts = Transcripts::all()->toArray();

    return 123;
    // Return view('classes.create');.
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request) {
    $transcripts_detail = new Transcripts_detail();
    $transcripts_detail->criteria_id  = $request->criteria_id ;
    $transcripts_detail->transcript_id  = $request->transcript_id ;
    $transcripts_detail->score  = $request->score ;
    $transcripts_detail->created_at = date('Y-m-d');
    $transcripts_detail->updated_at = date('Y-m-d');
    $transcripts_detail->save();
    return redirect('/admin/transcripts_detail');
  }

  /**
   * Inheric docs.
   */
  public function show(Transcripts_detail $transcripts_detail) {
  }

  /**
   * Inheric docs.
   */
  public function edit($id) {
    $transcripts_detail = Transcripts_detail::find($id);
    return $transcripts_detail;
    // Return view('transcripts_detail.update', compact('transcripts_detail'));.
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id) {
    $transcripts_detail = Transcripts_detail::find($id);
    $transcripts_detail->criteria_id  = $request->criteria_id ;
    $transcripts_detail->transcript_id  = $request->transcript_id ;
    $transcripts_detail->score  = $request->score ;
    $transcripts_detail->updated_at = date('Y-m-d');
    $transcripts_detail->save();
    return redirect('/admin/transcripts_detail');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id) {
    $transcripts_detail = Transcripts_detail::find($id);
    $transcripts_detail->delete();
    return redirect('/admin/transcripts_detail');
  }

}
