<div class="main-sidebar position-fixed">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{'/'}}" style="color:#6777ef;">ASTON<a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a style="color:#6777ef;" href="{{'/'}}">DP</a>
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
            <li class="menu-header">Fasilitas</li>
            <li class="@if (Request::is('admin/fasilitas_hotel','admin/fasilitas_hotel/*')) active @endif">
                <a href="{{ route('admin.fasilitas_hotel.index') }}" class="nav-link">
                    <i class="fas fa-hotel"></i>
                    <span>Fasilitas Hotel</span></a>
                </a>
            </li>
            <li class="@if (Request::is('admin/fasilitas_kamar','admin/fasilitas_kamar/*')) active @endif">
                <a href="{{ route('admin.fasilitas_kamar.index') }}" class="nav-link">
                    <i class="fas fa-hotel"></i>
                    <span>Fasilitas Kamar</span></a>
                </a>
            </li>
            <li class="menu-header">Kamar</li>
            <li class="@if (Request::is('admin/tipe_kamar','admin/tipe_kamar/*')) active @endif">
                <a href="{{ route('admin.tipe_kamar.index') }}" class="nav-link">
                    <i class="fas fas fa-bed"></i>
                    <span>Tipe Kamar</span></a>
                </a>
            </li>
            <li class="@if (Request::is('admin/kamar','admin/kamar/*')) active @endif">
                <a href="{{ route('admin.kamar.index') }}" class="nav-link">
                    <i class="fas fa-bed"></i>
                    <span>Kamar</span></a>
                </a>
            </li>
        @endif
        @if (Auth::guard('resepsionis')->check())
        <ul class="sidebar-menu">
            {{-- <li class="menu-header">DASHBOARD</li>
            <li class="@if (Request::is('resepsionis/dashboard')) active @endif">
                <a href="{{ route('resepsionis.dashboard') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </a>
            </li> --}}
            <li class="menu-header">MASTER</li>
            <li class="@if (Request::is('resepsionis/resevarsi','resepsionis/resevarsi/*')) active @endif">
                <a href="{{ route('resepsionis.resevarsi.index') }}" class="nav-link">
                    <i class="fas fa-hotel"></i>
                    <span>Resevarsi Hotel</span></a>
                </a>
            </li>
        @endif

    </aside>

</div>
