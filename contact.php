<?php

if(!empty($_POST)) {
    $visitor_name = "";
    $visitor_email = "";
    $email_title = "";
    $departamento = "";
    $visitor_message = "";
     
    if(isset($_POST['visitor_name'])) {
      $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['departamento'])) {
        $departamento = filter_var($_POST['departamento'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
    }
     
    if($departamento == "sales") {
        $recipient = "martincaparross@gmail.com";
    }
    else if($departamento == "RRHH") {
        $recipient = "losadaagostina@gmail.com";
    }
    else if($departamento == "customer_services") {
        $recipient = "losadaagostina@gmail.com";
    }
    else {
        $recipient = "losadaagostina@gmail.com";
    }
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
     
    mail($recipient, $email_title, $visitor_message, $headers);
    echo `
    
    <body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="p-2 container-fluid bg-dark p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center text-white me-4">
                    <small class="fa fa-map-marker-alt me-2" ></small>
                    <small>Rawson 5255, Mar del Plata, CP B7604BBE</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center text-white me-4">
                    <small class="fa fa-phone-alt me-2"></small>
                    <small>Teléfono: +54 (0223) 472-3263</small>
                </div>
                <!-- <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <a class="btn btn-square btn-dark rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-dark rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-dark rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-square btn-dark rounded-0" href=""><i class="fab fa-instagram"></i></a>
                </div>  -->
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
            <img src="images/logo.png" class="img-fluid" alt="logo-viomar">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link active">Inicio</a>
                <a href="about.html" class="nav-item nav-link">Productos</a>
                <a href="service.html" class="nav-item nav-link">La Empresa</a>
                <a href="project.html" class="nav-item nav-link">Calidad</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="feature.html" class="dropdown-item">Feature</a>
                        <a href="quote.html" class="dropdown-item">Free Quote</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contacto</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Contacto</h1>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0" style="margin: 6rem 0;">
        <div class="container contact px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <h6 class="txt-primary">Contáctenos</h6>
                        <h1 class="mb-4">Siéntase libre de comunicarse con nosotros</h1>
                        <p class="mb-4">Para cotizacion</p>
                        <form id="contact-form" action="contact.php" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6 w-100">
                                    <select class="form-select" aria-label="Default select example" name="departamento" required>
                                        <option selected>Seleccione Departamento</option>
                                        <option value="sales">Ventas</option>
                                        <option value="RRHH">Recursos Humanos</option>
                                        <option value="customer_services">Atención al Cliente</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating elem-group">
                                        <input type="text" class="form-control" id="name" placeholder="Nombre" name="visitor_name" required>
                                        <label for="name">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating elem-group">
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="visitor_email" required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating elem-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Asunto" required>
                                        <label for="subject">Asunto</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating elem-group">
                                        <textarea class="form-control" placeholder="Deje su mensaje aquí" id="message" style="height: 100px" name="visitor_message" required></textarea>
                                        <label for="message">Mensaje</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-outline-primary rounded-pill py-3 px-5" type="submit">Enviar Mensaje</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <iframe class="position-absolute w-100 h-100" style="object-fit: cover;"
                        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=es&amp;q=Rawson%205255+(Mi%20nombre%20de%20egocios)&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                        frameborder="0" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Dirección</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Rawson 5255, Mar del Plata, CP B7604BBE</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>Teléfono: +54 (0223) 472-3263</p>
                    <!-- <p class="mb-2"><i class="fa fa-envelope me-3"></i>ejemplo@viomar.com.ar</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div> -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Accesos Rápidos</h5>
                    <a class="btn btn-link" href="">Acerca de nosotros</a>
                    <a class="btn btn-link" href="">Contáctenos</a>
                    <a class="btn btn-link" href="">Nuestros servicios</a>
                    <a class="btn btn-link" href="">Terminos y condiciones</a>
                    <a class="btn btn-link" href="">Trabaje con nosotros</a>
                    <a class="btn btn-link" href="">Soporte</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Galería</h5>
                    <div class="row g-2">
                        <div class="col-4">
                            <img class="img-fluid rounded" src="images/calidad.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="images/calidad.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="images/calidad.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="images/calidad.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="images/calidad.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="images/calidad.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Noticias</h5>
                    <p>Ingrese su email para enterarse de todos nuestros productos.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Email">
                        <button type="button" class="btn btn-outline-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Suscribirse</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">VIOMAR SAIC</a>, Todos los derechos reservados.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- Javascript CDN validation -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
</body>
    
    
    
    `;
     
} else {
    echo '<p>Something went wrong</p>';
}
 
?>