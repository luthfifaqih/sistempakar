<?php

namespace App\Http\Controllers;

use App\Models\MasterJenis;
use Illuminate\Http\Request;

class MasterJenisController extends Controller
{
    public function index()
    {

        $jenis = MasterJenis::orderBy('kd_jenis', 'asc')->latest()->paginate(20);
        return view('master_jenis.index', compact('jenis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kd_jenis' => 'required',
            'nama_jenis' => 'required',
            'penanganan' => 'required',
        ]);

        $js = new MasterJenis();

        $js->kd_jenis = $request->kd_jenis;
        $js->nama_jenis = $request->nama_jenis;
        $js->penanganan = $request->penanganan;
        $js->save();

        return redirect('master_jenis')->with('success', 'Tambah Jenis Berhasil');
    }

    public function create()
    {
        $jenis = MasterJenis::get();
        return view('master_jenis.create', compact('jenis'));
    }

    public function edit($serang)
    {
        $jenis = MasterJenis::where('id', $serang)->first();
        return view('master_jenis.edit', compact('jenis'));
    }

    public function update(Request $request, $jenis)
    {
        $request->validate([
            'kd_jenis' => 'required',
            'nama_jenis' => 'required',
            'penanganan' => 'required',
        ]);

        $data = [
            'kd_jenis' => $request->kd_jenis,
            'nama_jenis' => $request->nama_jenis,
            'penanganan' => $request->penanganan,
        ];

        $serang = MasterJenis::where('id', $jenis)->update($data);

        return redirect()->route('master_jenis.index')
            ->with('success', 'Data Jenis Berhasil Diupdate');
    }

    public function delete($jenis)
    {
        MasterJenis::where('id', $jenis)->delete();

        return redirect()->route('master_jenis.index')
            ->with('success', 'Data Jenis Berhasil Dihapus');
    }
}
