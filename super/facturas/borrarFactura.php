<?php

/* ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../config.php");


$recordC = new ConfigFacturas();

if (isset($_GET['facturaId']) && isset($_GET['req'])){
    if ($_GET['req'] == "delete"){
        $recordC -> setFacturaId($_GET['facturaId']);
        $recordC -> delete();
        echo "<script>alert('Dato borrado satisfactoriamenteE ');document.location='facturas.php'</script>";        
    }
}
?> */