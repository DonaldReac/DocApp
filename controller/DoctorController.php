<?php

if( isset($_POST['passwordconfirm']))
{
    registro();
    //ejecutar sentencia para registrar un usuario
}else{
    //ejecutar sentencia para registrar un usuario
    inicio();

    //validar los datos
       
}

    function registro(){
        echo 'es registro';
    }

    function inicio(){
        echo 'es inicio';
    }

?>