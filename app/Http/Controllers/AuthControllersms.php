<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class AuthControllersms extends Controller
{
    public function sendSms(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required'
        ]);

        $account_sid = env("TWILIO_SID");
        $auth_token = env("TWILIO_TOKEN");
        $twilio_number = env("TWILIO_FROM");

        $client = new Client($account_sid, $auth_token);
        $verification_code = rand(1000, 9999); // Tạo mã xác nhận ngẫu nhiên

        // Lưu mã xác nhận vào session hoặc database tại đây

        $client->messages->create($request->phone, [
            'from' => $twilio_number,
            'body' => "mã xác nhận của bạn là:" . $verification_code
        ]);
        dd($request->phone);
        return response()->json(['message' => 'SMS sent successfully!']);
    }
}
