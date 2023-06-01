<?php
print_r($_POST['registrarse']); 
print_r($_POST['email']); 
print_r($_POST['username']); 
print_r($_POST['password']); 


if (isset($_POST['registrarse'])){
    require_once("RegistroUser.php");

    $registrar = new RegistroUser();

    $registrar->setIDEmpleado(1);

    $registrar->setEmail($_POST['email']);
    $registrar->setUsername($_POST['username']);
    $registrar->setPassword($_POST['password']);


 if($registrar->checkUser($_POST['email'])){
    echo "<script>alert('Usuario ya existe');document.location='loginRegister.php'</script>";
 }else{
    $registrar->insertData();
    echo "<script>alert('Los datos fueron guardados satisfactoriamente');document.location='../Home/home.php'</script>";

 }
}

?>