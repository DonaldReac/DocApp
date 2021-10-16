let login = document.querySelector("#inicio");
login.addEventListener("click",validar);

function validar(e){
    
    let correo = document.querySelector("#email").value;
    let contraseña = document.querySelector("#password").value;

    if( correo != '' || contraseña !=''){
        
        return
    }else
    {
        document.getElementById("campos").style.display='block';
        e.preventDefault();
        
    }
    
}
