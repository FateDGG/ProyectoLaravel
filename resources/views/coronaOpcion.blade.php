<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Detalles de {{ $dispositivo->nombre_planta }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/progressbar_barfiller.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    </head>

<body>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('assets/img/logo/loder.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-bottom header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="{{ route('index') }}"><img src="{{ asset('assets/img/logo/logo.png') }}"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="{{ route('index') }}">Home</a></li>
                                                <li><a href="{{ route('catalogo') }}">Catálogo</a></li>
                                                <li><a href="{{ route('nosotros') }}">Nosotros</a></li>
                                                <li><a href="{{ route('dispositivos.index') }}">Mis Dispositivos</a>
                                                </li>
                                                <li class="button-header margin-left "><a href="{{ route('perfil') }}"
                                                        class="btn">Mi Perfil</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="slider-area slider-bg ">
            <div class="single-slider d-flex align-items-center slider-height3">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-8 col-lg-9 col-md-12 ">
                            <div class="hero__caption hero__caption3 text-center">
                                <h1 data-animation="fadeInLeft" data-delay=".6s " id="nombrePlantaTitulo">
                                    {{ $dispositivo->nombre_planta }}
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="plantas-container">
            <div class="plantas-plant-header">
                <img src="{{ asset('assets/img/flores/corona.jpg') }}" alt="{{ $dispositivo->nombre_planta }}"
                    class="plantas-plant-image">
                <div class="plantas-plant-title">
                    <h1 id="nombrePlantaDetalle">{{ $dispositivo->nombre_planta }}</h1>
                    <p class="plantas-scientific-name">ID: {{ $dispositivo->id_dispositivo }}</p>
                    <p id="tipoPlantaDetalle">
                        Tipo de Planta: Corona de Cristo
                    </p>
                </div>
            </div>
            <div class="grafica-con-explicacion">
                <iframe src="http://172.191.63.99:3000/d-solo/bekhr65jgftogf/visualizacion?orgId=1&var-dispositivo={{ $dispositivo->id_dispositivo }}&timezone=browser&refresh=5s&theme=light&panelId=3&__feature.dashboardSceneSolo" width="550" height="300" frameborder="0"></iframe>
                <div id="ph-explicacion"></div>
            </div>

            <div class="grafica-con-explicacion">
                <iframe src="http://172.191.63.99:3000/d-solo/bekhr65jgftogf/visualizacion?orgId=1&var-dispositivo={{ $dispositivo->id_dispositivo }}&timezone=browser&refresh=5s&theme=light&panelId=1&__feature.dashboardSceneSolo" width="550" height="300" frameborder="0"></iframe>
                <div id="humedad-explicacion"></div>
            </div>

            <div class="grafica-con-explicacion">
                <iframe src="http://172.191.63.99:3000/d-solo/bekhr65jgftogf/visualizacion?orgId=1&var-dispositivo={{ $dispositivo->id_dispositivo }}&timezone=browser&refresh=5s&theme=light&panelId=4&__feature.dashboardSceneSolo" width="550" height="300" frameborder="0"></iframe>
                <div id="temperatura-explicacion"></div>
            </div>

            <div class="grafica-con-explicacion">
                <iframe src="http://172.191.63.99:3000/d-solo/bekhr65jgftogf/visualizacion?orgId=1&var-dispositivo={{ $dispositivo->id_dispositivo }}&timezone=browser&refresh=5s&theme=light&panelId=2&__feature.dashboardSceneSolo" width="550" height="300" frameborder="0"></iframe>
                <div id="luminosidad-explicacion"></div>
            </div>
            <button class="boxed-btn mb-3" onclick="location.href='{{ route('dispositivos.index') }}'">Regresar</button>
        </div>
    </main>
    <footer>
        <div class="footer-wrappr " data-background="{{ asset('assets/img/gallery/footer-bg.png') }}">
            <div class="footer-area footer-padding ">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-logo mb-25">
                                    <a href="{{ route('index') }}"><img
                                            src="{{ asset('assets/img/logo/logo2_footer.png') }}" alt=""></a>
                                </div>
                                <div class="footer-img">
                                    <img src="{{ asset('assets/img/footer/footer-img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>

    <script src="{{ asset('assets/js/gijgo.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.vide.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.barfiller.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/hover-direction-snake.min.js') }}"></script>

    <script src="{{ asset('assets/js/contact.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        window.dispositivoId = "{{ $dispositivo->id }}";
        window.nombrePlanta = "{{ strtolower($dispositivo->nombre_planta) }}";
    </script>
    <script src="{{ asset('assets/js/monitoreo.js') }}"></script>
</body>

</html>
