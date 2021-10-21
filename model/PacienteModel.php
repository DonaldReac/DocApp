<?php

    function busqueda($idDoctor,$fecha,$db)
    {
        
       $consulta = "SELECT * FROM PACIENTE WHERE cita like '%{$fecha}%' AND idDoctor={$idDoctor}";
       $consulta =  mysqli_query($db,$consulta);
       return $consulta;
    }


?>