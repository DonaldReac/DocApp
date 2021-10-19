let agregar = document.querySelector("#agregar");
agregar.addEventListener("click",formulario);

function formulario()
{
    if(document.getElementById("form").style.display == 'block')
    {
        document.getElementById("form").style.display='none';
    }else{
        document.getElementById("form").style.display='block';
    }
    
}
let agregarPaciente = document.querySelector("#agregarpaciente");
agregarPaciente.addEventListener("click",validar);

function validar(e){
    
    let comentarios = document.querySelector("#comentarios").value;
    let fecha = document.querySelector("#fecha").value;
    let edad = document.querySelector("#edad").value;
    let apellidos = document.querySelector("#apellidos").value;
    let nombre = document.querySelector("#nombre").value;

    if( comentarios != '' && fecha !='' && edad!='' && apellidos!= '' && nombre!='' ){

        return
    }else
    {
        document.getElementById("campos").style.display='block';
        e.preventDefault();
        
    }
    
}


