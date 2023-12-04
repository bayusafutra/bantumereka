<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Http\Requests\StoreKomentarRequest;
use App\Http\Requests\UpdateKomentarRequest;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index(Request $request)
    {
        try {
            $validatedData['id_program'] = $request->program;
            $validatedData['id_user'] = auth()->user()->id;
            $validatedData['comment'] = $request->comment;

            Komentar::create($validatedData);
            return back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}
