<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\Mail;
 
use App\Mail\NotifyMail;

class SendEmailController extends Controller
{
    public function index()
    {
 
      Mail::to('dbvhoang@gmail.com')->send(new NotifyMail());
 
      if (Mail::flushMacros()) {
        dd('Sorry! Please try again latter');
      }else{
        dd('Great! Successfully send in your mail');
        }
    } 
}
