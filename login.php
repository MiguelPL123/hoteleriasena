<?php
  include("includes/conexion.php");
  session_start();
  $alerta="";
  $user=null;
  $passw=null;

  if (isset($_POST['email']) && isset($_POST['password'])) {
    $user=$_POST['email'];
    $passw=$_POST['password'];
    
    $sql="SELECT * FROM usuarios WHERE usuario='$user'";
    $result= mysqli_query($con,$sql);
    if (!$result) {
      die("ERROR AL CONSULTAR USUARIO ".mysqli_error($con));
    }
    if (mysqli_num_rows($result)>0) {
      while ($row = mysqli_fetch_array($result)) {
        if ($row['contrasena']==$passw) {
          $_SESSION['tipo']=$row['tipo'];
          header("Location: home.php");
        }else{
          $alerta="Contraseña incorrecta!";    
        }
      }
    } else {
      $alerta="Lo sentimos,este nombre usuario no existe!";
    }
  }
  
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>Inicio de sesión</title>
    <style>

      a:link{
        text-decoration: none;
      }      

      body{
        background: #f2f4fb;
        background: linear-gradient(to right, #61677c, #f2f4fb);
      }
      
      .bg{
        background-image: url(images/hero_2.jpg);
        background-position: center center;
      }
    </style>
  </head>
  <body>

    <div class="container w-75 mt-5 rounded-3 shadow">
      <div class="row align-items-sm-stretch">
        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

        </div>
        
        <div class="col bg-white p-5 rounded-end">
          <div class="text-end">
            <img width="100" src="/images/logoPage.png" alt="">
          </div>

          <h2 class="fw-bold text-center pt-5 mb-5">Inicio de sesión</h2>

          <!-- Login -->

          <form action="" method="POST">
            <!-- Alertas dinamicas -->
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
              <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </symbol>
              <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
              </symbol>
              <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </symbol>
            </svg>

            <?php if(!empty($alerta)):?>
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div><?php echo $alerta;?></div><!-- Mensaje de error-->
              </div>
            <?php endif;?>
            <!-- Cierre de alertas -->

            <div class="mb-4">
              <input type="text" class="form-control" placeholder="Nombre de usuario" name="email" value="<?php if(isset($user)) echo $user;?>" required>
            </div>

            <div class="mb-4">
              <input type="password" class="form-control" placeholder="Contraseña" name="password" value="<?php if(isset($passw)) echo $passw;?>" required>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
            </div>

            <div class="my-3">
              <div class="mb-3">
                <span>¿No tienes cuenta?<a href="#"> Solicita al administrador acceso</a></span>
              </div>

              <div>
                <span><a href="index.php">Regresar al inicio</a></span>
              </div>
              
            </div>
          </form>

           

        </div>
      </div>
    </div>

    <!-- Script de Bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>