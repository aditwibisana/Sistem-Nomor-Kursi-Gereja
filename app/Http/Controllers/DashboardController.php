<?php

namespace App\Http\Controllers;

use App\Models\Ibadah;
use App\Models\Jemaat;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $ibadah = Ibadah::all();
        return view('dashboard.index')->with('ibadah', $ibadah);
    }
    public function daftar()
    {
        return view('dashboard.daftar');
    }
    public function daftarIbadah($id)
    {
        $ibadah = Ibadah::whereId($id);
        return view('dashboard.form')->with('form', $ibadah);;
    }
    public function ibadahDaftar($id)
    {
        $ibadah = Ibadah::find($id);
        return view('dashboard.pendaftaran', compact('ibadah'));
    }
    public function contoh()
    {
        $ibadah = Ibadah::all();
        return view('dashboard.contoh')->with('ibadah', $ibadah);
    }
    public function prosesDaftar(Request $request)
    {
        $jemaat = Jemaat::count();
        if ($jemaat == 0) {
            $id = $request->id;
            $gereja = Ibadah::find($id);
            $jumlah_kursi = $gereja->kapasitas_kursi;
            $setKursi = array();
            for ($i = 1; $i <= $jumlah_kursi; $i++) {
                $satu = [];
                $satu = $i;
                $setKursi[] = $satu;
                array_unshift($setKursi, "phoney"); // memulai array dari 1
                unset($setKursi[0]);
            }
            $daftar = Jemaat::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'nik' => $request->nik,
                'usia' => $request->usia,
                'no_kursi' => $setKursi[1],
            ]);
            $sisa_kursi = $gereja->kapasitas_kursi - $setKursi[1];
            $update_sisa_kursi = Ibadah::find($id)->update([
                'kapasitas_kursi' => $sisa_kursi
            ]);
        } else {
            # code...
        }
    }
}
