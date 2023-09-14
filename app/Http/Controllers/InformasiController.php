<?php

namespace App\Http\Controllers;

use App\Models\MasterJenis;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $jenis = MasterJenis::get();
        return view('informasi.index', compact('jenis'));
    }
}
