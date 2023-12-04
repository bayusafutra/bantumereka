<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            "title" => "Administrator",
            "all" => Program::all(),
            "aktif" => Program::where('status', 2)->get(),
            "non" => Program::where('status', 3)->get(),
            "pending" => Program::where('status', 1)->get(),
            "batal" => Program::where('status', 4)->get(),
            "selesai" => Program::where('status', 5)->get(),
        ]);
    }

    public function user()
    {
        return view('admin.user', [
            "title" => "Administrator",
            "user" => User::paginate(10)
        ]);
    }

    public function isAdmin(){
        $user = User::where('id', request("id"))->first();
        $update["roleid"] = 1;
        $user->update($update);
        return back()->with('succeess', "User $user->name berhasil menjadi admin");
    }
}
