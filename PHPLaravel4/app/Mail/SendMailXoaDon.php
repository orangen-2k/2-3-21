<?php

namespace App\Mail;

use App\Dondangky;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Session;

class SendMailXoaDon extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $IdDangky = Session::get('Iddangky');
        $dondangky = Dondangky::find($IdDangky);
        return $this->subject('Thư gửi từ Laravel')->view('admin.user-update.notification-xoa', ['Dondangky' => $dondangky]);
    }
}
