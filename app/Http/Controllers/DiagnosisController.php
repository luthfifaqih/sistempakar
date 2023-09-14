<?php

namespace App\Http\Controllers;

use App\Models\MasterBobot;
use App\Models\MasterIdenti;
use App\Models\TransaksiDiagnosis;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DiagnosisController extends Controller
{
    public function index()
    {
        $diagnosa = MasterIdenti::get();
        $bobot = MasterBobot::get();
        return view('diagnosis.index', compact('diagnosa', 'bobot'));
    }

    public function prosesDiagnosis(Request $request)
    {
        $identi = $request->identi;
        $bobot = $request->bobot;
        // filter null bobot
        $bobot = array_filter($bobot);


        // merge array identi dan bobot
        $dataIdentiBobot = array_combine($identi, $bobot);

        $diagnosa = DB::table('t_rule')
            ->select('m_jenis_id', DB::raw('count(m_jenis_id) as total_gejala'))
            ->whereIn('m_identi_id', $identi)
            ->groupBy('m_jenis_id')
            ->get();

        $paling_banyak_gejala = '';
        $nilai_paling_banyak = 0;
        $hasil = [];

        foreach ($diagnosa as $key => $value) {
            if ($value->total_gejala > $nilai_paling_banyak) {
                $paling_banyak_gejala = $value->m_jenis_id;
                $nilai_paling_banyak = $value->total_gejala;
            }
            //select count t_rule
            $count = DB::table('t_rule')
                ->select(DB::raw('count(m_jenis_id) as total'))
                ->where('m_jenis_id', $value->m_jenis_id)
                ->first();

            $total = $count->total;
            $tempData = $total - $value->total_gejala;
            $hasil[$value->m_jenis_id] = $tempData;
        }


        //get min value
        $m_jenis_id = array_keys($hasil, min($hasil));
        if (count($m_jenis_id) > 1) {
            $m_jenis_id = $paling_banyak_gejala;
        } else {
            $m_jenis_id = $m_jenis_id[0];
        }

        // perhitungan CF
        $diagnosa = DB::table('t_rule')
            ->join('m_jenis', 't_rule.m_jenis_id', '=', 'm_jenis.id')
            ->select('t_rule.*', 'm_jenis.nama_jenis')
            ->where('t_rule.m_jenis_id', $m_jenis_id)
            ->get();

        // perkalian nilai pakar dengan nilai bobot user
        $keterangan_perkalian_cf = [];
        $hasil_cf = [];

        foreach ($diagnosa as $key => $value) {
            $keterangan_perkalian_cf[] = $value->bobot_alt . ' * ' . ($dataIdentiBobot[$value->m_identi_id] ?? 0);
            $temp_hasil_cf = $value->bobot_alt * ($dataIdentiBobot[$value->m_identi_id] ?? 0);
            $hasil_cf[] = [
                'identi' => $value->m_identi_id,
                'nilai' => number_format($temp_hasil_cf, 2, '.', '')
            ];
        }

        // CF combine
        $keterangan_cf_combine = [];
        $hasil_cf_combine = [];

        foreach ($hasil_cf as $key => $value) {
            // Check if it's not the last data
            if ($key != count($hasil_cf) - 1) {
                // Get the next index value
                $next_index = $key + 1;
                $next_item = $hasil_cf[$next_index] ?? null;

                if ($key == 0) {
                    $keterangan_cf_combine[] = $value['nilai'] . ' + ' . ($next_item['nilai'] ?? 0) . ' * ' . (1 - $value['nilai']);
                    $hasil_cf_combine[] = $value['nilai'] + ($next_item['nilai'] ?? 0) * (1 - $value['nilai']);
                } else {
                    $keterangan_cf_combine[] = $hasil_cf_combine[$key - 1] . ' + ' . ($next_item['nilai'] ?? 0) . ' * ' . (1 - $hasil_cf_combine[$key - 1]);
                    $hasil_cf_combine[] = $hasil_cf_combine[$key - 1] + ($next_item['nilai'] ?? 0) * (1 - $hasil_cf_combine[$key - 1]);
                }
            }
        }

        //get last value of index CF
        $last_index = count($hasil_cf_combine) - 1;
        $nilai_akhir_cf = $hasil_cf_combine[$last_index];
        $persentase_nilai_akhir_cf = number_format($nilai_akhir_cf * 100, 0, '.', '');


        // DS
        $belief = [];
        $plausible = [];
        $keterangan_ds = [];
        $temp_nilai_ds = [];
        $keterangan_tabel = [];
        $label_hr = 2;
        $label_ver = 1;

        foreach ($diagnosa as $key => $value) {
            // Check if it's not the last data
            $belief[] = $value->bobot_sds;
            $plausible[] = 1 - $value->bobot_sds;
            if ($key != count($diagnosa) - 1) {
                // Get the next index value
                $next_index = $key + 1;
                $next_item = $diagnosa[$next_index] ?? null;

                if ($key == 0) {
                    // DS
                    $keterangan_tabel[] = [
                        ["", "M$label_hr", "M$label_hr{ʘ}"],
                        ["M$label_ver", $value->bobot_sds * ($next_item->bobot_sds ?? 0), $value->bobot_sds * ($next_item->bobot_sds ? 1 - $next_item->bobot_sds : 0)],
                        ["M$label_ver{ʘ}", ($next_item->bobot_sds ?? 0) * (1 - $value->bobot_sds), (1 - $value->bobot_sds) * ($next_item->bobot_sds ? 1 - $next_item->bobot_sds : 0)],
                    ];
                    $keterangan_ds[] = [
                        [
                            "M" . $label_ver + 2 . " = (" . $value->bobot_sds * ($next_item->bobot_sds ?? 0) . " + " . ($next_item->bobot_sds ?? 0) * (1 - $value->bobot_sds) . ") / (1 - 0) = " . ($value->bobot_sds * ($next_item->bobot_sds ?? 0) + ($next_item->bobot_sds ?? 0) * (1 - $value->bobot_sds)) / 1,
                            "M" . $label_ver + 2 . " = " . $value->bobot_sds * ($next_item->bobot_sds ? 1 - $next_item->bobot_sds : 0) . " / (1 - 0) = " . ($value->bobot_sds * ($next_item->bobot_sds ? 1 - $next_item->bobot_sds : 0)),
                            "M" . $label_ver + 2 . " = " . (1 - $value->bobot_sds) * ($next_item->bobot_sds ? 1 - $next_item->bobot_sds : 0) . " / (1 - 0) = " . ((1 - $value->bobot_sds) * ($next_item->bobot_sds ? 1 - $next_item->bobot_sds : 0))
                        ]
                    ];
                    $temp_nilai_ds[] = [
                        [
                            ($value->bobot_sds * ($next_item->bobot_sds ?? 0) + ($next_item->bobot_sds ?? 0) * (1 - $value->bobot_sds)) / 1,
                            $value->bobot_sds * ($next_item->bobot_sds ? 1 - $next_item->bobot_sds : 0),
                            ((1 - $value->bobot_sds) * ($next_item->bobot_sds ? 1 - $next_item->bobot_sds : 0))
                        ]
                    ];
                } else {
                    // DS
                    $temp_keterangan_tabel = [];
                    $perhitungan_sum = 0;
                    $selain_perhitungan_sum = [];
                    $label_perhitungan_sum = "M" . $label_ver + 2 . " = ";
                    $label_selain_perhitungan_sum = [];
                    $label = ["", "M$label_hr", "M$label_hr{ʘ}"];
                    array_push($temp_keterangan_tabel, $label);
                    foreach ($temp_nilai_ds[$key - 1] as $item) {
                        foreach ($item as $key => $value) {
                            $label = ["M$label_ver", $value * ($next_item->bobot_sds ?? 0), $value * ($next_item->bobot_sds ? 1 - $next_item->bobot_sds : 0)];
                            $perhitungan_sum += $value * ($next_item->bobot_sds ?? 0);
                            $selain_perhitungan_sum[] = $value * ($next_item->bobot_sds ? 1 - $next_item->bobot_sds : 0);
                            $label_selain_perhitungan_sum[] = "M" . $label_ver + 2 . " = " . $value * ($next_item->bobot_sds ? 1 - $next_item->bobot_sds : 0);
                            if ($key != count($item) - 1) {
                                $label_perhitungan_sum .= $value * ($next_item->bobot_sds ?? 0) . " + ";
                            } else {
                                $label_perhitungan_sum .= $value * ($next_item->bobot_sds ?? 0) . " / 1 - 0 = " . $perhitungan_sum;
                            }
                            array_push($temp_keterangan_tabel, $label);
                        }
                    }
                    // $keterangan_ds[] = array_push($label_selain_perhitungan_sum, $label_perhitungan_sum);
                    $keterangan_tabel[] = $temp_keterangan_tabel;
                    $keterangan_ds[] = [array_merge([$label_perhitungan_sum], $label_selain_perhitungan_sum)];
                    $temp_nilai_ds[] = [array_merge([$perhitungan_sum], $selain_perhitungan_sum)];
                }
                $label_hr += 2;
                $label_ver += 2;
            }
        }

        //get last value of index DS
        $last_index_ds = count($temp_nilai_ds) - 1;
        $nilai_akhir_ds = max($temp_nilai_ds[$last_index_ds][0]);
        $persentase_nilai_akhir_ds = number_format($nilai_akhir_ds * 100, 0, '.', '');


        $diagnosa['input'] = $dataIdentiBobot;
        $diagnosa['identi'] = DB::table('m_identi')
            ->join('t_rule', 'm_identi.id', '=', 't_rule.m_identi_id')
            ->select('m_identi.id', 'm_identi.identi', 't_rule.bobot_alt', 't_rule.bobot_sds')
            ->whereIn('m_identi.id', $identi)
            ->where('t_rule.m_jenis_id', $m_jenis_id)
            ->get();
        $diagnosa['nama_jenis'] = DB::table('m_jenis')
            ->where('id', $m_jenis_id)
            ->first();

        $diagnosa['keterangan_perkalian_cf'] = $keterangan_perkalian_cf;
        $diagnosa['nilai_perkalian_cf'] = $hasil_cf;
        $diagnosa['keterangan_cf_combine'] = $keterangan_cf_combine;
        $diagnosa['nilai_cf_combine'] = $hasil_cf_combine;
        $diagnosa['hasil_cf'] = $nilai_akhir_cf;
        $diagnosa['persentase_hasil_cf'] = $persentase_nilai_akhir_cf . '%';

        // DS
        $diagnosa['keterangan_tabel'] = $keterangan_tabel;
        $diagnosa['keterangan_ds'] = $keterangan_ds;
        $diagnosa['nilai_ds'] = $temp_nilai_ds;
        $diagnosa['belief'] = $belief;
        $diagnosa['plausible'] = $plausible;
        $diagnosa['hasil_ds'] = $nilai_akhir_ds;
        $diagnosa['presentase_hasil_ds'] = $persentase_nilai_akhir_ds . '%';


        //insert data ke t_diagnosis
        $data_identi = json_encode($identi);
        try {
            $transaksiDiagnosis = new TransaksiDiagnosis();
            $transaksiDiagnosis->nama = auth()->user()->name;
            $transaksiDiagnosis->tgl_diagnosis = now();
            $transaksiDiagnosis->m_jenis_id = $m_jenis_id;
            $transaksiDiagnosis->data_identi = $data_identi;
            $transaksiDiagnosis->hasil_cf = $nilai_akhir_cf;
            $transaksiDiagnosis->hasil_ds = $nilai_akhir_ds;
            $transaksiDiagnosis->save();
        } catch (\Throwable $th) {
            //throw $th;
        }

        // store output
        session(['resultData' => $diagnosa]);
        return redirect()->route('diagnosis.output');
    }


    public function output()
    {
        $sessData = session('resultData');
        return view('diagnosis.output', compact('sessData'));
    }


    public function hasilDiagnosis()
    {
        $hasil_diagnosis = TransaksiDiagnosis::with('jenis')->get();
        return view('diagnosis.hasil', compact('hasil_diagnosis'));
    }
}
