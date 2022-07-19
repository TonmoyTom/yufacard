<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Mail\ConfirmCreditOrder;
use DB;

class ConfirmCreditOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        
    $user_mail = $request->email;

    return $this->subject('Confirm Credit Order Successfully')->view('admin.mail.confirm_credit_mail')->to($user_mail);
    }
}
