function alert(id, msj){

  if(id == 0){
   $.confirm({
    title: 'ERROR!',
    content: msj,
    type: 'red',       // colores: red, green, blue, orange
    typeAnimated: true,
    buttons: {
        ok: {
            text: 'Aceptar',
            btnClass: 'btn-red',
            action: function(){}
        }
    }
   });

  }else{

   $.confirm({
    title: 'SUCCESS!',
    content: msj,
    type: 'green',       // colores: red, green, blue, orange
    typeAnimated: true,
    buttons: {
        ok: {
            text: 'Aceptar',
            btnClass: 'btn-success',
            action: function(){}
        }
    }
   });

  }


 }