@extends('master')

@section('home')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Master Indikasi Serangan Jaringan</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Indikasi Serangan Jaringan</h5>

                            <div class="pull-left">
                                <a class="btn btn-success mb-3" href="{{ route('master_identi.create') }}"> Tambah +</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode Indikasi</th>
                                        <th scope="col">Indikasi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($identi as $i => $a)
                                        <tr>
                                            <th scope="row">{{ $i + 1 }}</th>
                                            <td>{{ $a->kd_identi }}</td>
                                            <td>{{ $a->identi }}</td>
                                            <td>
                                                <form action="{{ route('master_identi.delete', $a->id) }}" method="POST">


                                                    <a class="btn btn-primary"
                                                        href="{{ route('master_identi.edit', $a->id) }}">Edit</a>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </td>
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
