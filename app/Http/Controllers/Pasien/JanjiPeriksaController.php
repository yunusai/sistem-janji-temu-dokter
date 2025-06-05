<?php

namespace App\Http\Controllers\Pasien;

use App\Models\User;
use App\Models\JanjiPeriksa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JanjiPeriksaController extends Controller
{
    public function index()
    {
        $no_rm = Auth::user()->no_rm;
        $dokters = User::with([
            'jadwalPeriksas' => function ($query) {
                $query->where('status', true);
            },
        ])
            ->where('role', 'dokter')
            ->get();

        return view('pasien.janji-periksa.index')->with([
            'no_rm' => $no_rm,
            'dokters' => $dokters,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_jadwal_periksa' => 'required|exists:jadwal_periksas,id',
            'keluhan' => 'required',
        ]);

        $jumlahJanji = JanjiPeriksa::where('id_jadwal_periksa', $validatedData['id_jadwal_periksa'])->count();
        $noAntrian = $jumlahJanji + 1;

        JanjiPeriksa::create([
            'id_pasien' => Auth::user()->id,
            'id_jadwal_periksa' => $validatedData['id_jadwal_periksa'],
            'keluhan' => $validatedData['keluhan'],
            'no_antrian' => $noAntrian,
        ]);

        return redirect()->route('pasien.janji-periksa.index');
    }
}
