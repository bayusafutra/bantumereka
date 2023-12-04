<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\KategoriProgam;
use App\Models\Program;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProgramController extends Controller
{
    public function index(){
        $program = Program::first();
        return view('admin.program.index', [
            "title" => "Dashboard | Program",
            "program" => Program::paginate(10),
            "first" => $program
        ]);
    }

    public function indexcreate(){
        return view('admin.program.createprogram', [
            "title" => "Dashboard | BuatProgram",
            "kategori" => KategoriProgam::where('status', 1)->get()
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
        $validatedData['slug'] = Str::random(30);
        $validatedData['status'] = 2;
        $validatedData['id_user'] = auth()->user()->id;
        // dd($validatedData);
        Program::create($validatedData);
        $program = Program::where('slug', $validatedData['slug'])->first();
        return back()->with('success', "Program bantuan: $program->nama berhasil ditambahkan");
    }

    public function allprogram(){
        return view('admin.program.allprogram', [
            "title" => "Dashboard | Semua Program",
            "program" => Program::all(),
            "kategori" => KategoriProgam::all()
        ]);
    }

    public function pending(){
        return view('admin.program.programpending', [
            "title" => "Dashboard | Pending Program",
            "program" => Program::where('status', 1)->paginate(10)
        ]);
    }

    public function detailpending($slug){
        $program = Program::where("slug", $slug)->first();
        return view('admin.program.detailpending', [
            "title" => "Dashboard | Pending Program $program->nama",
            "program" => $program,
            "berita" => Blog::where('id_program', $program->id)->get()
        ]);
    }

    public function verifikasi(){
        $id=request('id');
        $validatedData['status'] = 2;
        Program::where('id', $id)->update($validatedData);
        $program = Program::where('id', $id)->first();
        return redirect('/dash-programpending')->with('success', "Program $program->nama berhasil terverifikasi");
    }

    public function reject(Request $request){
        $id=request('id');
        $validatedData = $request->validate([
            "pesanbatal" => 'required'
        ]);
        $validatedData['status'] = 4;
        Program::where('id', $id)->update($validatedData);
        $program = Program::where('id', $id)->first();
        return redirect('/dash-programpending')->with('success', "Program $program->nama berhasil dibatalkan");
    }

    public function batal(){
        return view('admin.program.programbatal', [
            "title" => "Dashboard | Reject Program",
            "program" => Program::where('status', 4)->paginate(10)
        ]);
    }

    public function aktif(){
        return view('admin.program.programaktif', [
            "title" => "Dashboard | Aktif Program",
            "program" => Program::where('status', 2)->paginate(10)
        ]);
    }

    public function vakum(Request $request){
        $id=request('id');
        $validatedData = $request->validate([
            "pesannonaktif" => 'required'
        ]);
        $validatedData['status'] = 3;
        Program::where('id', $id)->update($validatedData);
        $program = Program::where('id', $id)->first();
        return redirect('/dash-programaktif')->with('success', "Program $program->nama berhasil dinonaktifkan");
    }

    public function nonaktif(){
        return view('admin.program.programnonaktif', [
            "title" => "Dashboard | Non Aktif Program",
            "program" => Program::where('status', 3)->paginate(10)
        ]);
    }

    public function aktifkan(){
        $id=request('id');
        $validatedData['status'] = 2;
        $validatedData['pesannonaktif'] = null;
        Program::where('id', $id)->update($validatedData);
        $program = Program::where('id', $id)->first();
        return redirect('/dash-programnonaktif')->with('success', "Program $program->nama berhasil diaktifkan kembali");
    }

    public function selesai(){
        return view('admin.program.programselesai', [
            "title" => "Dashboard | Program Selesai",
            "program" => Program::where('status', 5)->paginate(10)
        ]);
    }
}
