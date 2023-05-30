<?php

if (isset($_POST['guardar'])) {
    require_once('../config.php');

    $config = new ConfigCategorias();
    
    $config -> setNombre($_POST['nombre']);
    $config -> setDescripcion($_POST['descripcion']);
    $config -> setImagen($_POST['imagen']);

    $config -> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamentee ');document.location='categoria.php'</script>";
}

?>