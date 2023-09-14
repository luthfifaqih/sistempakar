@extends('master')

@section('home')
    <div class="card">
        <div class="card-body">
            <main id="main" class="main">
                <h5 class="card-title">Gejala</h5>
                <table class="nowrap table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gejala</th>
                            <th>Bobot Pakar</th>
                            <th>Bobot User</th>
                        </tr>
                    </thead>
                    <tbody @php
$no = 1; @endphp>
                        @foreach ($sessData['identi'] as $identi)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $identi->identi }}</td>
                                <td>{{ $identi->bobot_alt }}</td>
                                <td>{{ $sessData['input'][$identi->id] }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <hr>
                <h5>Hasil perhitungan dari kerusakan {{ $sessData['nama_jenis']->nama_jenis }} menggunakan <b>CF</b>
                    mempunyai nilai {{ $sessData['hasil_cf'] }} di presentase kan menjadi
                    {{ $sessData['persentase_hasil_cf'] }}</h5>
                <h5>Hasil perhitungan dari kerusakan {{ $sessData['nama_jenis']->nama_jenis }} menggunakan <b>Dempster
                        Shafer</b> mempunyai nilai {{ $sessData['hasil_ds'] }} di presentase kan menjadi
                    {{ $sessData['presentase_hasil_ds'] }}</h5>
                <hr>
                <h5>Penanganan yang dapat dilakukan : {{ $sessData['nama_jenis']->penanganan }}</h5>

                <hr>
                <button id="showPerhitunganButton" class="btn btn-primary">Tampilkan Perhitungan</button>
                {{-- show perhitungan --}}
                <div id="perhitunganSection">
                    {{-- show perhitungan CF --}}
                    <h5 class="card-title">Perhitungan CF</h5>
                    <p>1. Perkalian nilai bobot pakar dengan nilai bobot customer CF (H ; E) = CF [H] * CF [E]</p>
                    @foreach ($sessData['keterangan_perkalian_cf'] as $key => $row)
                        <p>CF[H,E]{{ $key + 1 }} = CF[H]{{ $key + 1 }} * CF[E]{{ $key + 1 }}</p>
                        <p> = {{ $row }} = {{ $sessData['nilai_perkalian_cf'][$key]['nilai'] }} </p>
                    @endforeach
                    <p>2. Menentukan CF Combine CFcombine = CF[H,E]1,2 = CF[H,E]1 + CF[H,E]2 * (1 – CF[H,E]1)</p>
                    @foreach ($sessData['keterangan_cf_combine'] as $key => $row)
                        <p> {{ $row }} = {{ $sessData['nilai_cf_combine'][$key] }}</p>
                    @endforeach

                    <hr>
                    {{-- show perhitungan Ds --}}
                    <h5 class="card-title">Perhitungan Dempster Shafer</h5>
                    <p>Menentukan nilai <b>Belief</b> dan <b>Plausibility</b></p>
                    @foreach ($sessData['identi'] as $key => $item)
                        <p>Identifikasi {{ $loop->iteration }} : </p>
                        <ul>
                            <li>Nilai Belief = {{ $sessData['belief'][$key] }}</li>
                            <li>Nilai Plausibility {ʘ} = 1 - Nilai Belief
                                <ul>
                                    <li>= (1 - {{ $sessData['belief'][$key] }})</li>
                                    <li>= {{ $sessData['plausible'][$key] }}</li>
                                </ul>
                            </li>
                        </ul>
                    @endforeach
                    <hr>
                    @foreach ($sessData['keterangan_tabel'] as $key => $tabel)
                        <table class="table table-sm">
                            @foreach ($tabel as $itemTabels)
                                <tr>
                                    @foreach ($itemTabels as $item)
                                        <td>{{ $item ?? '' }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                        <ul>
                            @foreach ($sessData['keterangan_ds'][$key] as $key => $items)
                                @foreach ($items as $item)
                                    <li>{{ $item ?? '' }}</li>
                                @endforeach
                            @endforeach
                        </ul>
                        <hr>
                    @endforeach

                </div>
            </main>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const perhitunganSection = document.getElementById('perhitunganSection');


            perhitunganSection.style.display = 'none';


            document.getElementById('showPerhitunganButton').addEventListener('click', function() {

                perhitunganSection.style.display = 'block';
            });
        });
    </script>
@endsection
