<?php
    require '../model/PacienteModel.php';
    require '../model/db.php';
    $fecha = $_REQUEST["fecha"];
    $doctor = $_REQUEST["iddoctor"];
    $resultado = busqueda($doctor,$fecha,$db);
    $nombres = [];
    $i=0;
    while($ver=mysqli_fetch_row($resultado)){
        $nombres[$i] = $ver[1];
        $i++;
    }
        
    echo json_encode($nombres);


?>