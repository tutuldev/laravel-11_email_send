<?php

namespace App\Http\Controllers;

use App\Mail\welcomemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(){
       $toEmail = "abdurrahaman444.spy@gmail.com";
       $message = "Hellow , Welcome to our website";
       $subject = "Wecome to Our website";

      $request= Mail::to($toEmail)->send(new welcomemail($message,$subject));
      dd($request);
    }
}
