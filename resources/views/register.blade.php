<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> App landing</title>
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
    <!-- Preloader Start-->


<!-- Register -->

<main class="login-body" data-vide-bg="assets/img/login-bg.mp4">
    <!-- Login Admin -->
    <form class="form-default" action="{{ route('register') }}" method="POST">
    @csrf
    <div class="login-form">
        <div class="logo-login">
            <a href="{{ route('index') }}"><img src="assets/img/logo/loder.png" alt=""></a>
        </div>
        <h2>Registro</h2>

        <div class="form-input">
            <label for="name">Nombre Completo</label>
            <input type="text" name="name" placeholder="Nombre Completo" required>
        </div>
        <div class="form-input">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" placeholder="Correo Electrónico" required>
        </div>
        <div class="form-input">
            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Contraseña" required>
        </div>
        <div class="form-input">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>
        </div>
        <div class="form-input pt-30">
            <input type="submit" name="submit" value="Registrarse">
        </div>
        <a href="{{ route('login') }}" class="registration">Iniciar Sesión</a>
    </div>
</form>

    <!-- /end login form -->
</main>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let passwordField = document.querySelector('input[name="password"]');
    let passwordConfirmField = document.querySelector('input[name="password_confirmation"]');
    let registerForm = document.querySelector('.form-default');
    
    // Modal de error
    let errorModal = document.createElement("div");
    errorModal.innerHTML = `
        <div id="error-modal" class="modal">
            <div class="modal-content">
                <span class="close-btn" id="close-modal">&times;</span>
                <div class="modal-icon">⚠️</div>
                <h3 class="modal-title">Error de validación</h3>
                <p class="modal-message" id="error-message"></p>
                <button class="modal-button" id="ok-button">Entendido</button>
            </div>
        </div>`;
    document.body.appendChild(errorModal);

    let modal = document.getElementById("error-modal");
    let closeModal = document.getElementById("close-modal");
    let okButton = document.getElementById("ok-button");
    let errorMessage = document.getElementById("error-message");

    function showModal(message) {
        errorMessage.innerText = message;
        modal.classList.add("show");
    }

    function closeModalHandler() {
        modal.classList.remove("show");
    }

    closeModal.addEventListener("click", closeModalHandler);
    okButton.addEventListener("click", closeModalHandler);
    window.addEventListener("click", function (event) {
        if (event.target === modal) closeModalHandler();
    });

    registerForm.addEventListener("submit", function (event) {
        let password = passwordField.value;
        let confirmPassword = passwordConfirmField.value;

        // Validaciones de la contraseña
        let regexUpperCase = /[A-Z]/;
        let regexLowerCase = /[a-z]/;
        let regexNumber = /[0-9]/;
        let regexSpecialChar = /[\W]/;

        if (
            password.length < 8 ||
            !regexUpperCase.test(password) ||
            !regexLowerCase.test(password) ||
            !regexNumber.test(password) ||
            !regexSpecialChar.test(password)
        ) {
            event.preventDefault();
            showModal("La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.");
            return;
        }

        if (password !== confirmPassword) {
            event.preventDefault();
            showModal("Las contraseñas no coinciden.");
            return;
        }
    });
});
</script>



    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Video bg -->
    <script src="./assets/js/jquery.vide.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
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