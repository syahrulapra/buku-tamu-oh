<?php

namespace App\Http\Controllers;

use App\Models\tamu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class form extends Controller
{
    public function form()
    {
        $dataKemarin = tamu::whereDate('created_at', Carbon::yesterday())->get();
        $dataToday = tamu::whereDate('created_at', Carbon::today())->get();
        $dataAll = tamu::all();
        return view('tamu', ['tamu_kemarin' => $dataKemarin, 'tamu_today' => $dataToday, 'tamu_all' => $dataAll]);
    }

    public function tambah(Request $req)
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
        
        $data = tamu::where('nama', 'like', "%".$cari."%")
        ->orWhere('alamat', 'like', "%".$cari."%")
        ->paginate(10);

        if ($data->count() > 0) {
            $dataKemarin = tamu::whereDate('created_at', Carbon::yesterday())->get();
            $dataToday = tamu::whereDate('created_at', Carbon::today())->get();
            $dataAll = tamu::all();
            foreach ($data as $item) {
                $item->hari = Carbon::parse($item->created_at)->dayName;
            }
            return view('listtamu', ['data' => $data, 'tamu_kemarin' => $dataKemarin, 'tamu_today' => $dataToday, 'tamu_all' => $dataAll]);
        } else {
            return redirect('list')->with('error', 'Maaf, data yang Anda cari tidak ditemukan.');
        }
    }

    public function index()
    {
        $data = tamu::selectRaw('*, DATE_FORMAT(created_at, "%W") as hari')->paginate(9);
        $dataKemarin = tamu::whereDate('created_at', Carbon::yesterday())->get();
        $dataToday = tamu::whereDate('created_at', Carbon::today())->get();
        $dataAll = tamu::all();
        return view('listtamu', ['data' => $data, 'tamu_kemarin' => $dataKemarin, 'tamu_today' => $dataToday, 'tamu_all' => $dataAll]);
    }

    public function hapus($id)
    {
        $data=tamu::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function hari($hari)
    {
        if($hari == 'thursday'){
            $getHari = 3;
        }
        else if($hari == 'friday'){
            $getHari = 4;
        }
        else if($hari == 'saturday'){
            $getHari = 5;
        }
        else{
            $getHari = 'error';
        }

        if($getHari == 'error'){
            return redirect('list');
        }
        else{
            $data = tamu::selectRaw('*, DATE_FORMAT(created_at, "%W") as hari')->whereRaw('weekday(created_at) = '. $getHari)->paginate(10);
            $dataToday = tamu::whereRaw('weekday(created_at) = '. $getHari)->get();
    
            return view('listhari', ['data' => $data, 'tamu_today' => $dataToday]);
        }
    }
}