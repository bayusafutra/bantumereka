<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Donasi;
use App\Models\KategoriProgam;
use App\Models\Komentar;
use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 1)
            ->where(function ($query) {
                $query->whereHas('user', function ($userQuery) {
                    $userQuery->where('name', 'like', '%' . request('search') . '%');
                })
                ->orWhere('judul', 'like', '%' . request('search') . '%')
                ->orWhere(function ($query) {
                    $query->whereHas('kategori', function ($kategoriQuery) {
                        $kategoriQuery->where('nama', 'like', '%' . request('search') . '%');
                    });
                });
            })
            ->get();
        return view('blog.index', [
            "title" => "Kumpulan Berita Bantu Mereka",
            "berita" => $blogs,
            "kategori" => KategoriProgam::where('status', 1)->get()
        ]);
    }

    public function konten($slug)
    {
        $berita = Blog::where('slug', $slug)->first();
        $randomData = DB::table('blogs')->inRandomOrder()->limit(5)->get();
        return view('blog.detailblog', [
            "title" => "Berita " . ucwords($berita->judul),
            "berita" => $berita,
            "komentar" => Komentar::where('id_program', $berita->program->id)->get(),
            "kategori" => KategoriProgam::where('status', 1)->get(),
            "donatur" => Donasi::where('id_program', $berita->program->id)->where('status', 2)->get(),
            "artikel" => $randomData
        ]);
    }

    public function create($slug)
    {
        $program = Program::where('slug', $slug)->first();
        return view('blog.createblog', [
            "title" => "Buat Berita Program",
            "program" => $program
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "judul" => 'required|max:255',
                "gambar" => 'image|file|max:10240',
            ]);

            if ($request->file('gambar')) {
                $validatedData['gambar'] = $request->file('gambar')->store('berita');
            }

            $validatedData['kontent'] = $request->kontent;
            $validatedData['id_user'] = auth()->user()->id;
            $validatedData['id_kategori'] = $request->kategori;
            $validatedData['id_program'] = $request->id;
            $validatedData['slug'] = Str::random(30);
            $validatedData['excerpt'] = Str::words($request->kontent, 15, '...');

            $berita = Blog::create($validatedData);
            return back()->with('success', "Berita $berita->judul berhasil ditambahkan");
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    public function edit($slug)
    {
        $berita = Blog::where('slug', $slug)->first();
        return view('blog.editblog', [
            "title" => "Edit Berita " . ucwords($berita->judul),
            "berita" => $berita
        ]);
    }

    public function update(Request $request)
    {
        $berita = Blog::where('id', $request->idberita)->first();
        $rules = [
            "judul" => 'required|max:255',
            "gambar" => 'image|file|max:10240',
        ];
        $validatedData = $request->validate($rules);
        if ($request->file('gambar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('berita');
        }

        $validatedData['kontent'] = $request->kontent;
        $berita->update($validatedData);
        return back()->with('success', "Berita $berita->judul berhasil diedit");
    }

    /////////////Admin///////////////
    public function admindex(){
        return view('admin.blog.index', [
            "title" => "Dashboard | Berita",    
            "berita" => Blog::paginate(10)
        ]);
    }
}
