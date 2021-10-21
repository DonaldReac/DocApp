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

let buscar = document.querySelector("#buscar");
buscar.addEventListener("keyup",leer);

function leer(e){
    let busqueda = e.target.value;
    let doctor = parseInt(document.querySelector("#iddoctor").value);
    
    $.ajax({
        url: "../controller/Pacientecontroller.php",
        global: false, type: "POST", 
        data: { fecha: busqueda ,iddoctor: doctor}, 
        cache: false,
        success: function(usuarios) {
          result = eval(usuarios);
          for (let index = 0; index < result.length; index++) {
              console.log(result[index]);
          }

        }
      });
      
      if(document.querySelector("#buscar").value==""){
        document.getElementById("pacientesFecha").style.display='none';
      }else{
        document.getElementById("pacientesFecha").style.display='block';
      }
      

      
}


