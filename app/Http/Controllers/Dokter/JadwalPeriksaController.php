<?php

namespace App\Http\Controllers\Dokter;

use Illuminate\Http\Request;
use App\Models\JadwalPeriksa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JadwalPeriksaController extends Controller
{
    public function index()
    {
        $jadwalPeriksas = JadwalPeriksa::where('id_dokter', Auth::user()->id)->get();
        return view('dokter.jadwal-periksa.index')->with([
            'jadwalPeriksas' => $jadwalPeriksas,
        ]);
    }

    public function create()
    {
        return view('dokter.jadwal-periksa.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'hari' => 'required|string|max:10',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        if (
            JadwalPeriksa::where('id_dokter', Auth::user()->id)
            ->where('hari', $data['hari'])
            ->where('jam_mulai', $data['jam_mulai'])
            ->where('jam_selesai', $data['jam_selesai'])
            ->exists()
        ) {
            return redirect()->back()->withErrors(['error' => 'Jadwal Periksa tersebut sudah ada.']);
        }


        JadwalPeriksa::create([
            'id_dokter' => Auth::user()->id,
            'hari' => $data['hari'],
            'jam_mulai' => $data['jam_mulai'],
            'jam_selesai' => $data['jam_selesai'],
            'status' => 0
        ]);

        return redirect()->route('dokter.jadwal-periksa.index')->with('success', 'Jadwal Periksa berhasil dibuat.');
    }


    public function update($id)
    {
        $jadwalPeriksa = JadwalPeriksa::findOrFail($id);

        if (!$jadwalPeriksa->status) {
            JadwalPeriksa::where('id_dokter', Auth::user()->id)->update(['status' => 0]);

            $jadwalPeriksa->status = true;
            $jadwalPeriksa->save();
            return redirect()->route('dokter.jadwal-periksa.index');
        }

        $jadwalPeriksa->status = false;
        $jadwalPeriksa->save();

        return redirect()->route('dokter.jadwal-periksa.index');
    }

    public function edit($id)
    {
        $jadwalPeriksa = JadwalPeriksa::findOrFail($id);
        return view('dokter.jadwal-periksa.edit')->with([
            'jadwalPeriksa' => $jadwalPeriksa,
        ]);
    }

    public function changeJadwal(Request $request, $id)
    {
        $jadwalPeriksa = JadwalPeriksa::findOrFail($id);

        $data = $request->validate([
            'hari' => 'required|string|max:10',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        if (
            JadwalPeriksa::where('id_dokter', Auth::user()->id)
            ->where('hari', $data['hari'])
            ->where('jam_mulai', $data['jam_mulai'])
            ->where('jam_selesai', $data['jam_selesai'])
            ->exists()
        ) {
            return redirect()->back()->withErrors(['error' => 'Jadwal Periksa tersebut sudah ada.']);
        }

        $jadwalPeriksa->update($data);

        return redirect()->route('dokter.jadwal-periksa.index')->with('success', 'Jadwal Periksa berhasil diubah.');
    }

    public function destroy($id)
    {
        $jadwalPeriksa = JadwalPeriksa::findOrFail($id);
        $jadwalPeriksa->delete();

        return redirect()->route('dokter.jadwal-periksa.index')->with('success', 'Jadwal Periksa berhasil dihapus.');
    }
}
