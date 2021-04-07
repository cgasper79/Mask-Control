

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


//Función para agregar datos a Modal Edicion
function agregarDatos(datos){

  d=datos.split('||');
  $('#idMask').val(d[0]);
  $('#descripcionU').val(d[1]);
  $('#fechaIniU').val(d[2]);
  $('#lavadosMaxU').val(d[3]);
  $('#lavados').val(d[5]);
}


//Función para controlar los campos numéricos
function controlNumeros(valor,campo){
  
  var valorInput = valor;
  var campoInput = campo;
  
  if (isNaN(valorInput)){
    $(campoInput).val('');
  } else {
    if ((valorInput.length)>3){
      $(campoInput).val('');
    }   
  }
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
    toastr.warning('Alerta', 'Esta mascarillas no tiene más lavados');
  }else if ((ConfirmWash() == true)){

    lavadosLeft = lavadosMax - lavados;
    
    cadena = "id=" + id + 
             "&lavadosMax=" + lavadosMax +
             "&lavados=" + lavados +
             "&lavadosLeft=" + lavadosLeft; 
    $.ajax({
        type:"POST" ,
        url:"./lavado.php",
        data:cadena,
        success: function (r) {
          if (r==1){
            $('#tabla').load('tabla.php');
            toastr.success('OK', 'Lavado incluido correctamente'); 
          }else{
            toastr.error('Mask Control', 'Error al incluir lavado incluido');
          }       
        }
    });
  } else {
    toastr.warning('Alerta', 'Acción cancelada por usuario');
  }  
}

//Toaster Opciones
toastr.options = {
  "closeButton": true
};

$(document).ready(function(){

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

  //control campo Input Lavados Max Nueva
  $('#lavadosMax').on('keyup', function() {
    var valorLavadosMax = $(this).val();
    var campoLavadosMax = '#lavadosMax';
    controlNumeros(valorLavadosMax,campoLavadosMax );
  });

  //control campo Input Lavados Max Edición
  $('#lavadosMaxU').on('keyup', function() {
    var valorLavadosMaxU = $(this).val();
    var campoLavadosMaxU = '#lavadosMaxU';
    controlNumeros(valorLavadosMaxU,campoLavadosMaxU );
  });

  //Control campo Input Lavados Edición
  $('#lavados').on('keyup', function() {
    var valorLavados = $(this).val();
    var campoLavados = '#lavados';
    controlNumeros(valorLavados,campoLavados); 
  });

  //Cierre sesión desde Modal
  $('#cerrarSesion').click(function(){
    window.location.href = './logout.php';
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
    
    if (lavados > lavadosMax){
      toastr.warning('Alerta', 'El número de lavados no puede ser superior al número de lavados máximos soportado por la mascarilla.');
    
    } else 
      if ((descripcion === '') || (fechaIni === '') || (lavadosMax === '') ) {
        toastr.warning('Alerta', 'Rellene todos los campos obligatorios');

    } else 
      if ((ConfirmUpdate() == true)){
        $.ajax({
          type:"POST" ,
          url:"./actualizar.php",
          data:cadena,
          success: function (r) {
            if (r==1){
              $('#tabla').load('tabla.php');
              toastr.success('OK', 'Tu mascarilla se ha actualizado correctamente');
            }else{
              toastr.error('Error', 'Mascarilla ya existe, ponga otra descripción');
              $('#edicion').modal('show');
            }       
          }
        }); 
      } else {
        toastr.warning('Cuidado', 'Acción cancelada por usuario');
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
  
      if ((descripcion === '') || (fechaIni === '') || (lavadosMax === '') ) {
        toastr.warning('Alerta', 'Rellene todos los campos obligatorios');
        $('#nueva').modal('show');
      } else{
        if ((ConfirmAdd() == true)){
          $.ajax({
            type:"POST" ,
            url:"./nuevo.php",
            data:cadena,
            success: function (r) {
              if (r==1){
                toastr.success('OK', 'Tu mascarilla se ha añadido correctamente');
                $('#datosUsuario').load('datosUsuario.php');
                $('#tabla').load('tabla.php');
                
              }else{
                toastr.error('Error', 'Mascarilla ya existe, ponga otra descripción');
                $('#nueva').modal('show');
              }       
            }
          });   
        } else {
          toastr.warning('Alerta', 'Acción cancelada por usuario');
        }
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
            toastr.success('OK', 'Mascarilla eliminada correctamente');
          }else{
            toastr.error('Error', 'No se ha borrado la mascarilla');
          }       
        }
      }); 
    }
    
  }); 
});

