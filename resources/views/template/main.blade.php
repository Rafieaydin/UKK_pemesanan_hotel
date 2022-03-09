<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .image-nav {
            width: 100px;
        }

        .nav-item a:hover {
            color: #130f40 !important;
            border-bottom: 3px solid #30336b;
        }

        .label-input,
        .label-color,
        .nav-item a {
            font-weight: bold;
            color: #30336b !important;
        }

        .label-input {
            padding-bottom: 5px;
        }

        .form-control {
            border-width: 0 0 1px;
            outline: 0;
        }

        .form-control:focus {
            outline: none !important;
            box-shadow: none;
            color: #27272A;
            background-color: transparent;
        }

        /* input.form-control::-webkit-input-placeholder {
    transition: transform .3s ease-out;
    transform-origin: 0 0;
}

input.form-control:focus::-webkit-input-placeholder {
    transform: translateY(-11px) scale(0.8);
    transform-origin: 0 0;
} */
        .label-header {
            text-transform: uppercase;
            font-size: 30px;
        }

        .pesan-button,
        .login-bottom {
            padding: 5px 20px;
            background-color: #30336b;
        }

        .login-bottom:hover {
            background-color: #130f40 !important;
        }

        .nav-link {
            padding: 0px !important;
            margin-right: 50px;
        }

        .section-1 {
            /* background: linear-gradient(to right, #649173, #dbd5a4); */
            /* background-image: url('{{ asset('assets/images/bg-09.jpg')}}');
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover; */
            /* filter: grayscale(100%); */
            padding: 60px 0px;
            /* height: 1000vh; */
        }

        .form-input {
            /* height: 420px; */
            /* border: 2px solid black; */
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            border-radius: 10px;
            padding: 30px;
        }

        .judul-section {
            color: #30336b;
            font-size: 40px;
            font-weight: bold;
        }

        .swiper-button-prev::after,
        .swiper-button-next::after {
            font-size: 35px;
        }

        .swiper-slide {
            height: auto;
        }

        footer {
            background: #30336b;
        }

        .navbar-shadow {
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        }

    </style>
    <title>Hotel [name]</title>
</head>

<body>
    {{-- navbar --}}
    @include('template.userpartial.navbar')

    @yield('content')

    <!-- FOOTER -->
    @include('template.userpartial.footer')
    {{-- </div> --}}

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="{{ asset('template/assets/js/main.js') }}"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var swiper = new Swiper(".mySwiper ", {
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next ",
                prevEl: ".swiper-button-prev ",
            },
            pagination: {
                el: ".swiper-pagination ",
                clickable: true,
            },
            breakpoints: {
                400: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },
        });
        var swiper = new Swiper(".fasilitas", {
            pagination: {
                el: ".swiper-pagination",
                //   dynamicBullets: true,

            },
            autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                breakpoints: {
                400: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },
        });
        $(window).scroll(function () {
            if ($(window).scrollTop() > 10) {
                $('.navbar').addClass('navbar-shadow');
            } else {
                $('.navbar').removeClass('navbar-shadow');
            }
        });

    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
