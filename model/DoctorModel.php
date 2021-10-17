<!-- funcion para insertar un doctor -->
<?php

    function insertar($db,$correo,$password)
    {
        $consulta = "INSERT INTO Doctor (correo,contraseña) values ('{$correo}','{$password}')";
        $consulta = mysqli_query($db,$consulta);

    }

    function getquery($db,$consulta){
        
        $consultaid= mysqli_query($db,$consulta);
        return $consultaid;
    }

?>