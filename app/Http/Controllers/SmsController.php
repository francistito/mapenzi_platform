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

        $sms = new Sms();
        $sms->phone_number = $request->phone_number;
        $sms->body = $request->message;
        $sms->save();

        return redirect('/home')->with('msg_success', 'Sms sent Successfully');


    }
}
