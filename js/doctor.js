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
          let titulo = document.querySelector('#tituloLista');
          if(result==""){
            
            titulo.innerHTML= 'Lo siento no tienes pacientes para esta fecha o el paciente no existe';
          }else{
            titulo.innerHTML= 'Usuarios con cita';
          }

          let lista = document.querySelector("#lista");
          while(lista.firstChild){
                lista.removeChild(lista.firstChild);
          }

          for (let index = 0; index < result.length; index++) {
              let nombre = document.createElement('li');
              nombre.textContent = result[index];
              nombre.classList.add('list-group-item');
              lista.appendChild(nombre);
          }

        }
      });


      
      if(document.querySelector("#buscar").value==""){
        document.getElementById("pacientesFecha").style.display='none';
      }else{
        document.getElementById("pacientesFecha").style.display='block';
      }
}

function actualizarPaciente(e){
  const usuario = parseInt(e.id);

  $.ajax({
    url: "../controller/DoctorController.php?control=4",
    global: false, type: "POST", 
    data: { idUsuario: usuario}, 
    cache: false,
    success: function(usuario) {
      
      result = eval(usuario);
      const idUsuario = result[0];
      const nombre = result[1];
      const apellidos = result[2];
      const edad = result[3];
      const historial = result[4];
      const cita = result[6];

      document.getElementById("form").style.display='block';
      document.getElementById("actpaciente").style.display='block';
      document.getElementById("agregarpaciente").style.display='none';

      const inputUsuario = document.querySelector("#actualizarUsuario");
      const inputNombre = document.querySelector("#nombre");
      const inputApellidos = document.querySelector("#apellidos");
      const inputEdad = document.querySelector("#edad");
      const inputFecha = document.querySelector("#fecha");
      const inputComentarios = document.querySelector("#comentarios");

      //console.log(idUsuario,nombre,apellidos,edad,historial,cita,inputUsuario,inputNombre,inputApellidos,inputEdad,inputFecha,inputComentarios);
      
      inputUsuario.value=idUsuario;
      inputNombre.value=nombre;
      inputApellidos.value=apellidos;
      inputEdad.value=edad;
      inputFecha.value=cita;
      inputComentarios.value=historial;

    }});
}

  let querypaciente = document.querySelector("#actpaciente");
  querypaciente.addEventListener("click",query);

   function query (e){
      
       const inputUsuario = parseInt(document.querySelector("#actualizarUsuario").value);
       const inputNombre = document.querySelector("#nombre").value;
       const inputApellidos = document.querySelector("#apellidos").value;
       const inputEdad = parseInt(document.querySelector("#edad").value);
       const inputFecha = document.querySelector("#fecha").value;
       const inputComentarios = document.querySelector("#comentarios").value;
  
       $.ajax({
         url: "../controller/DoctorController.php?control=5",
         global: false, type: "POST", 
         data: { idUsuario: inputUsuario ,nombre: inputNombre,apellidos: inputApellidos, Edad:inputEdad,Fecha:inputFecha,comentarios:inputComentarios}, 
         cache: false,
         success: function(e) {
           console.log(e);
           location.reload();
         }
       });
      
 }

 function eliminaP (e){
  e.preventDefault;
  const usuario = parseInt(e.id);
  var confirmación
  console.log(usuario);
  confirmación=confirm("Seguro que desea eliminar al paciente?")
  if (confirmación){
    $.ajax({
      url: "../controller/DoctorController.php?control=6",
      global: false, type: "POST", 
      data: { idUsuario: usuario}, 
      cache: false,
        success: function(e) {
          //location.reload();
          $("#registro" + usuario).hide();
        }
      });
  }   
}
