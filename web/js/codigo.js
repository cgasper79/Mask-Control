
//Máscaras

//para fecha en formato dd-mm-YYYY
var patron = new Array(2,2,4)

function mascara(d,sep,pat,nums){
  if(d.valant != d.value){
    val = d.value
    largo = val.length
    val = val.split(sep)
    val2 = ''
    for(r=0;r<val.length;r++){
      val2 += val[r]	
    }
    if(nums){
      for(z=0;z<val2.length;z++){
        if(isNaN(val2.charAt(z))){
          letra = new RegExp(val2.charAt(z),"g")
          val2 = val2.replace(letra,"")
        }
      }
    }
    val = ''
    val3 = new Array()
    for(s=0; s<pat.length; s++){
      val3[s] = val2.substring(0,pat[s])
      val2 = val2.substr(pat[s])
    }
    for(q=0;q<val3.length; q++){
      if(q ==0){
        val = val3[q]
      }
      else{
        if(val3[q] != ""){
          val += sep + val3[q]
          }
      }
    }
    d.value = val
    d.valant = val
    }
  }

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

//JQuery


