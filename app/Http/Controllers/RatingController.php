<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index(Request $request)
    {
        $validatedData["id_user"] = auth()->user()->id;
        $validatedData["rating"] = $request->rating;
        $validatedData["comment"] = $request->comment;

        Rating::create($validatedData);
        return redirect('/#rating')->with('success', "Penilaian anda berhasil ditambahkan");
    }
}
