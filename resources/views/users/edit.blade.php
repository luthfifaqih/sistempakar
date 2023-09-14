@extends('master')

@section('home')
    <div class="card">
        <div class="card-body">
            <main id="main" class="main">
                <h5 class="card-title">Form Edit User</h5>

                <div class="pull-left">
                    <a class="btn btn-success mb-3" href="{{ route('users.index') }}"> Kembali</a>
                </div>
                <br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        Anda salah meng-input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- General Form Elements -->
                <form action="{{ url('users', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" value="{{ $user->password }}">
                        </div>
                    </div> --}}

                    <div class="row mb-3">
                        <div class="col-xs-6 col-sm-6 col-md-4 text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->
            </main>
        </div>
    </div>
@endsection
