<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDonasiRequest;
use App\Http\Requests\UpdateDonasiRequest;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DonasiController extends Controller
{
    public function index($slug)
    {
        return view('dashboard.donasi', [
            "title" => "Donasi",
            "program" => Program::where('slug', $slug)->first()
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            if ($request->anonim2 == "on") {
                $validatedData['anonim'] = $request->anonim;
            } else {
                $validatedData['anonim'] = null;
            }
            if ($request->nominal2 == "on") {
                $rupiah1 = str_replace('.', '', $request->nominal);
                $rupiah2 = str_replace('Rp', '', $rupiah1);
                $rupiah3 = str_replace(',00', '', $rupiah2);
                $validatedData['nominal'] = $rupiah3;
            } else {
                $validatedData['nominal'] = $request->nominal2;
            }
            $validatedData['doa'] = $request->doa;
            $validatedData['slug'] = Str::random(30);
            $validatedData['id_user'] = auth()->user()->id;
            $validatedData['id_program'] = $request->id_program;
            // $program = Program::where('id', $request->id_program)->first();
            // $update['danaskrg'] = $program['danaskrg'] +  $validatedData['nominal'];
            // Program::where('id', $request->id_program)->update($update);
            $donasi = Donasi::create($validatedData);
            $donasi->update([
                'deadlinePaid' => $donasi->created_at->addDays(1)
            ]);
            $program = Program::where('id', $donasi->program->id)->first();
            $title = "Detail Donasi";

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;
            // dd($donasi);
            $params = array(
                'transaction_details' => array(
                    'order_id' => $donasi->id,
                    'gross_amount' => $donasi->nominal + 1000,
                ),
                'customer_details' => array(
                    'first_name' => $donasi->user->name,
                    'last_name' => '',
                    'email' => $donasi->user->email,
                    'phone' => $donasi->user->notelp,
                ),
            );
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $validatedData['snapToken'] = $snapToken;
            Donasi::where('id', $donasi->id)->update($validatedData);

            return view('dashboard.checkoutdonasi', compact('snapToken', 'donasi', 'program', 'title'))->with('success', 'Donasi yang anda lakukan telah berhasil, Silahkan lakukan pembayaran!');
        } catch (\Throwable $th) {
            // return back()->with('error', "Pastikan semua field terisi");
            echo $th;
        }
    }

    public function detaildonasi($slug)
    {
        $donasi = Donasi::where('slug', $slug)->first();
        return view('dashboard.detaildonasi', [
            "title" => "Detail Donasi",
            "donasi" => $donasi,
            "program" => Program::where('slug', $donasi->program->slug)->first()
        ]);
    }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture' || $request->transaction_status == 'settlement'){
                $donasi = Donasi::where('id', $request->order_id)->first();
                $donasi->update([
                    'status' => 2,
                    'paidTime' => Carbon::now()
                ]);

                $program = Program::where('id', $donasi->program->id)->first();
                $update['danaskrg'] = $program['danaskrg'] +  $donasi->nominal;
                $program->update($update);

                $user = User::where('id', $donasi->user->id)->first();
                $duwek['totalsaldo'] = $user['totalsaldo'] +  $donasi->nominal;
                $user->update($duwek);
            }

        }
    }

    public function detailtransaksi($slug){
        $donasi = Donasi::where('slug', $slug)->first();
        return view('dashboard.detailtransaksi', [
            "title" => "Detail Transaksi",
            "donasi" => $donasi,
            "program" => Program::where('id', $donasi->program->id)->first()
        ]);
    }

    public function batal(Request $request){
        $donasi = Donasi::where('id', $request->id)->first();
        $update['pesanbatal'] = $request->pesanbatal;
        $update['status'] = 3;
        $donasi->update($update);

        return redirect('/transaksisaya');
    }

    ///////admin///////

    public function admindex(){
        return view('admin.donasi.index', [
            "title" => "Dashboard | Donasi",
            "donasi" => Donasi::paginate(10)
        ]);
    }
}
