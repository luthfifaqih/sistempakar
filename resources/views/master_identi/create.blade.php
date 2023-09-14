@extends('master')

@section('home')
    <div class="card">
        <div class="card-body">
            <main id="main" class="main">
                <h5 class="card-title">Form Tambah Data Indikasi Serangan Jaringan</h5>

                <div class="pull-left">
                    <a class="btn btn-success mb-3" href="{{ route('master_identi.index') }}"> Kembali</a>
                </div>
                <br>
                <!-- General Form Elements -->
                <form action="{{ url('master_identi') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Kode Indikasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kd_identi">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Indikasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="identi">
                        </div>
                    </div>

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
