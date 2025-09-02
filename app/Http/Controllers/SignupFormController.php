<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signup;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;


use Illuminate\Support\Facades\Cache;


class SignupFormController extends Controller
{
    // ================= Registration =================
    public function create()
    {
        return view('frontend.signup');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:student_registrations,email',
                'class' => 'required|string|max:255',
                'school' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'password' => 'required|string|min:8',
            ]);

            $randomString = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 4);
            $randomNumber = rand(1000, 9999);
            $uniqueId = 'uid-' . $randomString . $randomNumber;

            $data['uid'] = $uniqueId;
            $data['password'] = Hash::make($data['password']);

            Signup::create($data);

            return response()->json(['success' => true, 'message' => 'Signup successful!']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $e->errors(),
            ], 422);
        }
    }

    // ================= Login =================
    public function login()
    {
        return view('frontend.login');
    }

    public function studentlogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Signup::where('email', $data['email'])->first();

        if ($user && Hash::check($data['password'], $user->password)) {
            Session::put('uid', $user->uid);

            return response()->json([
                'success' => true,
                'message' => 'Login successful!',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials.',
        ], 401);
    }

    // ================= Logout =================
    public function logout(Request $request)
    {
        $request->session()->forget('uid');
        return redirect()->route('home')->with('success', 'You have been logged out successfully.');
    }

    // ================= Forgot Password Flow =================

    public function showForgotPasswordForm()
    {
        return view('frontend.forgot-password');
    }

// public function sendOtp(Request $request)
// {
//     $request->validate(['email' => 'required|email']);
//     $student = Signup::where('email', $request->email)->first();

//     if (!$student) {
//         return response()->json([
//             'success' => false,
//             'redirect' => route('signup'), // redirect to signup
//             'message' => 'Email not found. Please sign up first.'
//         ], 404);
//     }

//     $otp = rand(100000, 999999);
//     $student->otp = $otp;
//     $student->otp_expires_at = Carbon::now()->addMinutes(10);
//     $student->save();

//     // Send OTP mail via Brevo SMTP
//     Mail::raw("Your OTP is: $otp", function ($msg) use ($request) {
//         $msg->to($request->email)->subject("Reset Password OTP");
//     });

//     session(['reset_email' => $request->email]);

//     return response()->json([
//         'success' => true,
//         'message' => 'OTP sent to your email.'
//     ]);
// }
public function sendOtp(Request $request)
{
    $request->validate(['email' => 'required|email']);
    $student = Signup::where('email', $request->email)->first();

    if (!$student) {
        return response()->json([
            'success' => false,
            'redirect' => route('signup'),
            'message' => 'Email not found. Please sign up first.'
        ], 404);
    }

    // Limit to 3 OTP requests per day
    $cacheKey = 'otp_attempts_' . md5($request->email);
    $attempts = Cache::get($cacheKey, 0);

    if ($attempts >= 3) {
        return response()->json([
            'success' => false,
            'message' => 'You have exceeded the maximum OTP requests. Please try again after 24 hours.'
        ], 429); // 429 = Too Many Requests
    }

    // Store attempt count in cache for 24 hours
    Cache::put($cacheKey, $attempts + 1, now()->addHours(24));

    // Generate and save OTP
    $otp = rand(100000, 999999);
    $student->otp = $otp;
    $student->otp_expires_at = Carbon::now()->addMinutes(10);
    $student->save();

    // Send OTP via mail
    Mail::raw("Your OTP is: $otp", function ($msg) use ($request) {
        $msg->to($request->email)->subject("Reset Password OTP");
    });

    // Save email in session
    session(['reset_email' => $request->email]);

    return response()->json([
        'success' => true,
        'message' => 'OTP sent to your email.'
    ]);
}

    public function showVerifyOtpForm()
    {
        return view('frontend.verify-otp');
    }



public function verifyOtp(Request $request)
{
    $request->validate(['otp' => 'required']);
    $email = session('reset_email');
    $student = Signup::where('email', $email)->first();

    if (!$student || $student->otp !== $request->otp || Carbon::now()->gt($student->otp_expires_at)) {
        return response()->json(['message' => 'Invalid or expired OTP'], 422);
    }

    $student->otp = null;
    $student->otp_expires_at = null;
    $student->save();

    session(['otp_verified' => true]);

    return response()->json(['success' => true, 'message' => 'OTP verified']);
}


    public function showResetPasswordForm()
    {
        if (!session('otp_verified')) {
            return redirect()->route('forgot.password');
        }
        return view('frontend.reset-password');
    }

public function resetPassword(Request $request)
{
    $request->validate([
        'password' => 'required|min:6|confirmed',
    ]);

    $student = Signup::where('email', session('reset_email'))->first();

    if (!$student) {
        return response()->json([
            'success' => false,
            'message' => 'Something went wrong. Please try again.'
        ], 404);
    }

    $student->password = Hash::make($request->password);
    $student->save();

    session()->forget(['reset_email', 'otp_verified']);

    return response()->json([
        'success' => true,
        'message' => 'Password reset successfully!',
        'redirect' => route('student.login')
    ]);
}


}
