<?php

    function busqueda($idDoctor,$fecha,$db)
    {
        
       $consulta = "SELECT * FROM PACIENTE WHERE idDoctor={$idDoctor} AND (cita like '%{$fecha}%' OR nombre like '%{$fecha}%' )";
       $consulta =  mysqli_query($db,$consulta);
       return $consulta;
    }

    function getUsuario($id,$db)
    {
    $consulta = "SELECT * FROM PACIENTE WHERE idPaciente={$id}";
    $consulta =  mysqli_query($db,$consulta);
    return $consulta;
    }

?>