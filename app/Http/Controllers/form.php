<?php

namespace App\Http\Controllers;

use App\Models\tamu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class form extends Controller
{
    public function form(Request $req)
    {
        $pesan = [
            'required'  => 'Harap isi data diatas',
            'alpha'     => 'Data di atas hanya bisa di isi menggunakan nama',
            'regex'     => 'Data hanya bisa diisi dengan huruf',
            'unique'    => 'Kamu sudah tercatat dalam database'
        ];

        $this->validate($req, [
            'nama' => 'required|regex:/^[a-zA-Z\s]*$/|unique:tamu',
            'alamat' => 'required',
        ], $pesan);

        $alamat = $req->alamat;
        $alamat = strtolower($alamat);
        if (strpos($alamat, 'sd') !== false || strpos($alamat, 'smp') !== false || strpos($alamat, 'sma') !== false || strpos($alamat, 'smk') !== false) {
            $alamat = strtoupper($alamat);
        }

        tamu::create([
            'nama'          => ucwords($req->nama),
            'alamat'        => ucwords($alamat),
            'created_at'    => Carbon::now()

        ]);

        return redirect()->back();    
    }

    public function cari(Request $req)
    {
        $cari = $req->nama;

        if (!$cari) {
            return redirect('list');
        }
        
        $data = tamu::where('nama', 'like', "%".$cari."%")->orWhere('alamat', 'like', "%".$cari."%")->paginate(10);

        if ($data->count() > 0) {
            return view('listtamu', ['data' => $data]);
        } else {
            return redirect('list')->with('error', 'Maaf, data yang Anda cari tidak ditemukan.');
        }
    }

    public function index()
        {
            $data = tamu::paginate(10);
            return view('listtamu', ['data' => $data]);
        }
}