<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                {{-- <img alt="image" src="{{ asset('images/tb.png') }}" class="rounded-circle mr-1"> --}}
                <div class="d-sm-none d-lg-inline-block">
                    {{ Auth::user()->username }}
                </div>

            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title " id="waktu_log">Logged in 5 min ago</div>
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" id="logout" class=" logout dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt pt-2"></i> logout
                    </button>
                </form>

            </div>
        </li>
    </ul>
</nav>

