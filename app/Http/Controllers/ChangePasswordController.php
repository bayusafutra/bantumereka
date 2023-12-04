<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('password.changepassword', [
            "title" => "Ubah Password"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => 'required|confirmed',
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);

        return back()->with('success', "Password anda berhasil diperbarui, Silahkan kembali ke halaman utama");
    }
}
