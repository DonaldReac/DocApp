<?php
require '../model/DoctorModel.php';


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
        insertar($db,$correo,$password);

        $consulta ="SELECT * FROM doctor where correo = '{$correo}' and contraseña = '{$password}'";        
        $info=getquery($db,$consulta);

        $rows = $info->fetch_array();
        $id_usuario = $rows['idDoctor']; 

        header("Location:../view/doctor.php?id='{$id_usuario}'");
    }

    function inicio(){
        require '../model/db.php';
        $correo = $_POST['email'];
        $password = $_POST['password'];

        $consultaid ="SELECT * FROM doctor where correo = '{$correo}' and contraseña = '{$password}'";
        $info = getquery($db,$consultaid);
       
        $rows = $info->fetch_assoc();
        if($correo == $rows['correo'] && $password == $rows['contraseña'])
        {
            $id_usuario = $rows['idDoctor'];
            header("Location:../view/doctor.php?id='{$id_usuario}'");
        }else{
            header("Location:../view/index.php?error=La cuenta no existe, vuelva a intentarlo");
        }
        
        
    }

?>