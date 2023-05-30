<?php

if (isset($_POST['guardar'])) {
    require_once('../config.php');

    $config = new ConfigClientes();
    $config -> setNombre($_POST['nombre']);
    $config -> setCelular($_POST['celular']);
    $config -> setCompañia($_POST['compañia']);

    $config -> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamentee ');document.location='clientes.php'</script>";
}

?>