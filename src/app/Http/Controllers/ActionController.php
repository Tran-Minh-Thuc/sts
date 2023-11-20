<?php

namespace App\Http\Controllers;

use App\Imports\ScoreImport;
use App\Models\Transcript_details;
use App\Models\Transcripts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Inheric docs.
 */
class ActionController extends Controller {

  /**
   * Inheric docs.
   */
  public function convertVietnameseToEnglish($string) {
    $vietnameseChars = ['á', 'à', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'đ', 'é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ', 'í', 'ì', 'ỉ', 'ĩ', 'ị', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự', 'ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ'];
    $englishChars = ['a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'd', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'y', 'y', 'y', 'y', 'y'];

    return str_replace($vietnameseChars, $englishChars, $string);
  }

  /**
   * Inheric docs.
   */
  public function index() {
    if (!session('user_info')) {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
    $semesters = DB::table('semesters')->get();
    foreach ($semesters as $semester) {
      $start_time = Carbon::parse($semester->start_time);
      $end_time = Carbon::parse($semester->end_time);
      if ($start_time < Carbon::now() && $end_time > Carbon::now()) {
        $semester_ex = DB::table('semesters')->where('id', '=', $semester->last_semester)->get();
        return view('fileaction.index', compact('semester_ex', 'semester'));
      }
    }
  }

  /**
   * Inheric docs.
   */
  public function importExcel(Request $request) {
    $request->validate([
      'file' => 'required|mimes:xlsx,xls',
    ]);

    // Get the uploaded file.
    $file = $request->file('file');

    // Process the Excel file.
    $rows = \Excel::toArray(new ScoreImport(), $request->file('file'));
    $cleaned_data = array_map(function ($student) {
        return array_map(function ($val) {
            return ($val !== NULL) ? $val : "";
        }, $student);
    }, $rows[0]);

    // Create JSON format.
    $headers = array_map(function ($header) {
        // Replace empty string with a default key or remove it if needed.
        $key = ($header !== "") ? $header : "UnknownKey";
        // Convert spaces to underscores and lowercase the key.
        return strtolower(str_replace(' ', '_', $this->convertVietnameseToEnglish($key)));
    }, $cleaned_data[0]);

    $json_data = array_map(function ($student) use ($headers) {
        return array_combine($headers, $student);
    }, array_slice($cleaned_data, 1));

    // Convert to JSON.
    $json_result = $json_data;
    foreach ($json_result as $row) {
      if ($row['stt']) {
        $student = DB::table('students')->where('student_code', '=', $row['ma_sv'])->select('id')->get();
        if ($student != []) {
          $student_id = $student[0]->id;
          $transcript = DB::table('transcripts')
            ->where('student_id', '=', $student_id)
            ->where('semester_id', '=', $request->semester_id)
            ->get()[0];
          $transcript_details = DB::table('transcript_details')
            ->join('criterias', 'criterias.id', '=', 'transcript_details.criteria_id')
            ->where('transcript_id', '=', $transcript->id)
            ->select('transcript_details.*', 'criterias.max_score')->get();
          if ($row['Đtbhk']) {
            if ((float) $row['Đtbhk'] >= 3.6 && (float) $row['Đtbhk'] <= 4.00) {
              foreach ($transcript_details as $td) {
                if ($td->criteria_id == 36) {
                  $update_trans = Transcript_details::find($td->id);
                  $update_trans->self_score = $td->max_score;
                  $update_trans->class_score = $td->max_score;
                  $update_trans->note = "Hệ thống đã đánh giá";
                  $update_trans->save();
                  foreach ($transcript_details as $td2) {
                    if ($td2->criteria_id == 8) {
                      $update_tran = Transcript_details::find($td2->id);
                      $update_tran->self_score = $td->max_score;
                      $update_tran->class_score = $td->max_score;
                      $update_tran->note = "Hệ thống đã đánh giá";
                      $update_tran->save();
                    }
                    elseif ($td2->criteria_id == 37 || $td2->criteria_id == 38 || $td2->criteria_id == 39 || $td2->criteria_id == 40) {
                      $update_tran = Transcript_details::find($td2->id);
                      $update_tran->note = "Hệ thống đã đánh giá";
                      $update_tran->save();
                    }
                  }
                }
              }
            }
            elseif ((float) $row['Đtbhk'] >= 3.20 && (float) $row['Đtbhk'] <= 3.59) {
              foreach ($transcript_details as $td) {
                if ($td->criteria_id == 37) {
                  $update_trans = Transcript_details::find($td->id);
                  $update_trans->self_score = $td->max_score;
                  $update_trans->class_score = $td->max_score;
                  $update_trans->note = "Hệ thống đã đánh giá";
                  $update_trans->save();
                  foreach ($transcript_details as $td2) {
                    if ($td2->criteria_id == 8) {
                      $update_tran = Transcript_details::find($td2->id);
                      $update_tran->self_score = $td->max_score;
                      $update_tran->class_score = $td->max_score;
                      $update_tran->note = "Hệ thống đã đánh giá";

                      $update_tran->save();
                    }
                    elseif ($td2->criteria_id == 36 || $td2->criteria_id == 38 || $td2->criteria_id == 39 || $td2->criteria_id == 40) {
                      $update_tran = Transcript_details::find($td2->id);
                      $update_tran->note = "Hệ thống đã đánh giá";
                      $update_tran->save();
                    }
                  }
                }
              }
            }
            elseif ((float) $row['Đtbhk'] >= 2.50 && (float) $row['Đtbhk'] <= 3.19) {
              foreach ($transcript_details as $td) {
                if ($td->criteria_id == 38) {
                  $update_trans = Transcript_details::find($td->id);
                  $update_trans->self_score = $td->max_score;
                  $update_trans->class_score = $td->max_score;
                  $update_trans->note = "Hệ thống đã đánh giá";
                  $update_trans->save();
                  foreach ($transcript_details as $td2) {
                    if ($td2->criteria_id == 8) {
                      $update_tran = Transcript_details::find($td2->id);
                      $update_tran->self_score = $td->max_score;
                      $update_tran->class_score = $td->max_score;
                      $update_tran->note = "Hệ thống đã đánh giá";
                      $update_tran->save();
                    }
                    elseif ($td2->criteria_id == 36 || $td2->criteria_id == 37 || $td2->criteria_id == 39 || $td2->criteria_id == 40) {
                      $update_tran = Transcript_details::find($td2->id);
                      $update_tran->note = "Hệ thống đã đánh giá";
                      $update_tran->save();
                    }
                  }
                }
              }
            }
            elseif ((float) $row['Đtbhk'] >= 2.00 && (float) $row['Đtbhk'] <= 2.49) {
              foreach ($transcript_details as $td) {
                if ($td->criteria_id == 39) {
                  $update_trans = Transcript_details::find($td->id);
                  $update_trans->self_score = $td->max_score;
                  $update_trans->class_score = $td->max_score;
                  $update_trans->note = "Hệ thống đã đánh giá";
                  $update_trans->save();
                  foreach ($transcript_details as $td2) {
                    if ($td2->criteria_id == 8) {
                      $update_tran = Transcript_details::find($td2->id);
                      $update_tran->self_score = $td->max_score;
                      $update_tran->class_score = $td->max_score;
                      $update_tran->note = "Hệ thống đã đánh giá";
                      $update_tran->save();
                    }
                    elseif ($td2->criteria_id == 36 || $td2->criteria_id == 37 || $td2->criteria_id == 38 || $td2->criteria_id == 40) {
                      $update_tran = Transcript_details::find($td2->id);
                      $update_tran->note = "Hệ thống đã đánh giá";
                      $update_tran->save();
                    }
                  }
                }
              }
            }
            elseif ((float) $row['Đtbhk'] < 2.00) {
              foreach ($transcript_details as $td) {
                if ($td->criteria_id == 40) {
                  $update_trans = Transcript_details::find($td->id);
                  $update_trans->self_score = $td->max_score;
                  $update_trans->class_score = $td->max_score;
                  $update_trans->note = "Hệ thống đã đánh giá";
                  $update_trans->save();
                  foreach ($transcript_details as $td2) {
                    if ($td2->criteria_id == 8) {
                      $update_tran = Transcript_details::find($td2->id);
                      $update_tran->self_score = $td->max_score;
                      $update_tran->class_score = $td->max_score;
                      $update_tran->note = "Hệ thống đã đánh giá";
                      $update_tran->save();
                    }
                    elseif ($td2->criteria_id == 36 || $td2->criteria_id == 37 || $td2->criteria_id == 38 || $td2->criteria_id == 39) {
                      $update_tran = Transcript_details::find($td2->id);
                      $update_tran->note = "Hệ thống đã đánh giá";
                      $update_tran->save();
                    }
                  }
                }
              }
            }
            $total_self_socre = 0;
            $total_class_score = 0;
            $trans_detail_new = DB::table('transcript_details')
              ->join('criterias', 'criterias.id', '=', 'transcript_details.criteria_id')
              ->where('transcript_id', '=', $transcript->id)
              ->select('transcript_details.*', 'criterias.field_level', 'criterias.parent_criteria_id', 'criterias.id as criteria_id')->get();
            foreach ($trans_detail_new as $tdn) {
              $total_self_field_lv1 = 0;
              $total_class_field_lv1 = 0;
              if ($tdn->field_level == 1) {
                foreach ($trans_detail_new as $tdn2) {
                  if ($tdn2->field_level == 2 && $tdn2->parent_criteria_id == $tdn->criteria_id) {
                    $total_self_field_lv1 += $tdn2->self_score;
                    $total_class_field_lv1 += $tdn2->class_score;
                  }
                }
                $update_tran_field_lv1 = Transcript_details::find($tdn->id);
                $update_tran_field_lv1->self_score = $total_self_field_lv1;
                $update_tran_field_lv1->class_score = $total_class_field_lv1;
                $update_tran_field_lv1->save();
              }
            }
            $trans_detail_new = DB::table('transcript_details')
              ->join('criterias', 'criterias.id', '=', 'transcript_details.criteria_id')
              ->where('transcript_id', '=', $transcript->id)
              ->select('transcript_details.*', 'criterias.field_level', 'criterias.parent_criteria_id')->get();
            foreach ($trans_detail_new as $tdn) {
              if ($tdn->field_level == 1) {
                $total_self_socre += $tdn->self_score;
                $total_class_score += $tdn->class_score;
              }
            }
            $tran_update = Transcripts::find($transcript->id);
            $tran_update->total_self_score = $total_self_socre;
            $tran_update->total_class_score = $total_class_score;
            $tran_update->save();
          }
        }
        else {
          return $row['ma_sv'];
        }
      }
    }
    $msg = "<script>alert(\"Thêm dữ liệu thành công !\");</script>";
    return redirect()->back()->with('status', $msg);
  }

}
