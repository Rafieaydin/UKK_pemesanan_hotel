<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V18</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/icons/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pakage/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pakage/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pakage/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pakage/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/pakage/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/auth/main.css') }}">
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{ asset('assets/images/bg-01.jpg') }}"
                        alt="Login image" class="w-100" style="object-fit: cover; object-position: left;">
                </div>
                <div class="col-sm-6 text-black">



                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form style="width: 23rem;" action="{{ route('auth.forgot_password') }}" method="POST">
                            @csrf
                            <h3 class="fw-normal " style="letter-spacing: 1px;">Reset Password</h3>
                            <p class="fw-normal pb-3">Masukan email untuk reset password</p>
                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            @endif
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example18">Email address</label>
                                <input type="email" id="form2Example18"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    placeholder="Email" name="email" value="{{ old('email') }}"
                                    autocomplete="email" autofocus value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="pt-1 mb-4">
                                <button class="btn btn-info btn-lg btn-block" type="submit">Submit</button>
                            </div>
                            {{-- <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p> --}}
                            <p>Sudah Punya akun? <a href="{{ route('auth.login') }}" class="link-info">Login Disni</a></p>
                            <p>Belum Punya Akun? <a href="{{ route('auth.register') }}" class="link-info">Register Disini</a></p>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </section>


    {{-- <script src="{{ asset('assets/pakage/jquery/jquery-3.2.1.min.jsq') }}"></script> --}}
    <script src="{{ asset('assets/pakage/animsition/js/animsition.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/pakage/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/pakage/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/pakage/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/pakage/countdowntime/countdowntime.js') }}"></script>

</body>

</html>
