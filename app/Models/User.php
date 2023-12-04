<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Donasi;
use App\Models\Program;
use App\Models\Blog;
use App\Models\Komentar;
use App\Models\Rating;
use App\Models\KategoriProgram;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded =['id'];

    public function program(){
        return $this->hasMany(Program::class, 'id_user');
    }

    public function kategori(){
        return $this->hasMany(KategoriProgram::class, 'id_user');
    }

    public function donasi(){
        return $this->hasMany(Donasi::class, 'id_user');
    }

    public function berita(){
        return $this->hasMany(Blog::class, 'id_user');
    }

    public function komentar(){
        return $this->hasMany(Komentar::class, 'id_user');
    }

    public function rating(){
        return $this->hasMany(Rating::class, 'id_user');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
