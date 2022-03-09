<nav class="navbar navbar-expand-lg sticky-top navbar-light  " style="background-color: white;">
    <div class="container-fluid pt-3 pb-3">
        {{-- <a class="navbar-brand ms-5 ps-5" href="#">Logo here</a> --}}
        <img class="image-nav navbar-brand ms-5" src="{{asset('assets/images/logo-.png')}}">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-2 mb-lg-0 ms-auto" style="margin-right: 150px">
                <li class="nav-item ">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " aria-current="page" href="#kamar">Kamar</a>
                </li>
                <li class="nav-item me-5 ">
                    <a class="nav-link " aria-current="page" href="#fasilitas">Fasilitas</a>
                </li>

            </ul>
            <a href="/login" class="btn btn-primary login-bottom" style="margin-right: 100px">Login now</a>
        </div>
    </div>
</nav>
