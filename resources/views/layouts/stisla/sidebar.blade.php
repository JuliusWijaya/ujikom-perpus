<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard">SIPER</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard">SP</a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if (Auth::user()->hak_akses != 'anggota')
                {{-- <li class="menu-header">MASTER DATA</li> --}}
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-columns"></i>
                        <span>Master Data</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('users*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('users.index') }}">
                                Pengguna
                            </a>
                        </li>
                        <li class="{{ Request::is('anggotas*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('anggotas.index') }}">Anggota</a>
                        </li>
                        <li class="{{ Request::is('koleksis*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('koleksis.index') }}">Koleksi</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fas fa-th"></i>
                        <span>Laporan</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('laporans.index') }}">Peminjaman</a></li>
                    </ul>
                </li>
            @else
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fa fa-book-reader"></i>
                        <span>Transaksi</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('pinjams.index') }}">Peminjaman</a></li>
                        <li><a class="nav-link" href="{{ route('kembalis.index') }}">Pengembalian</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </aside>
</div>
