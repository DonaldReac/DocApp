<?php
    function registrar($nombre,$apellido,$edad,$fecha,$comentarios,$idDoctor,$db){
        
        $edad= intval($edad);
                
        $consulta = "INSERT INTO Paciente (nombre,apellidos,edad,historial,cita,idDoctor) 
        values ('{$nombre}','{$apellido}',{$edad},'{$comentarios}','{$fecha}',{$idDoctor})";
        $consulta = mysqli_query($db,$consulta);

    }


?>