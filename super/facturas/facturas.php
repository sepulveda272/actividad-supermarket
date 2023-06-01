
<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../config.php");


$data = new ConfigFacturas();
$all = $data -> getAll();
$idempleado = $data->obtenerEmpleadoId();
$idcliente = $data->obtenerClienteId();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Facturas</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/estudiantes.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Camper Skills.</h3>
        <img src="../images/sepulveda.jpg" alt="" class="imagenPerfil">
        <h3>Juan David</h3>
      </div>
      <div class="menus">
      <a href="../../Home/home.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;">Home</h3>
        </a>
        <a href="../categoria/categoria.php" style="display: flex;gap:2px;">
        <i class="bi bi-cart-check"></i>
          <h3 style="margin: 0px;">Categoriaa</h3>
        </a>
        <a href="../empleados/empleados.php" style="display: flex;gap:2px;">
        <i class="bi bi-cart-check"></i>
          <h3 style="margin: 0px;">Empleados</h3>
        </a>
        <a href="../clientes/clientes.php" style="display: flex;gap:2px;">
        <i class="bi bi-cart-check"></i>
          <h3 style="margin: 0px;">Clientess</h3>
        </a>
        <a href="../proveedaores/provedores.php" style="display: flex;gap:2px;">
        <i class="bi bi-cart-check"></i>
          <h3 style="margin: 0px;">Proveedores</h3>
        </a>
        <a href="facturas.php" style="display: flex;gap:2px;">
        <i class="bi bi-cart-check"></i>
          <h3 style="margin: 0px;">Facturas</h3>
        </a>
        <a href="../../Login/loginRegister.php" style="display: flex;gap:2px;color: brown;">
          <i class="bi bi-x-square"></i>
          <h3 style="margin: 0px;">salir</h3>
        </a>
      </div>
    </div>

    <div class="parte-media">
      <div style="display: flex; justify-content: space-between;">
        <h2>Factura</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarEstudiantes"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">EMPLEADO ID</th>
              <th scope="col">CLIENTE ID</th>
              <th scope="col">FECHA</th>
              <th scope="col">BORRAR</th>
              <th scope="col">EDITAR</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">

            <!-- ///////Llenado DInamico desde la Base de Datos -->
            <?php
              foreach($all as $key => $val){
            ?> 
              <tr>
                <td> <?= $val["facturaId"] ?> </td>
                <td> <?= $val["nombres"] ?> </td>
                <td> <?= $val["nombre"] ?> </td>
                <td> <?= $val["fecha"] ?> </td>
                <td>
                  <a class="btn btn-outline-danger" href="borrarFactura.php?facturaId=<?=$val['facturaId']?>&req=delete">
                  <i class="bi bi-trash3"></i>Borrar</a>
                </td>
                <td>
                  <a class="btn btn-outline-warning" href="actualizarFactura.php?facturaId=<?=$val['facturaId']?>&empleadoId=<?=$val['empleadoId']?>&clienteId=<?=$val['clienteId']?>">
                  <i class="bi bi-pencil-square"></i>Editar</a>
                </td>
              </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="parte-derecho " id="detalles">
      <h3>Detalle Clientes</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>

    <!-- /////////Modal de registro de nuevo estuiante //////////-->
    <div class="modal fade" id="registrarEstudiantes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Proveedores</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="registrarFactura.php" method="post">
              <div class="mb-1 col-12">
                <label for="empleadoId" class="form-label">Empleado Id</label>
                <select class="form-select" aria-label="Default select example" id="empleadoId" name="empleadoId" required>
                  <option selected>Seleccione el id del Empleados</option>
                  <?php
                    foreach($idempleado as $key => $valor){
                    ?> 
                  <option value="<?= $valor["id"]?>"><?= $valor["nombres"]?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="mb-1 col-12">
                <label for="clienteId" class="form-label">Cliente Id</label>
                <select class="form-select" aria-label="Default select example" id="clienteId" name="clienteId" required>
                  <option selected>Seleccione el id del Cliente</option>
                  <?php
                    foreach($idcliente as $key => $valor){
                    ?> 
                  <option value="<?= $valor["idClientes"]?>"><?= $valor["nombre"]?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="mb-1 col-12">
                <label for="fecha" class="form-label">fecha</label>
                <input 
                  type="date"
                  id="fecha"
                  name="fecha"
                  class="form-control" 
                />
              </div> 
              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="guardar" name="guardar"/>
              </div>
            </form>      
         </div>       
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>


</body>

</html>