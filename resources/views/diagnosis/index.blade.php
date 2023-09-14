@extends('master')

@section('home')
    <div class="card">
        <div class="card-body">
            <main id="main" class="main">
                <h5 class="card-title">Menu Diagnosis</h5>


                <br>

                <!-- Diagnosis Form -->
                <form action="{{ url('prosesDiagnosis') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Pilih Diagnosis</legend>
                        @foreach ($diagnosa as $d)
                            <div class="col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="identi-{{ $d->id }}"
                                        name="identi[]" value="{{ $d->id }}">
                                    <label class="form-check-label" for="identi-{{ $d->id }}">
                                        {{ $d->identi }}
                                    </label>
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-select" name="bobot[]" aria-label="Default select example">
                                        <option value="" selected default hidden>Pilih Diagnosa</option>
                                        @foreach ($bobot as $b)
                                            <option value="{{ $b->nilai }}">{{ $b->keterangan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mb-3">
                        <div class="col-xs-6 col-sm-6 col-md-4 text-end">
                            <button type="submit" class="btn btn-primary">Diagnosis</button>
                        </div>
                    </div>
                </form><!-- End Diagnosis Form -->
            </main>
        </div>
    </div>
@endsection
