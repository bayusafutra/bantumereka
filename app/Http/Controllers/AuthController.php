<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function indexvalidasi(){
        return view('signup.validasi', [
            "title" => "Validasi Akun"
        ]);
    }

    public function validasi(Request $request){
        // dd("erga cantik");
        $rules = [
            "username" => 'required|min:5|max:255|unique:users',
            "password" => 'required|min:5|max:25|confirmed'
        ];

        $validatedData = $request->validate($rules);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::where('id', auth()->user()->id)->update($validatedData);
        return redirect('/');
    }
}
