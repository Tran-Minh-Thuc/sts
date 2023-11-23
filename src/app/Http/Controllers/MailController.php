<?php

namespace App\Http\Controllers;

/**
 * Inheric docs.
 */
class MailController extends Controller {

  /**
   * Inheric docs.
   */
  public function sendMail() {
    return view('mail.index');
  }

  /**
   * Inheric docs.
   */
  public function actionSendMail() {
    return 123;
  }

}
