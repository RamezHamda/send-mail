<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Mail\TestMail;
use App\Jobs\SendMails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    function sendEmail()
    {
        $emails = Data::chunk(50, function($data){
            dispatch(new SendMails($data));
        });

        return  "Emails Sent Successfully and you can check your email, Thank you!";
    }
}
