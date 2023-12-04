<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Program;
use App\Models\KategoriProgam;

class Blog extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function program(){
        return $this->belongsTo(Program::class, 'id_program');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kategori(){
        return $this->belongsTo(KategoriProgam::class, 'id_kategori');
    }
}
