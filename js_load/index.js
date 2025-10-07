 
  $("#recuperar").click(function(e){
    e.preventDefault();
    $("#dialog-recuperar").dialog({
      modal: true,
      width: 'auto',
      buttons: {
        "Enviar": function() {
          alert("Instrucciones enviadas al correo.");
          $(this).dialog("close");
        },
        "Cancelar": function() {
          $(this).dialog("close");
        }
      }
    });
  });

$("#loginsubmit").on("submit", function(e){

    e.preventDefault();

    var dataString = $(this).serialize() + "&action=ActivarLogueo";

     $.blockUI({
            message: `
                <div style="text-align:center;">
                    <p class="progress-text">TIB</p> Espere por Favor...
                </div>
            `,
            css: {
                border: 'solid 1px #000', 
                padding: "5px", 
                backgroundColor: "#fff", 
                "-webkit-border-radius": "10px", 
                "-moz-border-radius": "10px", 
                opacity: 0.9, 
                color: "#000"
            }
     });
     $.ajax({
			type: "POST",
		    url: "pathcode/adminErp11.php",
			data: dataString,
			dataType: "json",
			success: function(data) {
				
				$.unblockUI();

                if(data.codigo == 1){
                 
                    alert(data.codigo, data.mensaje);
                    location.href = data.url_web;  

                }else{

                    alert(data.codigo, data.mensaje);
                }
		
			}
	});

});
