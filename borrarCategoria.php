<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("config.php");


$recordC = new ConfigCategorias();

if (isset($_GET['id']) && isset($_GET['req'])){
    if ($_GET['req'] == "delete"){
        $recordC -> setId($_GET['id']);
        $recordC -> delete();
        echo "<script>alert('Dato borrado satisfactoriamenteE ');document.location='categoria.php'</script>";        
    }
}
?>