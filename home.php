<?php

  include("includes/conexion.php");

  session_start();
  if (!isset($_SESSION['tipo'])) {
    header("Location: index.php");
  }
  unset($_SESSION['idhabitacion']);


  $sql = "SELECT ca.categoria, ca.imagen, h.precio, h.descripcion,h.idHabitacion FROM `habitacion` AS h 
          INNER JOIN categorias_habitaciones AS ca ON ca.codHab=h.codHab WHERE h.estado='disponible' 
          ORDER BY ca.categoria ASC;";  
  $result=mysqli_query($con, $sql);
  if(!$result){
      die("ERROR AL CONSULTAR CATEGORIA CON HABITACIONES".mysqli_error($con));
  }


  $categoria=array();
  while($row=mysqli_fetch_array($result)){
    $ruta=$row['imagen'];
    $split=explode("../",$ruta);
    $categoria[]=array($row['categoria'],$split[1],$row['precio'],$row['descripcion'],$row['idHabitacion']);
  }

  /* Consultar configuraciones */

    $sql="SELECT * FROM configuracion;";
    $result= mysqli_query($con,$sql);
    if(!$result) die("ERROR AL CONSULTAR CONFIGURACIONES".mysqli_error($con));
    $banners=array();
    while ($row = mysqli_fetch_array($result)) {
        $banners[]= array(
            "titulo"=>$row['titulo'],
            "descripcion"=>$row['descripcion'],
            "imagen"=>$row['imagen']
        );
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css"rel="stylesheet"/>
    <link rel='stylesheet' type='text/css' media='screen' href='css/home.css'>
    <script src='js/home.js'></script>
   
    
</head>
<body>

<!-- Navbar -->

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <!-- Container wrapper -->
<div class="container-fluid">
  <a href="#" class="navbar-brand">
    <img src="images/senanaranja.png" alt="logo" height="60">
  </a>
  <button class="navbar-toggler navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item text-center">
            <a href="#" class="nav-link navbtn text-uppercase">Inicio</a>
          </li>
          <li class="nav-item text-center">
            <a href="dashboard/dashboard.php" class="d-block btn primary me-3">Administracion</a>
          </li>
          <li class="nav-item text-center">
          <a href="includes/logout.php" class="d-block btn primary me-3">
              <!-- <i><span class="material-symbols-outlined">
              power_settings_new
              </span></i> -->
              <span>Cerrar sesión</span>
            </a>  
          </li>
        </ul>
      </div>
  </div>
</nav>



<!-- Carrusel -->
<div id="carouselExampleFade" class="carousel slide carousel-fade text-center" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <div class="carousel-inner ">
    <div class="carousel-item active">
      <div class="w-100  hero heros" style="background-image: url('<?php if($banners[0]["imagen"]!=null){ echo $banners[0]["imagen"];}else{echo '../images/bannerhome/default.jpg';}?>');">
        <h1 class="ms-5 me-5"><?php echo $banners[0]["titulo"];?></h1>
        <p class="ms-5 me-5"><?php echo $banners[0]["descripcion"];?></p>
      </div>
    </div>
    <div class="carousel-item">
      <div class="w-100  hero2 heros " style="background-image: url('<?php if($banners[1]["imagen"]!=null){ echo $banners[1]["imagen"];}else{echo '../images/bannerhome/default.jpg';}?>');">
        <h1 class="ms-5 me-5"><?php echo $banners[1]["titulo"];?></h1>
        <p class="ms-5 me-5"><?php echo $banners[1]["descripcion"];?></p>
      </div>
    </div>
    <div class="carousel-item">
      <div class="w-100  hero3 heros " style="background-image: url('<?php if($banners[2]["imagen"]!=null){ echo $banners[2]["imagen"];}else{echo '../images/bannerhome/default.jpg';}?>');">
        <h1 class="ms-5 me-5"><?php echo $banners[2]["titulo"];?></h1>
        <p class="ms-5 me-5"><?php echo $banners[2]["descripcion"];?></p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- End Carrusel -->

<!-- Formulario -->

<div class="container">
  
  <div class="titulocont d-flex text-center justify-content-center mb-4">
    <h1>Habitaciones disponibles</h1>
  </div>
    <div class="d-flex flex-wrap justify-content-center formulario">
      <div class="inputtwo justify-content-center mb-3 me-5 ms-5 text-center">
      <form action="" method="get">
        <p>Fecha de ingreso</p>
        <input type="date" name="fechaIn" id="fechaIn">
      </form>
      </div>
      <div class="inputone justify-content-center text-center">
        <form action="" method="post">
          <p>Fecha de salida</p>
          <input type="date" name="fechaOut" id="fechaOut">
        </form>
      </div>
        
    </div>
</div>

<!-- Tabla habitaciones -->

<?php foreach($categoria as $value):?>
  <div class=" habiCont">
    <div class="habiItem">
            <div class="head">
              <h2><?php echo $value[0]?></h2>
            </div>
           
              <div class="imgCont">
                <img src="<?php echo $value[1]?>" alt="1" height="250">
              </div>
              <div class="descCont">
                <!-- <h4>500.000$ por dia, habitacion empresarial</h4> -->
                <p><?php echo $value[3]?></p>
                <br>
                <h5 style="font-size: 20px; text-align: center;">$  <?php echo $value[2]?>,por dia</h5>
                <button class="btnform" onclick="prueba('<?php echo $value[4]?>')">Reservar</button>
            
      </div>
    </div>
  </div>

<?php endforeach;?>

<?php if(count($categoria)==0):?>
  <div style="text-align: center; margin-top: 20px; margin-bottom: 20px;">
      <h4>En estos momentos no contamos con habitaciones disponibles!</h4>
  </div>  
<?php endif;?>


  <!-- Inicio footer -->

  <footer class="bg-dark text-center text-white">
    <div class="container p-4 pb-0">
      <section class="mb-4">
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-facebook-f"></i
        ></a>
  
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-twitter"></i
        ></a>
  
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-google"></i
        ></a>
  
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-instagram"></i
        ></a>
  
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-linkedin-in"></i
        ></a>

        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-github"></i
        ></a>
      </section>
  
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://www.sena.edu.co/">Sena.com</a>
    </div>
  </footer>

<!-- Javascript -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"
></script>
<script>
  function prueba(element){
    $(function(){
      let gets="?";
      let fechaIn=$("#fechaIn").val();
      let fechaOut=$("#fechaOut").val();
      if (fechaIn!='' && fechaOut!='') {
        gets+="fechaIn="+fechaIn+"&fechaOut="+fechaOut;
      }
      $.ajax({
        url:'./includes/crearSessionHome.php',
        type:'POST',
        data:{element},
        success: function(resp){
          if (gets!='?') {
            location.href="./dashboard/forms/newReserva.php"+gets;
          }else{
            location.href="./dashboard/forms/newReserva.php";
          }
        }
      })
    })
  }
</script>
</body>
</html>