<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @if (in_array(Auth::user()->role, ['admin', 'pakar']))
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('home') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
        @endif
        @if (Auth::user()->role == 'pakar')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-folder2-open"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('master_jenis.index') }}">
                            <i class="bi bi-circle-fill"></i><span>Jenis Serangan Jaringan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('master_identi.index') }}">
                            <i class="bi bi-circle-fill"></i><span>Indikasi Serangan Jaringan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('t_rule.index') }}">
                    <i class="bi bi-diagram-2"></i>
                    <span>Rule</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('diagnosis.hasil') }}">
                    <i class="bi bi-journal-bookmark"></i>
                    <span>Laporan Diagnosis</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('konsultasi') }}">
                    <i class="bi bi-grid"></i>
                    <span>Data Konsultasi</span>
                </a>
            </li> --}}
        @endif

        @if (Auth::user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('users') }}">
                    <i class="bi bi-person"></i>
                    <span>Data User</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == 'guest')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('diagnosis.index') }}">
                    <i class="bi bi-search"></i>
                    <span>Diagnosis</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('informasi.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Informasi Jenis Serangan</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('konsultasi') }}">
                    <i class="bi bi-grid"></i>
                    <span>Konsultasi</span>
                </a>
            </li> --}}
        @endif

    </ul>

</aside><!-- End Sidebar-->
