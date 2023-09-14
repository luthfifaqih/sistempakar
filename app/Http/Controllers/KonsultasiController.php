<?php

namespace App\Http\Controllers;

use App\Models\JawabanKonsultasi;
use App\Models\Konsultasi;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    function index()
    {
        $role = auth()->user()->role;
        if ($role == 'guest') {
            $konsultasi = Konsultasi::with('user')
                ->where('email', auth()->user()->email)
                ->get();
        } else {
            $konsultasi = Konsultasi::with('user')->get();
        }
        return view('konsultasi.index', compact('konsultasi'));
    }

    public function create()
    {
        return view('konsultasi.create');
    }

    function store(Request $request)
    {
        $email = auth()->user()->email;
        $pesan = $request->pesan;
        $insert = Konsultasi::create([
            'pertanyaan' => $pesan,
            'email' => $email
        ]);
        if ($insert) {
            $response = [
                'status' => 1,
                'msg' => 'Berhasil',
                'data' => $insert
            ];
        } else {
            $response = [
                'status' => 0,
                'msg' => 'Gagal',
            ];
        }
        return response()->json($response);
    }

    function detail(Request $request, $id)
    {
        $konsultasi = Konsultasi::with('user', 'jawaban')->where('id_konsultasi', $id)->first();
        return view('konsultasi.detail', compact('konsultasi'));
    }

    function update(Request $request, $id)
    {
        $pesan = $request->pesan;
        $isPakar = auth()->user()->role == 'pakar' ? 1 : 0;
        $insert = JawabanKonsultasi::create([
            'id_konsultasi' => $id,
            'jawaban' => $pesan,
            'pakar' => $isPakar
        ]);
        if ($insert) {
            $response = [
                'status' => 1,
                'msg' => 'Berhasil',
                'data' => $insert
            ];
        } else {
            $response = [
                'status' => 0,
                'msg' => 'Gagal',
            ];
        }
        return response()->json($response);
    }

    function delete($id)
    {
        Konsultasi::where('id_konsultasi', $id)->delete();

        return redirect()->route('konsultasi')
            ->with('success', 'Data Konsultasi Berhasil Dihapus');
    }
}
