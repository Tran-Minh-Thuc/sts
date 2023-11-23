<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Inheric docs.
 */
class MailNotify extends Mailable {
  use Queueable, SerializesModels;
  /**
   * Description of the $data property.
   *
   * @var array
   */
  private $data = [];

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($data) {
    $this->data = $data;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build() {
    $data = $this->data;
    return $this->view('mail.formmail', compact('data'));
  }

}
