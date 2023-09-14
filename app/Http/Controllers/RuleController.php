<?php

namespace App\Http\Controllers;

use App\Models\MasterIdenti;
use App\Models\MasterJenis;
use App\Models\TransaksiRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RuleController extends Controller
{
    public function index()
    {
        // $a = TransaksiRule::latest()->paginate(15);
        $rule = DB::table('t_rule')
            ->join('m_jenis', 't_rule.m_jenis_id', '=', 'm_jenis.id')
            ->join('m_identi', 't_rule.m_identi_id', '=', 'm_identi.id')
            ->select(
                't_rule.id',
                't_rule.m_jenis_id',
                't_rule.m_identi_id',
                't_rule.bobot_alt',
                'm_jenis.nama_jenis',
                'm_identi.identi',
            )
            ->get();


        return view('t_rule.index', compact('rule'));
    }

    public function store(Request $request)
    {

        $data = $this->validate($request, [
            'identi' => 'required',
            'nama_jenis' => 'required',
            'bobot_sds' => 'required',
            'bobot_scf' => 'required',
        ]);

        $rule = new TransaksiRule();
        $rule->m_jenis_id = $data['nama_jenis'];
        $rule->m_identi_id = $data['identi'];
        $rule->bobot_sds = $data['bobot_sds'];
        $rule->bobot_scf = $data['bobot_scf'];

        if ($data['bobot_sds'] >= $data['bobot_scf']) {
            $rule->bobot_alt = $data['bobot_sds'];
        } else {
            $rule->bobot_alt = $data['bobot_scf'];
        }
        $rule->save();

        return redirect('t_rule')->with('success', 'Tambah Data Berhasil');
    }

    public function create()
    {
        $jenis = MasterJenis::get();
        $identi = MasterIdenti::get();

        return view('t_rule.create', compact('jenis', 'identi'));
    }

    public function edit($rule)
    {

        $jenis = MasterJenis::get();
        $identi = MasterIdenti::get();
        $rule = TransaksiRule::where('id', $rule)->first();


        return view('t_rule.edit', compact('rule', 'jenis', 'identi'));
    }

    public function update(Request $request, $rule)
    {
        $data = $this->validate($request, [
            'identi' => 'required',
            'nama_jenis' => 'required',
            'bobot_sds' => 'required',
            'bobot_scf' => 'required',
        ]);



        $rule = TransaksiRule::find($rule);
        $rule->m_identi_id = $data['identi'];
        $rule->m_jenis_id = $data['nama_jenis'];
        $rule->bobot_sds = $data['bobot_sds'];
        $rule->bobot_scf = $data['bobot_scf'];

        if ($data['bobot_sds'] >= $data['bobot_scf']) {
            $rule->bobot_alt = $data['bobot_sds'];
        } else {
            $rule->bobot_alt = $data['bobot_scf'];
        }


        $rule->save();


        return redirect()->route('t_rule.index')->with('success', 'Data berhasil diperbarui.');
    }


    public function delete($rule)
    {
        TransaksiRule::where('id', $rule)->delete();

        return redirect()->route('t_rule.index')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
