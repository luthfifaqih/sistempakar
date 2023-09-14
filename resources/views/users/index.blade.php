@extends('master')

@section('home')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data User</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar User</h5>

                            <div class="pull-left">
                                <a class="btn btn-success mb-3" href="{{ route('users.create') }}"> Tambah +</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $users)
                                        <tr>
                                            <th scope="row">{{ ++$i }}</th>
                                            <td>{{ $users->name }}</td>
                                            <td>{{ $users->email }}</td>
                                            <td>{{ $users->role }}</td>
                                            <td>
                                                <form action="{{ route('users.destroy', $users->id) }}" method="POST">


                                                    <a class="btn btn-primary"
                                                        href="{{ route('users.edit', $users->id) }}">Edit</a>

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
