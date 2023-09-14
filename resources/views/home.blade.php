@extends('master')

@section('home')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        <!-- total jenis -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card border-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Total Jenis</div>
                                <div class="card-body text-primary">
                                    <h5 class="card-title">{{ $total_jenis }}</h5>
                                </div>
                            </div>
                        </div>

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card border-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Total Indikasi</div>
                                <div class="card-body text-primary">
                                    <h5 class="card-title">{{ $total_identi }}</h5>
                                </div>
                            </div>
                        </div><!-- End Revenue Card -->
                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>

    </main><!-- End #main -->
@endsection
