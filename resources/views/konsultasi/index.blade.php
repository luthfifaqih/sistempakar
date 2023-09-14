@extends('master')

@section('home')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Konsultasi</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Konsultasi</h5>
                            @if (auth()->user()->role == 'guest')
                                <div class="pull-left">
                                    <a class="btn btn-success mb-3" href="{{ route('konsultasi.create') }}"> Tambah +</a>
                                </div>
                            @endif

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Pertanyaan</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($konsultasi as $konsul)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $konsul->pertanyaan }}</td>
                                            <td>{{ $konsul->user->name }}</td>
                                            <td>
                                                <a class="btn btn-warning"
                                                    href="{{ route('konsultasi.detail', $konsul->id_konsultasi) }}">Lihat</a>
                                                <form class="d-inline"
                                                    action="{{ route('konsultasi.delete', $konsul->id_konsultasi) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </td>
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
