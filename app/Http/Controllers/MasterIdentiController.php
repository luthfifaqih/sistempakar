<?php

namespace App\Http\Controllers;

use App\Models\MasterIdenti;
use Illuminate\Http\Request;

class MasterIdentiController extends Controller
{
    public function index()
    {
        $identi = MasterIdenti::orderBy('kd_identi', 'asc')->latest()->paginate(25);
        return view('master_identi.index', compact('identi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kd_identi' => 'required',
            'identi' => 'required',

        ]);

        $idf = new MasterIdenti();

        $idf->kd_identi = $request->kd_identi;
        $idf->identi = $request->identi;
        $idf->save();

        return redirect('master_identi')->with('success', 'Tambah Identifikasi Berhasil');
    }

    public function create()
    {
        $identi = MasterIdenti::get();
        return view('master_identi.create', compact('identi'));
    }

    public function edit($tifikasi)
    {
        $identi = MasterIdenti::where('id', $tifikasi)->first();
        return view('master_identi.edit', compact('identi'));
    }

    public function update(Request $request, $identi)
    {
        $request->validate([
            'kd_identi' => 'required',
            'identi' => 'required',

        ]);

        $data = [
            'kd_identi' => $request->kd_identi,
            'identi' => $request->identi,

        ];

        $serang = MasterIdenti::where('id', $identi)->update($data);

        return redirect()->route('master_identi.index')
            ->with('success', 'Data Identifikasi Berhasil Diupdate');
    }

    public function delete($identi)
    {
        MasterIdenti::where('id', $identi)->delete();

        return redirect()->route('master_identi.index')
            ->with('success', 'Data Jenis Berhasil Dihapus');
    }
}
