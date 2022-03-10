<!DOCTYPE html>
<html lang="en">

<head>
    <title>Aston | Forgot Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/icons/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/auth/style.css') }}">
</head>

<body>
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style='background-image: url("{{ asset('assets/images/bg-10.jpg') }}");'>
        </div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3 style="color:#30336b"><strong style="color:#130f40">Reset Password </strong></h3>
                        <p class="mb-4">The reset password form is only for admin, recepsionis & costumer</p>
                        <form action="{{ route('auth.forgot_password') }}" method="post">
                            @csrf
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
                            <div class="form-group first">
                                <label for="username">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" placeholder="your-email@gmail.com" id="email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <p class="mb-3">Have account? <a href="{{ route('auth.register') }}"
                                    class="forgot-pass">Login Now</a></p>
                            <p class="mb-3">Dont have account? <a href="{{ route('auth.register') }}"
                                    class="forgot-pass">Register Now</a></p>

                            <input type="submit" value="Log In" class="btn btn-block btn-primary"
                                style="background-color: #30336b">

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>


    {{-- <script src="{{ asset('assets/pakage/jquery/jquery-3.2.1.min.jsq') }}"></script> --}}
    <script src="{{ asset('assets/pakage/animsition/js/animsition.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/auth/main.js') }}"></script>
</body>

</html>
