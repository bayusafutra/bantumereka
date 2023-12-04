<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function indexforgotpass(){
        return view('password.forgotpassword', [
            "title" => "Lupa Password"
        ]);
    }

    public function forgotpass(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(210);
        $email= PasswordReset::where('email', $request->email)->get();
        if ($email) {
            DB::table('password_resets')->where(['email'=> $request->email])->delete();
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
              ]);
        } else {
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
              ]);
        }
        $user = User::where('email', $request->email)->first();

        Mail::send('email.forgetpassword', ['token' => $token,'user' => $user], function($message) use($request){
            $message->to($request->email);
            $message->subject('Setel Ulang Kata Sandi');
        });

        return back()->with('message', 'Sistem berhasil mengirip pesan reset password ke email anda');
    }

    public function indexresetpass($token){
        $user = PasswordReset::where('token', $token)->first();
        return view('password.resetpassword', [
            'token' => $token,
            "email" => $user,
            "title" => "Reset Password"
        ]);
    }

    public function resetpass(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                            'email' => $request->email,
                            'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('message', 'Password anda sudah terganti');
    }

}
