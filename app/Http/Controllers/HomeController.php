<?php

namespace App\Http\Controllers;

use App\Models\MasterIdenti;
use App\Models\MasterJenis;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $total_jenis = MasterJenis::count();
        $total_identi = MasterIdenti::count();
        return view('home', compact('total_jenis', 'total_identi'));
    }
}
