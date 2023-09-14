<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register - Aplikasi Sistem Pakar</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('backend/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ url('backend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ url('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ url('backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('backend/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <span class="d-none d-lg-block">Register Akun</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Buat Akun</h5>
                                        <p class="text-center small">Masukan data personal untuk membuat akun</p>
                                    </div>
                                    @if (session('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif


                                    <form action="{{ route('actionregister') }}" class="row g-3 needs-validation"
                                        novalidate method="POST">
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Masukan Email" required>
                                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Nama</label>
                                            <div class="input-group has-validation">
                                                {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Masukan Nama" required>
                                                <div class="invalid-feedback">Please choose a nama.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Masukan Password" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="col-12">
                                                <label for="yourRole" class="form-label">Role</label>
                                                <input type="text" name="role" class="form-control" required
                                                    value="guest" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Sudah mempunyai akun? <a
                                                    href="{{ url('login') }}">Log in</a>
                                            </p>
                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->
    <script>
        // Cek apakah terdapat parameter 'emailExists' pada URL query string
        const urlParams = new URLSearchParams(window.location.search);
        const emailExists = urlParams.get('emailExists');

        // Periksa jika emailExists bernilai 'true' dan tampilkan SweetAlert
        if (emailExists === 'true') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Email sudah digunakan, silakan gunakan email lain.',
            });
        }
    </script>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->

    <script src="{{ url('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ url('backend/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('backend/assets/js/main.js') }}"></script>

</body>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
