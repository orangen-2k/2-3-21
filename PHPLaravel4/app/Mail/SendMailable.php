<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Session;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

//    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->detals = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $randum = randomfogot(5);
        Session::put('Randum', $randum);
        return $this->subject('Mã xác nhận')->view('passport.notification', ['Randum' => $randum]);
    }
}
