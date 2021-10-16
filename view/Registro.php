<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="StyleSheet" href="../styles/estilos.css" TYPE="text/css"">
    <title>DocApp</title>
</head>
<body class="body">
    <div class="container w-75 fondo mt-5 rounded shadow">
      <div class="row align-items-stretch">
        <div class="col bg2 d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
        <!-- aqui va la imagen ---->
        </div>
        <div class="col p-5 rounded-end">
          <div class="text-end">
            <img src="../imagenes/LOGO-SALUD-MORADO.png " class="imgshadow" width="50" alt="aqui va el logo">
          </div>
          <h2 class="fw-bold text-center py-3">Crea Tu Cuenta</h2>
          <!-- login -->
          <form action="../controller/DoctorController.php" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Correo Electronico</label>
              <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
              <label for="passwordconfirm" class="form-label">Confirma tu Contraseña</label>
              <input type="password" class="form-control" name="passwordconfirm" id="passwordconfirm">
            </div>
            <div class="alert alert-danger " id="campos" role="alert" style="display:none">
              Error , Los Campos No Pueden Ir Vacíos!
            </div>
            <div class="d-grid">
              <button type="submit" id="inicio" class="btn btn-primary" >Crea Mi Cuenta</button>
            </div>
            <div class="my-3">
              <span>¿Ya tienes Cuenta?<a href="index.php">Inicia Sesión</a></span>
            </div>
          </form>
        </div>
      </div>
    </div>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../js/registro.js"></script>
</html>