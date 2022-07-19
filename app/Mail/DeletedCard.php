<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Mail\DeletedCard;
use DB;
use Auth;

class DeletedCard extends Mailable
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
    public function build(Request $request)
    {
       $user = Auth::user();
       $user_mail = $user->email;

       return $this->subject('Card Deleted Successfully')->view('admin.mail.confirm_card_delete')->to($user_mail);
    }
}
