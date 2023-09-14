@extends('master')

@section('home')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Master Jenis Serangan Jaringan</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Jenis Serangan Jaringan</h5>

                            @if (in_array(Auth::user()->role, ['admin', 'pakar']))
                                <div class="pull-left">
                                    <a class="btn btn-success mb-3" href="{{ route('master_jenis.create') }}"> Tambah +</a>
                                </div>
                            @endif

                            <!-- Table with stripped rows -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode Jenis</th>
                                        <th scope="col">Jenis Serangan Jaringan</th>
                                        <th scope="col">Penanganan</th>
                                        @if (in_array(Auth::user()->role, ['admin', 'pakar']))
                                        <th scope="col">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenis as $i => $jenis_s)
                                        <tr>
                                            <th scope="row">{{ $i + 1 }}</th>
                                            <td>{{ $jenis_s->kd_jenis }}</td>
                                            <td>{{ $jenis_s->nama_jenis }}</td>
                                            <td>{{ $jenis_s->penanganan }}</td>
                                            @if (in_array(Auth::user()->role, ['admin', 'pakar']))
                                            <td>
                                                <form action="{{ route('master_jenis.delete', $jenis_s->id) }}"
                                                    method="POST">


                                                    <a class="btn btn-primary"
                                                        href="{{ route('master_jenis.edit', $jenis_s->id) }}">Edit</a>


                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                            @endif
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
