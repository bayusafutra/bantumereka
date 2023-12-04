<?php

namespace App\Models;

use App\Models\User;
use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donasi extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function program(){
        return $this->belongsTo(Program::class, 'id_program');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
