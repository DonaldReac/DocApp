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
    case '4':
        actualizarUsuario();
        break;
    case '5':
        ejecutaractualizar();
        break;
    case '6':
        eliminarPaciente();
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
        $id_usuario =(int) $rows['idDoctor'];

        header("Location:../view/doctor.php?id={$id_usuario}");
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
            $id_usuario = (int) $rows['idDoctor'];
            header("Location:../view/doctor.php?id={$id_usuario}");
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

    function actualizarUsuario()
    {
        require '../model/db.php';
        require '../model/PacienteModel.php';

        $id = $_REQUEST['idUsuario'];
        $id = (int) $id;

        $usuario = getUsuario($id,$db);

        $nombres = [];
      
         $rows = $usuario->fetch_assoc();
         array_push($nombres,$rows['idPaciente']);
         array_push($nombres,$rows['nombre']);
         array_push($nombres,$rows['apellidos']);
         array_push($nombres,$rows['edad']);
         array_push($nombres,$rows['historial']);
         array_push($nombres,$rows['foto']);
         array_push($nombres,$rows['cita']);
         array_push($nombres,$rows['idDoctor']);

        echo json_encode($nombres);

    }

    function ejecutaractualizar() {
        require '../model/PacienteModel.php';
        require '../model/db.php';

        $id = (int) $_REQUEST['idUsuario'];
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        $edad = (int)$_REQUEST['Edad'];
        $cita = $_REQUEST['Fecha'];
        $comentarios = $_REQUEST['comentarios'];
        
        $consulta = "UPDATE paciente SET nombre='{$nombre}', apellidos ='{$apellidos}',edad ={$edad}, historial = '{$comentarios}', cita='{$cita}' WHERE idPaciente={$id}";
        $consulta =  mysqli_query($db,$consulta);
        
        echo $id;

    }

    function eliminarPaciente() {
        require '../model/PacienteModel.php';
        require '../model/db.php';
        print_r("entro al php");
        $id = $_REQUEST['idUsuario'];        
        $delete = "DELETE FROM paciente WHERE idPaciente={$id}";
        $delete =  mysqli_query($db,$delete);
        print_r("paso la consulta");
        echo $id;
    }
?>