<?php
require '../model/DoctorModel.php';

switch($_GET['control']){
    case '1':
        registro();
        break;
    case '2':
        inicio();
        break;
    case '3':
        registroPaciente();
        break;
    default:
        break;
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

    function registroPaciente()
    {
        require './Decorator.php';
        require '../model/db.php';
        registrar($_POST['nombre'],$_POST['apellidos'],$_POST['edad'],$_POST['fecha'],$_POST['comentarios'],$_GET['idDoctor'],$db);
        header("Location:../view/doctor.php?id={$_GET['idDoctor']}");
        
    }

?>