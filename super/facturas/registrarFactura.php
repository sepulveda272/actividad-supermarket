<?php
if(isset($_POST["guardar"])){
    require_once("facturas.php");

    $config = new ConfigFacturas();

    $config->setFacturaId($_POST["facturaId"]);
    $config->setEmpleadoId($_POST["empleadoId"]);
    $config->setClienteId($_POST["clienteId"]);
    $config->setFecha($_POST["fecha"]);
    
    $config->insertData();

    echo "
    <script> alert('Los datos fueron guardados exitosamente');
    document.location='facturas.php'
    </script>"; 
}
?>