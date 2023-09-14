@extends('master')

@section('home')
    <div class="card">
        <div class="card-body">
            <main id="main" class="main">
                <h5 class="card-title">Form Tambah Data Rule</h5>

                <div class="pull-left">
                    <a class="btn btn-success mb-3" href="{{ route('t_rule.index') }}"> Kembali</a>
                </div>
                <br>
                <!-- General Form Elements -->
                <form action="{{ url('t_rule') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jenis Serangan</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="nama_jenis" aria-label="Default select example">
                                <option value="" selected>Pilih Jenis</option>
                                @foreach ($jenis as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Indikasi Serangan</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="identi" aria-label="Default select example">
                                <option value="" selected>Pilih Indikasi</option>
                                @foreach ($identi as $j)
                                    <option value="{{ $j->id }}">{{ $j->identi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Bobot Dempster Shafer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="bobot_sds" placeholder="0.1 - 0.9">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Bobot Certainty Factor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="bobot_scf" placeholder="0.1 - 0.9">
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
