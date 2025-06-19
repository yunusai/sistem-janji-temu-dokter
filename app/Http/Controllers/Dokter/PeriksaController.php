<?php

namespace App\Http\Controllers\Dokter;

use App\Models\Obat;
use App\Models\Periksa;
use App\Models\JanjiPeriksa;
use Illuminate\Http\Request;
use App\Models\DetailPeriksa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PeriksaController extends Controller
{
    public function index()
    {
        $janjiPeriksas = JanjiPeriksa::whereRelation('jadwalPeriksa.dokter', 'id', Auth::user()->id)
            ->whereRelation('jadwalPeriksa', 'status', 1)
            ->get();
        // Logic to display the list of patients to be examined
        return view('dokter.memeriksa.index', [
            'janjiPeriksas' => $janjiPeriksas
        ]);
    }

    public function periksa($id)
    {
        $janjiPeriksa = JanjiPeriksa::findOrFail($id);
        $obats = Obat::all();

        return view('dokter.memeriksa.periksa', [
            'janjiPeriksa' => $janjiPeriksa,
            'obats' => $obats
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_janji_periksa' => 'required',
            'tanggal_periksa' => 'required',
            'catatan' => 'required|string|max:255',
            'biaya_periksa' => 'required|integer|min:0',
        ]);

        $periksa = Periksa::create($validated);

        $obatIds = $request->input('obat', []);
        foreach ($obatIds as $idObat) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat' => $idObat,
            ]);
        }

        return redirect()->route('dokter.memeriksa.index')
            ->with('status', 'periksa-created');
    }

    public function edit($id)
    {
        $periksa = Periksa::findOrFail($id);
        $detailPeriksa = DetailPeriksa::where('id_periksa', $periksa->id)->get();
        $obats = Obat::all();

        return view('dokter.memeriksa.edit', [
            'periksa' => $periksa,
            'obats' => $obats,
            'detailPeriksa' => $detailPeriksa
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal_periksa' => 'required|date',
            'catatan' => 'required|string|max:255',
            'biaya_periksa' => 'required|integer|min:0',
        ]);

        $periksa = Periksa::findOrFail($id);
        $periksa->update($validated);

        // Update detail periksa
        DetailPeriksa::where('id_periksa', $periksa->id)->delete();
        $obatIds = $request->input('obat', []);
        foreach ($obatIds as $idObat) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat' => $idObat,
            ]);
        }

        return redirect()->route('dokter.memeriksa.index')
            ->with('status', 'periksa-updated');
    }
}
