<?

    function insertarPaciente()
    {
        require '../model/db.php';
        
        $consulta = "INSERT INTO paciente (correo,contraseña) values ('{$correo}','{$password}')";
        $consulta = mysqli_query($db,$consulta);
    }

?>