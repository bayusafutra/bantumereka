<?php

namespace App\Models;

use App\Models\User;
use App\Models\Program;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class KategoriProgam extends Model
{
    use HasFactory, Sluggable;
    protected $guarded=['id'];

    public function program(){
        return $this->hasMany(Program::class, 'id_kategori');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function berita(){
        return $this->hasMany(Blog::class, 'id_kategori');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
}

