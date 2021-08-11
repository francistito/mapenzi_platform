<?php

namespace App\Http\Controllers;

use App\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SmsController extends Controller
{

    public function sms()
    {
        return view('sms.index');
    }
    public function sendSms()
    {
        return view('sms.compose.send');
    }


    public function storeSms(Request $request)
    {
        $input = $request->all();
        $validatedData = $request->validate([
            'phone_number' => 'required',
            'message' => 'required',
        ]);
        $phone_number = phone_format($request->phone_number,'TZ');

        $sms = new Sms();
        $sms->phone_number = $phone_number;
        $sms->body = $request->message;
        $sms->save();


        $phone = str_replace("+", "", $sms->phone_number);
        $sms_message = $sms->body;

        //dispatch job for calling a service for send sms
        \App\Jobs\Notifications\SendSms::dispatch($phone, strip_tags($sms_message));

        return redirect('/home')->with('msg_success', 'Sms sent Successfully');


    }
}
