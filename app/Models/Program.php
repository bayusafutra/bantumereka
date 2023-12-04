<?php

namespace App\Models;

use App\Models\User;
use App\Models\Donasi;
use App\Models\Blog;
use App\Models\Komentar;
use App\Models\KategoriProgam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function kategori(){
        return $this->belongsTo(KategoriProgam::class, 'id_kategori');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function donasi(){
        return $this->hasMany(Donasi::class, 'id_program');
    }

    public function berita(){
        return $this->hasMany(Blog::class, 'id_program');
    }

    public function komentar(){
        return $this->hasMany(Komentar::class, 'id_program');
    }
}
