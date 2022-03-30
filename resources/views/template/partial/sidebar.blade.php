<div class="main-sidebar ">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ '/' }}" style="color:#30336b;">ASTON<a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a style="color:#6777ef;" href="{{ '/' }}">DP</a>
        </div>
        @if (Auth::guard('admin')->check())
            <ul class="sidebar-menu">
                <li class="menu-header">DASHBOARD</li>
                <li class="@if (Request::is('admin/dashboard')) active @endif">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                    </a>
                </li>
                <li class="menu-header">MASTER</li>
                <li class="@if (Request::is('admin/user', 'admin/user/*')) active @endif">
                    <a href="{{ route('admin.user.index') }}" class="nav-link">
                        <i class="fas fa-user"></i>
                        <span>Admin</span></a>
                    </a>
                </li>
                <li class="@if (Request::is('admin/resepsionis', 'admin/resepsionis/*')) active @endif">
                    <a href="{{ route('admin.resepsionis.index') }}" class="nav-link">
                        <i class="fas fa-user"></i>
                        <span>Resepsionis</span></a>
                    </a>
                </li>
                <li class="@if (Request::is('admin/tamu', 'admin/tamu/*')) active @endif">
                    <a href="{{ route('admin.tamu.index') }}" class="nav-link">
                        <i class="fas fa-user"></i>
                        <span>Tamu</span></a>
                    </a>
                </li>
                <li class="menu-header">Hotel</li>
                <li class="@if (Request::is('admin/fasilitas_hotel', 'admin/fasilitas_hotel/*')) active @endif">
                    <a href="{{ route('admin.fasilitas_hotel.index') }}" class="nav-link">
                        <i class="fas fa-hotel"></i>
                        <span>Fasilitas Hotel</span></a>
                    </a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a href="#"
                        class=""
                        data-toggle="dropdown"><i class="fas fa-bed"></i>
                        <span>Kamar</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="">Tipe Kamar</a></li>
                        <li><a class="nav-link" href="">Data Kamar</a></li>
                        <li><a class="nav-link" href="">Kamar</a></li>
                    </ul>
                </li> -->
                <li class="dropdown @if (Request::is('admin/tipe_kamar', 'admin/tipe_kamar/*', 'admin/kamar', 'admin/kamar/*','admin/fasilitas_kamar', 'admin/fasilitas_kamar/*')) active @endif">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                            class="fas fas fa-bed"></i><span>Kamar</span></a>
                    <ul class="dropdown-menu">
                        <li class="@if (Request::is('admin/fasilitas_kamar', 'admin/fasilitas_kamar/*')) active @endif"><a class="nav-link "
                            href="{{ route('admin.fasilitas_kamar.index') }}">Fasilitas kamar</a></li>
                        <li class="@if (Request::is('admin/tipe_kamar', 'admin/tipe_kamar/*')) active @endif"><a class="nav-link"
                            href="{{ route('admin.tipe_kamar.index') }}">Tipe Kamar</a></li>

                            <li class="@if (Request::is('admin/kamar', 'admin/kamar/*')) active @endif"><a class="nav-link"
                                href="{{ route('admin.kamar.index') }}">Data Kamar</a></li>
                    </ul>
                  </li>
                    <li class="dropdown @if (Request::is('admin/reservasi', 'admin/reservasi/*', 'admin/reservasilog', 'admin/reservasilog/*')) active @endif">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                            class="fas fas fa-bed"></i><span>Reservasi</span></a>
                    <ul class="dropdown-menu">
                        <li class="@if (Request::is('admin/reservasi', 'admin/reservasi/*')) active @endif"><a class="nav-link"
                            href="{{ route('admin.reservasi.index') }}">Reservasi Kamar</a></li>
                    <li class="@if (Request::is('admin/reservasilog', 'admin/reservasilog/*')) active @endif"><a class="nav-link"
                            href="{{ route('admin.reservasilog.index') }}">Log Reservasi</a></li>
                    </ul>
                  </li>
        @endif
        @if (Auth::guard('resepsionis')->check())
            <ul class="sidebar-menu">
                <li class="menu-header">DASHBOARD</li>
                <li class="@if (Request::is('resepsionis/dashboard')) active @endif">
                    <a href="{{ route('resepsionis.dashboard') }}" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                    </a>
                </li>
                <li class="menu-header">Hotel</li>
                <li class="dropdown @if (Request::is('resepsionis/reservasi', 'resepsionis/reservasi/*','resepsionis/reservasilog', 'resepsionis/reservasilog/*')) active @endif">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                            class="fas fas fa-bed"></i><span>Reservasi</span></a>
                    <ul class="dropdown-menu">
                        <li class="@if (Request::is('resepsionis/reservasi', 'resepsionis/reservasi/*')) active @endif"><a class="nav-link"
                            href="{{ route('resepsionis.reservasi.index') }}">Reservasi Kamar</a></li>

                    </li>
        @endif

    </aside>

</div>
