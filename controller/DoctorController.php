<?php

if( isset($_POST['passwordconfirm']))
{
    echo 'es registro';
    //ejecutar sentencia para registrar un usuario
}else{
    //ejecutar sentencia para registrar un usuario
    echo 'es inicio';

    //si todo es correcto va a redirigir a la pantalla del doctor
    header('Location:../view/doctor.php');
}

?>