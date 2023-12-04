<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Donasi;
use Illuminate\Http\Request;
use App\Models\KategoriProgam;
use App\Models\Program;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProgramDonasiController extends Controller
{
    public function index(){
        return view('dashboard.createprogram', [
            "title" => "Buat Penggalangan Dana",
            "kategori" => KategoriProgam::all()
        ]);
    }

    public function store (Request $request){
        $validatedData = $request->validate([
            "nama" => 'required|max:255',
            "id_kategori" => 'required',
            "deskripsi" => 'max:5000',
            "gambar" => 'image|file|max:10240',
            "deadline" => 'required'
        ]);
        $rupiah1 = str_replace('.', '', $request->targetdana);
        $rupiah2 = str_replace('Rp', '', $rupiah1);
        $rupiah3 = str_replace(',00', '', $rupiah2);
        $validatedData['targetdana'] = $rupiah3;

        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('program');
        }
        $kategori = KategoriProgam::where('id', $request->id_kategori)->get();
        $validatedData['slug'] = Str::random(30);
        $validatedData['id_user'] = auth()->user()->id;
        Program::create($validatedData);
        $program = Program::where('slug', $validatedData['slug'])->first();
        return back()->with('success', "Program bantuan: $program->nama berhasil ditambahkan");
    }

    public function detailprogram($slug){
        $program = Program::where('slug', $slug)->first();
        return view('dashboard.detailprogram', [
            "title" => "Program ".ucwords($program->nama),
            "program" => $program,
            "donatur" => Donasi::where('id_program', $program->id)->where('status', 2)->orderByDesc('nominal')->paginate(5),
            "donatur2" => Donasi::where('id_program', $program->id)->where('status', 2)->get(),
            "berita" => Blog::where('id_program', $program->id)->get()
        ]);
    }

    public function update(Request $request){
        $program = Program::where('id', $request->id)->first();
        $rules = [
            "nama" => 'required|max:255',
            "deskripsi" => 'max:5000',
            "deadline" => 'required',
            "gambar" => 'image|file|max:10240'
        ];
        $validatedData = $request->validate($rules);
        if ($request->file('gambar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('program');
        }

        $rupiah1 = str_replace('.', '', $request->targetdana);
        $rupiah2 = str_replace('Rp', '', $rupiah1);
        $rupiah3 = str_replace(',00', '', $rupiah2);
        $validatedData['targetdana'] = $rupiah3;


        $program->update($validatedData);
        return back()->with('update', 'Program donasi berhasil di update');
    }

    public function all(){
        return view('dashboard.allprogram', [
            "title" => "Program Donasi Bantu Mereka",
            "program" => Program::where('status', 2)
            ->where('nama', 'like', '%' . request('search') . '%')
            ->get(),
            "kategori" => KategoriProgam::where('status', 1)->get(),
            "search" => request('search')
        ]);
    }
}
