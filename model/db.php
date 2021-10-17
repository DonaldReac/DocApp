<?php

$db = mysqli_connect('localhost', 'root', '', 'doctor');


if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "errno de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
} //else{
//     echo 'conexion exitosa';
//     // $consulta = "SELECT * FROM Doctor";
//     // $consulta = mysqli_query($db,$consulta);
    
//     // while($rows = $consulta->fetch_array()){
//     //     echo "<br>".$rows['correo'];
//     //     echo "<br>".$rows['contraseña'];
//     //} 
// }
