<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Controllers\Controller;
use Response;
use App\mail\ConfirmCreditOrder;


class MailController extends Controller
{
  
    public function index(){
    	Mail::send(new ConfirmCreditOrder());
    }
}
