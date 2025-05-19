<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    // Login 
    public function ShowLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string'
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Kata sandi tidak boleh kosong.',
        ]);
    
        $user = User::where('username', $request->username)->first();
    
        if (!$user) {
            return back()->withErrors([
                'username' => 'Username tidak terdaftar.',
            ])->withInput();
        }
    
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Kata sandi salah.',
            ])->withInput();
        }
    
        Auth::login($user, $request->has('remember'));
    
        $request->session()->regenerate();
        Session::put('role', $user->role);
    
        if ($user->role === 'admin') {
            return redirect()->route('BerandaAdmin');
        } elseif ($user->role === 'customer') {
            return redirect()->route('Beranda');
        }
    }

    // Register
    public function ShowRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|same:password',
            'terms' => 'accepted',
        ],[
            'nama_lengkap.required' => 'Nama lengkap tidak boleh kosong.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Kata sandi tidak boleh kosong.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'password_confirmation.required' => 'Konfirmasi kata sandi wajib diisi.',
            'password_confirmation.same' => 'Konfirmasi kata sandi tidak cocok.',
            'terms.accepted' => 'Anda harus menyetujui Syarat & Ketentuan.',
        ]);

        $user = User::create([
            'name' => $request->nama_lengkap,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect()->route('sukses');
    }

    // google
    public function google_redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function google_callback() {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::whereEmail($googleUser->email)->first();
        if (!$user){
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email
            ]);
        }
        Auth::login($user);
        return match ($user->role) {
            'admin' => redirect()->route('BerandaAdmin'),
            'customer' => redirect()->route('Beranda'),
            default => redirect()->route('Beranda'),
        };
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // verify
    public function ShowVerEmail()
    {
        return view('auth.verify_email');
    }

    public function verifyEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255'
        ],[
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan dalam sistem.');
        }

        $otp = random_int(100000, 999999);

        PasswordReset::updateOrCreate(
            ['email' => $request->email],
            [
                'otp' => $otp,
                'expires_at' => Carbon::now()->addMinutes(10)
            ]
        );

        session(['email' => $request->email]);
        
        Mail::raw("Kode OTP Anda adalah: $otp (berlaku selama 10 menit)", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Kode OTP Reset Password');
        });

        return redirect()->route('OTP')->with('success', 'Kode OTP berhasil dikirim, silakan cek email Anda.');
    }

    public function ShowOtp()
    {
        if(!session('email')) {
            return back();
        }
        
        return view('auth.otp');
    }

    public function cekOtp(Request $request)
    {

        $otp = is_array($request->otp_digit) ? implode('', $request->otp_digit) : $request->otp;
        $request->merge(['otp' => $otp]);

        $request->validate([
            'otp' => 'required|numeric|digits:6'
        ], [
            'otp.required' => 'Kode OTP wajib diisi.',
            'otp.numeric' => 'Kode OTP harus berupa angka.',
            'otp.digits' => 'Kode OTP harus terdiri dari 6 digit.'
        ]);

        $email = session('email');
        if (!$email) {
            return back()->with('error', 'Session tidak ditemukan, silakan coba lagi.');
        }

        $passwordReset = PasswordReset::where('email', $email)->first();

        if (now()->greaterThan($passwordReset->expires_at)) {
            $passwordReset->delete();
            return back()->with('error', 'Kode OTP telah kedaluwarsa.');
        }

        if ($otp !== $passwordReset->otp) {
            return back()->with('error', 'Kode OTP tidak valid.');
        }
        
        $passwordReset->delete();
        return redirect()->route('NewPassword');
    }

    public function ShowCreatePass()
    {
        if(!session('email')) {
            return back();
        }
        
        return view('auth.reset_password');
    }

    public function veriNewPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password',
        ],[
            'password.required' => 'Kata sandi tidak boleh kosong.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password_confirmation.required' => 'Konfirmasi kata sandi wajib diisi.',
            'password_confirmation.same' => 'Konfirmasi kata sandi tidak cocok.',
        ]);

        $email = session('email');
        $user = User::where('email', $email)->first();
        
        $user->update(['password' => Hash::make($request->password)]);
        
        session()->forget('email');

        return redirect()->route('suksesNewPassword');
    }

    public function showSuccess()
    {
        return view('auth.succes_riset');
    }
}