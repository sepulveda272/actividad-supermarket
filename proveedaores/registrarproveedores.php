<?php

if (isset($_POST['guardar'])) {
    require_once('../config.php');

    $config = new ConfigProveedores();
    
    $config -> setNombre($_POST['nombre']);
    $config -> setTelefono($_POST['telefono']);
    $config -> setCiudad($_POST['ciudad']);

    $config -> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamentee ');document.location='provedores.php'</script>";
}

?>