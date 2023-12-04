<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\KategoriProgam;
use App\Models\Program;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            "title" => "Bantu Mereka",
            "kategori" => KategoriProgam::where('status', 1)->get(),
            "program" => Program::where('status', 2)->orderBy('deadline')->paginate(6),
            "berita" => Blog::where('status', 1)->paginate(3),
            "rating" => Rating::all()
        ]);
    }

    public function aboutus(){
        return view('dashboard.aboutus', [
            "title" => "Tentang Kami"
        ]);
    }
}
