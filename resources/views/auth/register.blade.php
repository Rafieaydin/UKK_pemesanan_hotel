<!DOCTYPE html>
<html lang="en">

<head>
    <title>Aston | Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/icons/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/auth/style.css') }}">

    <style>
        .invalid-feedback{
            display: inline;
        }
    </style>
</head>

<body>

    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style='background-image: url("{{ asset('assets/images/bg-10.jpg') }}");'></div>
        <div class="contents order-2 order-md-1">

          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-7">
                <h3 style="color:#30336b">Register to <strong style="color:#130f40">ASTON</strong></h3>
                <p class="mb-4">The register form is only for costumer</p>
                <form action="{{ route('auth.postregister') }}" method="post">
                    @csrf
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    @endif
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group first">
                                <label for="username">Email</label>
                                <input type="text" class="form-control email @error('email') is-invalid @enderror"  name="email" placeholder="your-email@gmail.com" id="email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback" >
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group last mb-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control username  @error('username') is-invalid @enderror" readonly name="username" placeholder="Your username" id="username" value="{{ old('username') }}">
                                @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group first">
                                <label for="nama_tamu, ">Nama tamu</label>
                                <input type="text" class="form-control @error('nama_tamu') is-invalid @enderror" name="nama_tamu" placeholder="Nama tamu" id="nama_tamu" value="{{ old('nama_tamu') }}">
                                @error('nama_tamu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group last mb-3">
                                <label for="no_hp">Nomor HP</label>
                                <input type="number" class="form-control  @error('no_hp') is-invalid @enderror" name="no_hp" placeholder="Your Phone" id="no_hp" value="{{ old('no_hp') }}">
                                @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group first">
                                <label for="username">alamat</label>
                                <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="alamat" id="alamat">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group last mb-3">
                                <label for="jk">Jenis kelamin</label>
                                <select type="text" class="form-control  @error('jk') is-invalid @enderror" name="jk" placeholder="Your Jenis kelamin" id="jk">
                                    <option value="L" @if(old('jk')=='L') selected @endif>Laki-Laki</option>
                                    <option value="P" @if(old('jk')=='P') selected @endif>Perempuan</option>
                                </select>
                                @error('jk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group first">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" id="password" value="{{ old('password') }}">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group last mb-3">
                                <label for="password_confirmation">Konfirmasi password</label>
                                <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Your password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                        </div>
                    </div>



                  <div class="d-flex mb-3 align-items-center">
                    <label class="control control--checkbox mb-0" ><span class="caption">Remember me</span>
                      <input type="checkbox" checked="checked" name="remeberme"  />
                      <div class="control__indicator"  style="background-color: #30336b"></div>
                    </label>
                    <span class="ml-auto"><a href="{{ route('auth.forgot_password') }}" class="forgot-pass">Forgot Password</a></span>
                  </div>
                  <p class="mb-3">Have account? <a href="{{ route('auth.login') }}" class="forgot-pass">Login Now</a></p>
                  <input type="submit" value="Log In" class="btn btn-block btn-primary" style="background-color: #30336b">

                </form>
              </div>
            </div>
          </div>
        </div>


      </div>

    <script src="{{ asset('assets/pakage/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/pakage/animsition/js/animsition.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/auth/main.js') }}"></script>

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
