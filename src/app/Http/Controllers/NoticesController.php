<?php

namespace App\Http\Controllers;


use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;
use App\Models\Notices;
use App\Models\Semesters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Inheric docs.
 */
class NoticesController extends Controller
{

  /**
   * Inheric docs.
   */
  public function list(Request $request)
  {
    $notices = [];
    $notices_db = [];
    if ($request->name != NULL) {
      $search_box = "%" . $request->name . "%";
      $notices_db = DB::select('SELECT notices.*, semesters.name AS semester_name FROM notices LEFT JOIN semesters ON notices.semester_id = semesters.id WHERE notices.name LIKE ?;', [$search_box]);
    } else {
      $notices_db = DB::select('SELECT notices.*, semesters.name AS semester_name FROM notices LEFT JOIN semesters ON notices.semester_id = semesters.id;');
    }
    foreach ($notices_db as $notice) {
      $notices[] = (array) $notice;
    }
    if (session("permission") == 1) {
      return view('notices.list', compact('notices'));
    } else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function action(Request $request)
  {
    if ($request->ajax()) {
      $query = $request->get('query');
      $output = '';
      if ($query != '') {
        $data = DB::table('notices')
          ->where('name', 'LIKE', '%' . $query . '%')
          ->get();
      } else {
        $data = DB::table('notices')
          ->get();
      }
      $total_row = $data->count();
      if ($total_row > 0) {
        foreach ($data as $row) {
          $output .= '
                <tr id="' . $row->id . '">
                    <td>' . $row->name . '</td>
                    <td>' . $row->created_at . '</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a type="button" href="/admin/update-notices/' . $row->id . '" class="btn btn-info">Chỉnh Sửa</a>
                            <button type="button" value="' . $row->id . '" id="delete"  class="btn btn-danger">Xóa</button>
                        </div>
                    </td>
                </tr>';
        }
      } else {
        $output = '
        <tr>
            <td align="center" colspan="5">No Data Found</td>
        </tr>
        ';
      }
      $data = [
        'table_data' => $output,
      ];
      echo json_encode($data);
    }
  }

  /**
   * Inheric docs.
   */
  public function create()
  {
    $semesters = Semesters::all()->toArray();
    if (session("permission") == 1) {
      return view('notices.create', compact('semesters'));
    } else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function store(Request $request)
  {
    $request->validate([
      'file' => 'mimes:jpeg,png,jpg,gif,svg,ico,webp',
    ]);
    $notices = new Notices();
    $now = date('Y-m-d');
    $semesters = DB::table('semesters')->get();
    foreach ($semesters as $semester) {
      if ($semester->start_time < $now && $semester->end_time > $now) {
        $notices->semester_id = $semester->id;
      }
    }
    $notices->begin_time = $request->begin_time;
    $notices->end_time = $request->end_time;
    $notices->image = !empty($request->image) ? (string) base64_encode(file_get_contents($request->image)) : NULL;
    $notices->note = $request->note;
    $notices->name = $request->name;
    $notices->created_at = date('Y-m-d');
    $notices->updated_at = date('Y-m-d');
    $notices->save();
    if (!empty($request->confirm_send_email) && $notices->save()) {
      if ($request->type_send_email == 'student') {
        $stu_emails = DB::table('students')->select('students.email')->get();
        foreach ($stu_emails as $email) {
          $mail = [];
          $mail['header'] = "Thông báo mới từ Đại học Sài Gòn";
          $mail['body'] = "Nội dung: " . $notices->name . "<br>";
          if ($request->note) {
            $mail['body'] .= "Ghi chú: " . $notices->note . "<br>";
          }
          if ($request->begin_time) {
            $mail['body'] .= "Ngày bắt đầu: " . $request->begin_time . "<br>";
          }
          if ($request->end_time) {
            $mail['body'] .= "Ngày kết thúc: " . $request->end_time . "<br>";
          }
          Mail::to('ducthanhdeptrai@mailinator.com')->send(new MailNotify($mail));
        }
      } elseif ($request->type_send_email == 'teacher') {
        $tea_emails = DB::table('teachers')->select('teachers.email')->get();
        foreach ($tea_emails as $email) {
          $mail = [];
          $mail['header'] = "Thông báo mới từ Đại học Sài Gòn";
          $mail['body'] = "Nội dung: " . $notices->name . "<br>";
          if ($request->note) {
            $mail['body'] .= "Ghi chú: " . $notices->note . "<br>";
          }
          if ($request->begin_time) {
            $mail['body'] .= "Ngày bắt đầu: " . $request->begin_time . "<br>";
          }
          if ($request->end_time) {
            $mail['body'] .= "Ngày kết thúc: " . $request->end_time . "<br>";
          }
          Mail::to('ducthanhdeptrai@mailinator.com')->send(new MailNotify($mail));
        }
      } elseif ($request->type_send_email == 'all') {
        $tea_emails = DB::table('teachers')->select('teachers.email')->get();
        $stu_emails = DB::table('students')->select('students.email')->get();
        $array1 = json_decode($tea_emails, true);
        $array2 = json_decode($stu_emails, true);        
        $emails = array_merge($array1, $array2);        
        foreach ($emails as $email) {
          $mail = [];
          $mail['header'] = "Thông báo mới từ Đại học Sài Gòn";
          $mail['body'] = "Nội dung: " . $notices->name . "<br>";
          if ($request->note) {
            $mail['body'] .= "Ghi chú: " . $notices->note . "<br>";
          }
          if ($request->begin_time) {
            $mail['body'] .= "Ngày bắt đầu: " . $request->begin_time . "<br>";
          }
          if ($request->end_time) {
            $mail['body'] .= "Ngày kết thúc: " . $request->end_time . "<br>";
          }
          Mail::to('ducthanhdeptrai@mailinator.com')->send(new MailNotify($mail));
        }
      }
    }
    return 123;
    return redirect('/admin/notices');
  }

  /**
   * Inheric docs.
   */
  public function uploadfile($file)
  {
  }

  /**
   * Inheric docs.
   */
  public function edit($id)
  {
    $notices_db = DB::select('SELECT notices.*, semesters.name AS semester_name FROM notices LEFT JOIN semesters ON notices.semester_id = semesters.id WHERE notices.id = ?;', [$id]);
    $semesters = Semesters::all()->toArray();
    $notice = (array) $notices_db[0];
    if (session("permission") == 1) {
      return view('notices.update', compact('notice', 'semesters'));
    } else {
      return "You can not access this page ! <a href=\"..\login\">re-login</a>";
    }
  }

  /**
   * Inheric docs.
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'file' => 'mimes:jpeg,png,jpg,gif,svg,ico,webp',
    ]);
    $notices = Notices::find($id);
    $notices->semester_id = $request->semester_id;
    $notices->begin_time = $request->begin_time;
    $notices->end_time = $request->end_time;
    if ($request->image) {
      $notices->image = (string) base64_encode(file_get_contents($request->image));
    }
    $notices->note = $request->note;
    $notices->name = $request->name;
    $notices->created_at = date('Y-m-d');
    $notices->updated_at = date('Y-m-d');
    $notices->save();
    return redirect('/admin/notices');
  }

  /**
   * Inheric docs.
   */
  public function destroy($id)
  {
    $notices = Notices::find($id);
    return $notices;
    $notices->delete();
    return redirect('/admin/notices');
  }
}
