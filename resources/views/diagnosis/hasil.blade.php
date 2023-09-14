@extends('master')

@section('home')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Diagnosis</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Diagnosis</h5>

                            <!-- Table with stripped rows -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Nilai CF</th>
                                        <th scope="col">Nilai DS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hasil_diagnosis as $diagnosis)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $diagnosis->nama }}</td>
                                            <td>{{ \Carbon\Carbon::parse($diagnosis->tgl_diagnosis)->locale('id')->isoFormat('LL') }}</td>
                                            <td>{{ $diagnosis->jenis->nama_jenis }}</td>
                                            <td>{{ number_format($diagnosis->hasil_cf * 100, 0, '.', '') }}</td>
                                            <td>{{ number_format($diagnosis->hasil_ds * 100, 0, '.', '') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
