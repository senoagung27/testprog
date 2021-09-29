<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/e-peminjamans" class="brand-link">
        <span class="brand-text font-weight-light ml-4">UJIAN</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    Hallo
                    <p>
                        &nbsp; {{ Auth::user()->name }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>{{ __('Logout') }}</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            <hr style="width:100%;text-align:left;margin-left:0;border-width: 2px;  border-top: 1px solid gray;">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item has-treeview">
                        <a href="/e-peminjamans" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    {{-- <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-hdd"></i>
                            <p>
                                Transaksi
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/e-peminjamans/TransaksiBaru" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Peminjaman Baru</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/e-peminjamans/Pengembalian" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Transaksi Pengembalian</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview"> --}}
                    {{-- <a href="#" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                Laporan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/e-peminjamans/Laporan" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inventory Berkas</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="/e-peminjamans/Laporan/DataTransaksi" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Data Transaksi
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-hdd"></i>
                            <p>
                                Master Data
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/MataPelajaran" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mata Pelajaran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/Siswa" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Siswa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/e-peminjamans/Petugas" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Peserta</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/e-peminjamans/Petugas" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ujian</p>
                                </a>
                            </li>


                        </ul>
                    </li>
                </ul>
            </nav>
    </div>
</aside>
