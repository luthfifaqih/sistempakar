@extends('master')

@section('home')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Master Rule</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Rule</h5>

                            <div class="pull-left">
                                <a class="btn btn-success mb-3" href="{{ route('t_rule.create') }}"> Tambah +</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Jenis Serangan</th>
                                        <th scope="col">Identifikasi</th>
                                        <th scope="col">Bobot Alternatif</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rule as $rules)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $rules->nama_jenis }}</td>
                                            <td>{{ $rules->identi }}</td>
                                            <td>{{ $rules->bobot_alt }}</td>

                                            <td>
                                                <form action="{{ route('t_rule.delete', $rules->id) }}" method="POST">


                                                    <a class="btn btn-primary"
                                                        href="{{ route('t_rule.edit', $rules->id) }}">Edit</a>

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
    <!-- End #main -->
@endsection
