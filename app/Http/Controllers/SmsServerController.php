<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsServerController extends Controller
{
    //add sms pregmatch and explode the code from the message

    public function upload(Request $request)
    {

//        $jsonObject = json_decode(implode('', file("php://input")));
        $body = json_decode(str_replace('``', '"', $request->message));
//        $body = json_decode(str_replace('``','"', $jsonObject->message));
        $from = str_replace('+', '', $body->from);
        $to = $body->to;
        $message = $body->message;
//        $provider=$body->provider;
        logger($message);
    }
}
