<?php

if( isset($_POST['passwordconfirm']))
{
    registro();
    //ejecutar sentencia para registrar un usuario
}else{
    //ejecutar sentencia para registrar un usuario
    inicio();
       
}

    function registro(){
        require '../model/db.php';
        $correo = $_POST['email'];
        $password = $_POST['password'];
        
        $consulta = "INSERT INTO Doctor (correo,contraseña) values ('{$correo}','{$password}')";
        $consulta = mysqli_query($db,$consulta);

        $consultaid ="SELECT * FROM doctor where correo = '{$correo}' and contraseña = '{$password}'";
        $consultaid= mysqli_query($db,$consultaid);
    
        $rows = $consultaid->fetch_array();
        $id_usuario = $rows['idDoctor'];
         

        header("Location:../view/doctor.php?id='{$id_usuario}'");
    }

    function inicio(){
        require '../model/db.php';
        $correo = $_POST['email'];
        $password = $_POST['password'];

        $consultaid ="SELECT * FROM doctor where correo = '{$correo}' and contraseña = '{$password}'";
        $consultaid= mysqli_query($db,$consultaid);
       
        $rows = $consultaid->fetch_assoc();
        if($correo == $rows['correo'] && $password == $rows['contraseña'])
        {
            $id_usuario = $rows['idDoctor'];
            header("Location:../view/doctor.php?id='{$id_usuario}'");
        }else{
            header("Location:../view/index.php?error=La cuenta no existe, vuelva a intentarlo");
        }
        
        
    }

?>