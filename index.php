<?php
  include("./includes/conexion.php");
  session_start();
  session_destroy();
  /* Consulta de las habitaciones */
  $sql="SELECT DISTINCT(cat.categoria),cat.imagen,h.descripcion FROM `categorias_habitaciones` AS cat INNER JOIN habitacion AS h ON cat.codHab=h.codHab;";
  $result=mysqli_query($con,$sql);
  if (!$result) {
    die("ERROR AL CONSULTAR CATEGORIAS".mysqli_error($con));
  }
  $categorias=array();
  while ($row = mysqli_fetch_array($result)) {
    $ruta=$row['imagen'];
    $split=explode("../",$ruta);
    $categorias[]=array(
      "imagen"=>$split[1],
      "categoria"=>$row['categoria'],
      "descripcion"=>$row['descripcion']
    );
  }

?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hotel Sena</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

  <!-- Estilos -->

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <link rel="stylesheet" href="css/plant/bootstrap.min.css">
    <link rel="stylesheet" href="css/plant/animate.css">
    <link rel="stylesheet" href="css/plant/owl.carousel.min.css">
    <link rel="stylesheet" href="css/plant/aos.css">
    <link rel="stylesheet" href="css/plant/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/plant/jquery.timepicker.css">
    <link rel="stylesheet" href="css/plant/fancybox.min.css">
    
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Estilo principal -->
    <link rel="stylesheet" href="css/index.css">
  </head>
  <body>

  <!-- Inicio slider -->
    
    <header class="site-header js-site-header">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="#" ><img src="images/senanaranja.png" alt="" style="width: 70px; height: 65px;"></a></div>

          
          <div class="col-6 col-lg-8">


            <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- Fin slider -->

            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6 mx-auto">
                      <ul class="list-unstyled menu">
                        <li class="active"><a href="#">Inicio</a></li>
                        <li><a href="contact.php">Contacto</a></li>
                        <li><a href="login.php">Iniciar sesion</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Fin menu -->

    <section class="site-hero overlay" style="background-image: url(images/sena.jpeg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <span class="custom-caption text-uppercase text-white d-block  mb-3" style="font-size: 14px;">Bienvenido a su <span class="fa fa-star text-primary"></span>   Hotel Sena</span>
            <h1 class="heading">UN MEJOR LUGAR PARA QUEDARSE</h1>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- Fin slider -->

  <!-- Inicio contenido -->

    <section class="py-5 bg-light" id="next">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
            <figure class="img-absolute">
              <img src="images/sena.jpg" alt="Image" class="img-fluid">
            </figure>
            <img src="images/Turismo.jpg" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
            <h2 class="heading">Bienvenido!</h2>
            <p class="mb-4">Muy lejos, detrás de la palabra montañas, lejos de los países Vokalia y Consonantia, viven los textos ciegos. Separados, viven en Bookmarksgrove justo en la costa de la Semántica, un gran océano de idiomas.</p>
          </div>
          
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7" id="habitaciones">
            <h2 class="heading" data-aos="fade-up">Habitaciones</h2>
            <p data-aos="fade-up" data-aos-delay="100">Muy lejos, detrás de la palabra montañas, lejos de los países Vokalia y Consonantia, viven los textos ciegos. Separados, viven en Bookmarksgrove justo en la costa de la Semántica, un gran océano de idiomas.</p>
          </div>
        </div>
        <div class="row">
          <?php if(count($categorias)==0):?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
              <a href="#" class="room">
                <figure class="img-wrap">
                  <img src="images/img_1.jpg" alt="Free website template" class="img-fluid mb-3">
                </figure>
                <div class="p-3 text-center room-info">
                  <h2>Estandar</h2>
                  <p style="color: gray;">Habitación con 2 camas y refrigerador.</p>
                </div>
              </a>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up">
              <a href="#" class="room">
                <figure class="img-wrap">
                  <img src="images/img_2.jpg" alt="Free website template" class="img-fluid mb-3">
                </figure>
                <div class="p-3 text-center room-info">
                  <h2>Suite</h2>
                  <p style="color: gray;">Habitación con cama extra grande para 1 a 2 personas</p>
                </div>
              </a>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up">
              <a href="#" class="room">
                <figure class="img-wrap">
                  <img src="images/img_3.jpg" alt="Free website template" class="img-fluid mb-3">
                </figure>
                <div class="p-3 text-center room-info">
                  <h2>Empresarial</h2>
                  <p style="color: gray;">Acceso al sala VIP o Ejecutivo</p>
                </div>
              </a>
            </div>
          <?php else:?>
            <!-- Cargando categorias de la base de datos -->
            <?php foreach ($categorias as $key => $value):?>
              <div class="col-md-6 col-lg-4" data-aos="fade-up">
                <a href="#" class="room">
                  <figure class="img-wrap">
                    <img src="<?php echo $value['imagen']?>" alt="Free website template" class="img-fluid mb-3">
                  </figure>
                  <div class="p-3 text-center room-info">
                    <h2><?php echo $value['categoria']?></h2>
                    <p style="color: gray;"><?php echo $value['descripcion']?></p>
                  </div>
                </a>
              </div>
            <?php endforeach;?>
            <!-- Fin del forEach -->
          <?php endif;?>

        </div>
      </div>
    </section>
    
    
    <section class="section slider-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">Galeria</h2>
            <p data-aos="fade-up" data-aos-delay="100">Muy lejos, detrás de la palabra montañas, lejos de los países Vokalia y Consonantia, viven los textos ciegos. Separados, viven en Bookmarksgrove justo en la costa de la Semántica, un gran océano de idiomas.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
            <?php if(count($categorias)==0):?>
              <div class="slider-item">
                <a href="images/slider-1.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="images/slider-1.jpg" alt="Image placeholder" class="img-fluid"></a>
              </div>
              <div class="slider-item">
                <a href="images/slider-2.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="images/slider-2.jpg" alt="Image placeholder" class="img-fluid"></a>
              </div>
              <div class="slider-item">
                <a href="images/slider-3.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="images/slider-3.jpg" alt="Image placeholder" class="img-fluid"></a>
              </div>
              <div class="slider-item">
                <a href="images/slider-4.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="images/slider-4.jpg" alt="Image placeholder" class="img-fluid"></a>
              </div>
              <div class="slider-item">
                <a href="images/slider-5.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="images/slider-5.jpg" alt="Image placeholder" class="img-fluid"></a>
              </div>
              <div class="slider-item">
                <a href="images/slider-6.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="images/slider-6.jpg" alt="Image placeholder" class="img-fluid"></a>
              </div>
              <div class="slider-item">
                <a href="images/slider-7.jpg" data-fancybox="images" data-caption="Caption for this image"><img src="images/slider-7.jpg" alt="Image placeholder" class="img-fluid"></a>
              </div>
            <?php else:?>
              <?php foreach ($categorias as $key => $value):?>
              <div class="slider-item">
                <a href="<?php echo $value['imagen']?>" data-fancybox="images" data-caption="<?php echo $value['categoria']?>"><img src="<?php echo $value['imagen']?>" alt="Image placeholder" class="img-fluid"></a>
              </div>
              <?php endforeach;?>
            <?php endif;?>
            </div>
          </div>
        
        </div>
      </div>
    </section>
    
  <!-- Fin contenido -->

  <!-- Inicio footer -->

    <section class="section bg-image overlay" style="background-image: url('images/sena.jpeg');">
        <div class="container" >
          <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
              <h2 class="text-white font-weight-bold">Un mejor lugar para quedarse. ¡Reservar ahora!</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
              <a href="contact.php" class="btn btn-outline-white-primary py-3 text-white px-5">Reserva ahora</a>
            </div>
          </div>
        </div>
    </section>

    <footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">Nosotros</a></li>
              <li><a href="#">Terminos &amp; Condiciones</a></li>
              <li><a href="#">Politicas de provacidad</a></li>
             <li><a href="#">Habitaciones</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#habitaciones">Las habitaciones</a></li>
              <li><a href="#">Nosotros</a></li>
              <li><a href="#">Contacto</a></li>
              <li><a href="#">Restaurante</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Direccion:</span> <span> 198 West 21th Street, <br> Suite 721 New York NY 10016</span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Telefono:</span> <span> (+57) 555-555-5555</span></p>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Correo:</span> <span> info@domain.com</span></p>
          </div>
          <div class="col-md-3 mb-5">
            <p>Suscríbase a nuestro boletín</p>
            <form action="#" class="footer-newsletter">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Direccion de correo...">
                <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5">
          <p class="col-md-6 text-left">
            
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Toodo los derechos reservados <i class="icon-heart-o" aria-hidden="true"></i> Para la  <a href="https://goo.gl/maps/UDArMQikfhDin6G97" target="_blank" >SENA</a>
            
          </p>
            
          <p class="col-md-6 text-right social">
            <a href="#"><span class="fa fa-tripadvisor"></span></a>
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
            <a href="#"><span class="fa fa-linkedin"></span></a>
            <a href="#"><span class="fa fa-vimeo"></span></a>
          </p>
        </div>
      </div>
    </footer>
    
  <!-- Plugins Javascript -->

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    
    
    <script src="js/aos.js"></script>
    
    <script src="js/bootstrap-datepicker.js"></script> 
    <script src="js/jquery.timepicker.min.js"></script> 

    

    <script src="js/main.js"></script>
  </body>
</html>