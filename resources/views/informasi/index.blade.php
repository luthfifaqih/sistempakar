@extends('master')

@section('home')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Informasi Serangan Jaringan</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Informasi</h5>

                            <!-- Table with stripped rows -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Jenis</th>
                                        <th scope="col">Cara Penanganan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenis as $i => $jenis_s)
                                        <tr>
                                            <th scope="row">{{ $i + 1 }}</th>
                                            <td>{{ $jenis_s->nama_jenis }}</td>
                                            <td>{{ $jenis_s->penanganan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
