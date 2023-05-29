<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
if (isset($_POST['guardar'])) {
    require_once('../config.php');

    $config = new ConfigFacturas();
    
    $config -> setId_empleado($_POST['id_empleado']);
    $config -> setId_cliente($_POST['id_cliente']);
    $config -> setFecha($_POST['fecha']);

    $config -> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamentee ');document.location='facturas.php'</script>";
}

?>