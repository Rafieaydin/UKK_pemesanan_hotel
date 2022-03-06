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

    <style>
        .invalid-feedback{
            display: inline;
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{ asset('assets/images/bg-01.jpg') }}"
                        alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
                <div class="col-sm-6 text-black">



                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 mt-5 pt-xl-0 mt-xl-n5">

                        <form style="width: 40rem;" action="{{ route('auth.postregister') }}" method="POST">
                            @csrf
                            <h1 class="pt-5 mt-5" >Register</h1>
                            <p class="pb-3">Isi Form untuk mendaftar sebagai costumer</p>
                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            @endif
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form2Example18">Email address</label>
                                        <input type="email" id=""
                                            class="form-control form-control email @error('email') is-invalid @enderror"
                                            placeholder="Email" name="email" value="{{ old('email') }}"
                                            autocomplete="email" autofocus value="{{ old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form2Example28">username</label>
                                        <input type="username" id="username" name="username"
                                            class="form-control disabled form-control username  @error('username') is-invalid @enderror" value="{{ old('username') }}" readonly />
                                        @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form2Example18">Nama Tamu</label>
                                        <input type="text" id="form2Example18"
                                            class="form-control form-control @error('nama_tamu') is-invalid @enderror"
                                            placeholder="nama_tamu" name="nama_tamu" value="{{ old('nama_tamu') }}"
                                            autocomplete="nama_tamu" autofocus value="{{ old('nama_tamu') }}">
                                        @error('nama_tamu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form2Example18">No Hp</label>
                                        <input type="text" id="form2Example18"
                                            class="form-control form-control @error('no_hp') is-invalid @enderror"
                                            placeholder="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                                            autocomplete="no_hp" autofocus value="{{ old('no_hp') }}">
                                        @error('no_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form2Example18">Alamat</label>
                                        <textarea name="alamat" id="" cols="30" rows="2" class="form-control form-control @error('alamat') is-invalid @enderror">{{ old('no_hp') }}</textarea>
                                        @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form2Example28">Jenis Kelamin</label>
                                        <select  name="jk" id="" class="form-control form-control @error('jk') is-invalid @enderror">
                                            <option value="L" @if(old('jk')=="L") selected @endif>Laki-Laki</option>
                                            <option value="L" @if(old('jk')=="P") selected @endif>Perempuan</option>
                                        </select>
                                        @error('jk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form2Example28">Password</label>
                                        <input type="password" id="form2Example28" name="password"
                                            class="form-control form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" />
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="form2Example28">konfirmasi password</label>
                                        <input type="password" id="form2Example28" name="password_confirmation"
                                            class="form-control form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" />
                                        @error('password_confirmation ')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="pt-1 mb-4">
                                <button class="btn btn-info btn-lg btn-block" type="submit">Register</button>
                            </div>
                            <p class="small pb-lg-2"><a class="text-muted" href="#!">Lupa Password?</a></p>
                            <p>Have Account <a href="#!" class="link-info">Login Disini</a></p>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </section>


    <script src="{{ asset('assets/pakage/jquery/jquery-3.2.1.min.js') }}"></script>
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

    <script>
        $(document).ready(function(){
            $('.email').keyup(function name() {
                var email = $(this).val();
                var name   = email.substring(0, email.lastIndexOf("@"));
                $('.username').val(name);
            })
        });
    </script>
</body>

</html>
