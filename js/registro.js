let login = document.querySelector("#inicio");
login.addEventListener("click",validar);

function validar(e){
    let correo = document.querySelector("#email").value;
    let contraseña = document.querySelector("#password").value;
    let contraseñaConfirm = document.querySelector("#passwordconfirm").value;

    if( correo != '' || contraseña !='' || contraseñaConfirm!=''){
        return
    }else
    {
        document.getElementById("campos").style.display='block';
        e.preventDefault();
        
    }
    
}