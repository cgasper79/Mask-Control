

//Ventanas de confirmación
function ConfirmDelete()
{
     var x = confirm("¿Quieres borrar esta mascarilla?");
     if (x)
         return true;
     else
       return false;
}

function ConfirmWash()
{
     var x = confirm("¿Quieres incluir un lavado en esta mascarilla?");
     if (x)
         return true;
     else
       return false;
}

function ConfirmUpdate()
{
     var x = confirm("¿Quieres actualizar los datos en esta mascarilla?");
     if (x)
         return true;
     else
       return false;
}


function ConfirmAdd()
{
     var x = confirm("¿Quieres añadir esta nueva mascarilla?");
     if (x)
         return true;
     else
       return false;
}


function ConfirmExit()
{
     var x = confirm("¿Quieres cerrar la sesión?");
     if (x)
         return true;
     else
       return false;
}

function info(){

  toastr.options = {
    "closeButton": true
  };

  toastr.info('','Recuerda que se debe controlar el número de lavado de todas tus mascarillas para que éstas sean efectivas.');
  
}

//Función para agregar datos a Modal Edicion
function agregarDatos(datos){

  d=datos.split('||');
  $('#idMask').val(d[0]);
  $('#descripcionU').val(d[1]);
  $('#fechaIniU').val(d[2]);
  $('#lavadosMaxU').val(d[3]);
  $('#lavados').val(d[5]);
}


//Función para descontar lavados
function actualizaLavado(datos){
  
  d=datos.split('||');
  id=d[0];
  lavadosMax = d[3];
  lavadosMax = parseInt(lavadosMax,10);
  lavados = d[5];
  lavados = parseInt(lavados,10) + 1;
  lavadosLeft = d[6];
  lavadosLeft = parseInt(lavadosLeft,10);
  
  
  if ((lavadosLeft <= 0)){
    toastr.warning('Mask Control', 'Esta mascarillas no tiene más lavados');
  }else if ((ConfirmWash() == true)){

    lavadosLeft = lavadosMax - lavados;
    
    cadena = "id=" + id + 
             "&lavadosMax=" + lavadosMax +
             "&lavados=" + lavados +
             "&lavadosLeft=" + lavadosLeft; 
             
    console.log(cadena);
    $.ajax({
        type:"POST" ,
        url:"./lavado.php",
        data:cadena,
        success: function (r) {
          if (r==1){
            $('#tabla').load('tabla.php');
            toastr.success('Mask Control', 'Lavado incluido correctamente');
            
          }else{
            toastr.error('Mask Control', 'Error al incluir lavado incluido');
          }       
        }
    });
  } else {
    toastr.warning('Mask Control', 'Acción cancelada por usuario');
  }  
}


// DataPicker
  $('.datepicker').datepicker({
      autoclose: true,
      weekStart: 1,
      todayHighlight: true,
      language: 'es',
      format: "dd-mm-yyyy"
  });


$(document).ready(function(){

  info();

  // DataPicker
  $('.datepicker').datepicker({
    autoclose: true,
    weekStart: 1,
    todayHighlight: true,
    language: 'es',
    format: "dd-mm-yyyy"
  });

  //cargamos datos usuarios
  $('#datosUsuario').load('datosUsuario.php');

  //cargamos tabla con valores actualizados
  $('#tabla').load('tabla.php');

  //Buscar Valor en la tabla
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });  

  //Actualizar datos Edición desde Modal
  $('#actualizaDatos').click(function(){
    id=$('#idMask').val();
    descripcion=$('#descripcionU').val();
    fechaIni=$('#fechaIniU').val();
    lavadosMax=$('#lavadosMaxU').val();
    lavados=$('#lavados').val();

    cadena="id=" + id +
           "&descripcion=" + descripcion +
           "&fechaIni=" + fechaIni +
           "&lavadosMax=" + lavadosMax +
           "&lavados=" + lavados;
    
    if ((ConfirmUpdate() == true)){
      $.ajax({
        type:"POST" ,
        url:"./actualizar.php",
        data:cadena,
        success: function (r) {
          if (r==1){
            $('#tabla').load('tabla.php');
            toastr.success('Mask Control', 'Tu mascarilla se ha actualizado correctamente');
          }else{
            toastr.error('Mask Control', 'Error al actualizar tu mascarilla');
          }       
        }
      }); 
    } else {
      toastr.warning('Mask Control', 'Acción cancelada por usuario');
    }  
  });    

  //Nueva mascarillas desde Modal
  $('#guardarNueva').click(function(){
      descripcion=$('#descripcion').val();
      fechaIni=$('#fechaIni').val();
      lavadosMax=$('#lavadosMax').val();

      cadena="descripcion=" + descripcion +
           "&fechaIni=" + fechaIni +
           "&lavadosMax=" + lavadosMax ;
      
      if ((ConfirmAdd() == true)){
        $.ajax({
          type:"POST" ,
          url:"./nuevo.php",
          data:cadena,
          success: function (r) {
            if (r==1){
              toastr.success('Mask Control', 'Tu mascarilla se ha añadido correctamente');
              $('#datosUsuario').load('datosUsuario.php');
              $('#tabla').load('tabla.php');
              
            }else{
              toastr.error('Mask Control', 'Error al añadir mascarilla');
            }       
          }
        });   
      } else {
        toastr.warning('Mask Control', 'Acción cancelada por usuario');
      }  
    });

  //Borrar datos Edición desde Modal
  $('#borrarDatos').click(function(){
    id=$('#idMask').val();
    descripcion=$('#descripcionU').val();

    cadena="id=" + id;

    if ((ConfirmDelete() == true)){
      $.ajax({
        type:"POST" ,
        url:"./eliminar.php",
        data:cadena,
        success: function (r) {
          if (r==1){
            $('#datosUsuario').load('datosUsuario.php');
            $('#tabla').load('tabla.php');
            toastr.success('Mask Control', 'Mascarilla eliminada correctamente');
          }else{
            toastr.error('Mask Control', 'Error al borrar mascarilla');
          }       
        }
      }); 
    }
    
  }); 
});

