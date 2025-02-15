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
       $details = [
        'name'=>"John Doe",
        'product'=>'Test Product',
        'price' => 250
       ];

      $request= Mail::to($toEmail)->send(new welcomemail($message,$subject,$details));
      dd($request);
    }
}
