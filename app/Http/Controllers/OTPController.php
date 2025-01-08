<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OTPService;

class OTPController extends Controller
{
    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function sendOTP(Request $request)
    {
        $request->validate(['phone' => 'required|regex:/^\+?[1-9]\d{1,14}$/']);

        $this->otpService->sendOTP($request->phone);

        return response()->json(['message' => 'OTP sent successfully'], 200);
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'phone' => 'required|regex:/^\+?[1-9]\d{1,14}$/',
            'otp' => 'required|digits:6'
        ]);

        if ($this->otpService->verifyOTP($request->phone, $request->otp)) {
            return response()->json(['message' => 'OTP verified successfully'], 200);
        }

        return response()->json(['message' => 'Invalid or expired OTP'], 400);
    }
}
