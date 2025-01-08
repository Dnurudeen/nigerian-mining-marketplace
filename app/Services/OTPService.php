<?php
namespace App\Services;

use Twilio\Rest\Client;
use App\Models\OTP;
use Carbon\Carbon;
use Illuminate\Support\Str;


class OTPService
{
    public function sendOTP($phone)
    {
        // Generate a 6-digit OTP
        $otp = rand(100000, 999999);

        // Set OTP expiration time (e.g., 5 minutes from now)
        $expiresAt = Carbon::now()->addMinutes(5);

        // Store OTP in the database
        OTP::updateOrCreate(
            ['phone' => $phone], // Check if phone exists
            ['otp' => $otp, 'expires_at' => $expiresAt]
        );

        // Send OTP using Twilio
        $client = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
        // $phone = Str::startsWith($phone, '+') ? $phone : '+234' . ltrim($phone, '0');

        $client->messages->create($phone, [
            'from' => env('TWILIO_PHONE'),
            'body' => "Your OTP code is $otp. It expires in 5 minutes."
        ]);

        return true;
    }

    public function verifyOTP($phone, $otp)
    {
        // Retrieve OTP record
        $record = OTP::where('phone', $phone)->where('otp', $otp)->first();

        // Check if OTP is valid and not expired
        if ($record && Carbon::now()->lt($record->expires_at)) {
            $record->delete(); // Delete OTP after successful verification
            return true;
        }

        return false; // OTP is invalid or expired
    }
}
