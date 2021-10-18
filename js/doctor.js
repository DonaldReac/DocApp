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