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
                        <h1 data-animation="fadeInLeft" data-delay=".6s ">MI PERFIL</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sección de Perfil -->
<div class="perfil-container">
    <h1>Información Personal</h1>
    
    <div class="perfil-info">
        <div class="perfil-data-row">
            <div class="perfil-label">Nombre:</div>
            <div class="perfil-value" id="user-name">{{ Auth::user()->name }}</div>
        </div>
        <div class="perfil-data-row">
            <div class="perfil-label">Correo electrónico:</div>
            <div class="perfil-value" id="user-email">{{ Auth::user()->email }}</div>
        </div>
    </div>

    <div class="perfil-buttons">
        <button id="edit-btn" class="perfil-boxed-btn">Modificar información</button>
        <button id="logout-btn" class="perfil-boxed-btn">Cerrar sesión</button>
    </div>

    <div class="perfil-edit-form" id="edit-form" style="display: none;">
        <h2>Editar información</h2>
        <form id="profile-form" action="{{ route('perfil.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="perfil-form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required>
            </div>
            <div class="perfil-form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>
            </div>
            
            <div class="perfil-form-group">
                <input type="checkbox" id="toggle-password"> Cambiar contraseña
            </div>
            
            <div class="perfil-form-group password-field" style="display: none;">
                <label for="password">Nueva contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Dejar en blanco si no desea cambiar">
            </div>
            <div class="perfil-form-group password-field" style="display: none;">
                <label for="password_confirmation">Confirmar contraseña:</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="perfil-buttons">
                <button type="submit" id="save-btn" class="perfil-boxed-btn">Guardar cambios</button>
                <button type="button" id="cancel-btn" class="perfil-btn-cancel">Cancelar</button>
            </div>
        </form>
    </div>

    <!-- Formulario de logout -->
    <form id="logout-form" action="{{ route('login') }}" method="GET" style="display: none;">
    </form>
</div>

<!-- Modal de error -->
<div id="error-modal" class="modal">
    <div class="modal-content">
        <span class="close-btn" id="close-modal">&times;</span>
        <div class="modal-icon">⚠️</div>
        <h3 class="modal-title">Error de validación</h3>
        <p class="modal-message">Las contraseñas no coinciden. Por favor, verifica e intenta nuevamente.</p>
        <button class="modal-button" id="ok-button">Entendido</button>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    let editBtn = document.getElementById("edit-btn");
    let editForm = document.getElementById("edit-form");
    let cancelBtn = document.getElementById("cancel-btn");
    let logoutBtn = document.getElementById("logout-btn");
    let passwordField = document.getElementById("password");
    let passwordConfirmField = document.getElementById("password_confirmation");
    let profileForm = document.getElementById("profile-form");
    let logoutForm = document.getElementById("logout-form");
    let passwordFields = document.querySelectorAll('.password-field');
    let togglePassword = document.getElementById("toggle-password");

    // Modal de error
    let errorModal = document.getElementById("error-modal");
    let closeModal = document.getElementById("close-modal");
    let okButton = document.getElementById("ok-button");
    let modalMessage = document.querySelector(".modal-message");

    passwordFields.forEach(field => field.style.display = "none");

    editBtn.addEventListener("click", function() {
        editForm.style.display = "block";
        editBtn.style.display = "none";
    });

    cancelBtn.addEventListener("click", function() {
        editForm.style.display = "none";
        editBtn.style.display = "block";
    });

    togglePassword.addEventListener("change", function() {
        if (this.checked) {
            passwordFields.forEach(field => field.style.display = "block");
        } else {
            passwordFields.forEach(field => field.style.display = "none");
            passwordField.value = "";
            passwordConfirmField.value = "";
        }
    });

    // Validación de contraseña al oprimir "Guardar cambios"
    const passwordRequirements = [
        { regex: /.{8,}/, message: "Debe tener al menos 8 caracteres." },
        { regex: /[A-Z]/, message: "Debe tener al menos una letra mayúscula." },
        { regex: /[a-z]/, message: "Debe tener al menos una letra minúscula." },
        { regex: /[0-9]/, message: "Debe tener al menos un número." },
        { regex: /[\W]/, message: "Debe tener al menos un carácter especial." }
    ];

    function validatePassword() {
        if (!togglePassword.checked) return true; // Si no está activada la opción de cambiar contraseña, no validar
        
        const password = passwordField.value;
        let errors = [];

        passwordRequirements.forEach(req => {
            if (!req.regex.test(password)) {
                errors.push(req.message);
            }
        });

        if (errors.length > 0) {
            modalMessage.innerHTML = errors.join("<br>");
            return false;
        }
        return true;
    }

    profileForm.addEventListener("submit", function(event) {
        // Si la opción de cambiar contraseña NO está activada, eliminar los campos antes de enviar
        if (!togglePassword.checked) {
            passwordField.removeAttribute("name");
            passwordConfirmField.removeAttribute("name");
        }

        let passwordsMatch = passwordField.value === passwordConfirmField.value;
        let isValid = validatePassword();
        
        if (togglePassword.checked && (!isValid || !passwordsMatch)) {
            event.preventDefault();
            modalMessage.innerHTML = !passwordsMatch ? "Las contraseñas no coinciden. Por favor, verifica e intenta nuevamente." : modalMessage.innerHTML;
            errorModal.classList.add("show");
        }
    });

    // Cerrar el modal cuando se presiona la "x"
    closeModal.addEventListener("click", function() {
        errorModal.classList.remove("show");
    });

    // Cerrar el modal con el botón "Entendido"
    if (okButton) {
        okButton.addEventListener("click", function() {
            errorModal.classList.remove("show");
        });
    }

    // Cerrar el modal si se hace clic fuera de él
    window.addEventListener("click", function(event) {
        if (event.target === errorModal) {
            errorModal.classList.remove("show");
        }
    });

    // Cerrar sesión al hacer clic en el botón
    logoutBtn.addEventListener("click", function() {
        logoutForm.submit();
    });
});


</script>



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