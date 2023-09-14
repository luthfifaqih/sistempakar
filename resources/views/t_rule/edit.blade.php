@extends('master')

@section('home')
    <div class="card">
        <div class="card-body">
            <main id="main" class="main">
                <h5 class="card-title">Form Edit Data Rule</h5>

                <div class="pull-left">
                    <a class="btn btn-success mb-3" href="{{ route('t_rule.index') }}"> Kembali</a>
                </div>
                <br>
                <!-- General Form Elements -->
                {{-- @if ($rule) --}}
                <form action="{{ url('t_rule', $rule->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jenis Serangan</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="nama_jenis" aria-label="Default select example">
                                <option value="">Pilih Jenis</option>
                                @foreach ($jenis as $j)
                                    <option value="{{ $j->id }}" {{ $j->id == $rule->m_jenis_id ? 'selected' : '' }}>
                                        {{ $j->nama_jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Indikasi Serangan :</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="identi" aria-label="Default select example">
                                <option value="">Pilih Indikasi</option>
                                @foreach ($identi as $d)
                                    <option value="{{ $d->id }}" @if ($rule->m_identi_id == $d->id) selected @endif>
                                        {{ $d->identi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <label>Bobot Dempster Shafer :</label>
                    <div class="col-sm-5">
                        <input type="text" name="bobot_sds" value="{{ $rule->bobot_sds }}" required>
                    </div>
                    <label>Bobot Certainty Factor :</label>
                    <div class="col-sm-5">
                        <input type="text" name="bobot_scf" value="{{ $rule->bobot_scf }}" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-xs-6 col-sm-6 col-md-4 text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->
                {{-- @endif --}}
            </main>
        </div>
    </div>
@endsection
