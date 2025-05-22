<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Hosting | Teamplate</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="{{ route('index') }}"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">                                                                                          
                                                <li><a href="{{ route('index') }}">Home</a></li>
                                                <li><a href="{{ route('catalogo') }}">Catálogo</a></li>
                                                <li><a href="{{ route('nosotros') }}">Nosotros</a></li>
                                                <li><a href="{{ route('dispositivos.index') }}">Mis Dispositivos</a></li>
                                                <!-- Button -->
                                                <li class="button-header margin-left "><a href="{{ route('perfil') }}" class="btn">Mi Perfil</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div> 
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
<!-- Slider Area Start-->
<div class="slider-area slider-bg ">
    <!-- Single Slider -->
    <div class="single-slider d-flex align-items-center slider-height3">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-12 ">
                    <div class="hero__caption hero__caption3 text-center">
                        <h1 data-animation="fadeInLeft" data-delay=".6s ">SOBRE NOSOTROS</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="about-us-page">
        <div class="container">
            <section>
                <h2>Quiénes Somos</h2>
                <p>Nosotros somos un equipo apasionado por la innovación tecnológica y el cuidado ambiental. A través del desarrollo de un prototipo basado en la tecnología IoT (Internet de las Cosas), buscamos simplificar y optimizar el cuidado de las plantas domésticas. Nuestro proyecto está diseñado para ayudar a los propietarios de plantas en el área metropolitana de Bucaramanga a monitorear y mejorar las condiciones de sus cultivos de manera personalizada, mejorando la calidad de vida de las plantas y de los usuarios. Con un enfoque en la sostenibilidad y el uso eficiente de los recursos, aspiramos a contribuir a un entorno más saludable y equilibrado en los hogares.</p>
                
            </section>

            <section class="team-section">
                <h2>Nuestro Equipo</h2>
                <p>Conoce a las personas creativas y talentosas detrás de nuestros proyectos:</p>

                <div class="team-grid">
                    <div class="team-member">
                        <img src="{{ asset('assets/img/fotos/anghel.png') }}" alt="Foto de Anghel" class="member-img">
                        <div class="member-info">
                            <h3 class="member-name">Anghel Andrés Gutierrez Gonzalez</h3>
                            <div class="member-role">Desarrollador</div>
                            <p class="member-bio">Especialista en tecnologías web modernas, Anghel es responsable de la arquitectura técnica y el desarrollo de nuestras soluciones. Su experiencia abarca desde frontend hasta backend.</p>
                            <div class="social-links">
                            <a href="mailto:agutierrez739@unab.edu.co">Correo Electrónico</a>
                            </div>
                        </div>
                    </div>

                    <div class="team-member">
                        <img src="{{ asset('assets/img/fotos/carlos.jpg') }}" alt="Foto de Carlos" class="member-img">
                        <div class="member-info">
                            <h3 class="member-name">Carlos Andrés Rueda Ortega</h3>
                            <div class="member-role">Desarrollador</div>
                            <p class="member-bio">Especialista en tecnologías web modernas, Carlos es responsable de la arquitectura técnica y el desarrollo de nuestras soluciones. Su experiencia abarca desde frontend hasta backend.</p>
                            <div class="social-links">
                            <a href="mailto:crueda578@unab.edu.co">Correo Electrónico</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="company-values">
                <h2>Nuestros Valores</h2>
                <p>Estos son los principios que guían nuestro trabajo y nuestra relación con los clientes:</p>

                <div class="values-grid">
                    <div class="value-item">
                        <div class="value-icon">✨</div>
                        <h3>Innovación</h3>
                        <p>Buscamos constantemente nuevas formas de resolver problemas y mejorar experiencias digitales.</p>
                    </div>

                    <div class="value-item">
                        <div class="value-icon">🤝</div>
                        <h3>Colaboración</h3>
                        <p>Trabajamos en estrecha colaboración con nuestros clientes, considerándolos parte integral del proceso creativo.</p>
                    </div>

                    <div class="value-item">
                        <div class="value-icon">⚡</div>
                        <h3>Excelencia</h3>
                        <p>Nos esforzamos por alcanzar los más altos estándares en cada aspecto de nuestro trabajo.</p>
                    </div>

                    <div class="value-item">
                        <div class="value-icon">🚀</div>
                        <h3>Resultados</h3>
                        <p>Nos enfocamos en crear soluciones que generen un impacto positivo y medible para nuestros clientes.</p>
                    </div>
                </div>
            </section>
        </div>
    </div>

</main>


    <footer>
    <div class="footer-wrappr " data-background="assets/img/gallery/footer-bg.png">
            <div class="footer-area footer-padding ">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <div class="footer-logo mb-25">
                                    <a href="{{ route('index') }}"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                </div>
                                <!-- imagen debajo del logo -->
                                <div class="footer-img">
                                    <img src="assets/img/footer/footer-img.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

      <!-- Scroll Up -->
      <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>

    <!-- Video bg -->
    <script src="./assets/js/jquery.vide.js"></script>

    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <!-- Progress -->
    <script src="./assets/js/jquery.barfiller.js"></script>
    
    <!-- counter , waypoint,Hover Direction -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
    
</body>
</html>