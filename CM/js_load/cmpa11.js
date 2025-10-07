var oTable = $("#sipa11_tbl_1").dataTable({
    "responsive": true,
    "bJQueryUI": false,
    "bLengthChange": false,
    "bProcessing": true,
    "iDisplayLength": 20,
    "bServerSide": true,
    "bDestroy": true,
    "bFilter": true,
    "bSort": false,  // <-- DESHABILITA EL ORDENAMIENTO
    "sPaginationType": "full_numbers",
    "sAjaxSource": "cmpa11_tbl_1.php",
    "fnServerParams": function (aoData) {
        aoData.push({ "name": "var", "value": "" });
    },
"aoColumns": [
    null,
    null,
    null,
    null,
    null,
    null,
    null,
    null,
    null
],
    "oLanguage": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sSearch":         "Busqueda:",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});

// Ocultar filtros individuales
$(".thinputrhpa199tbl_1").change(function () {
    oTable.fnFilter(this.value, $(".thinputrhpa199tbl_1").index(this));
});

$("#sipa11_tbl_1_filter").hide();












$("select").chosen({width: "100%"});

$('.numeros').on('keypress', function(e) {
    // Permitir solo números (0-9)
    var key = e.which || e.keyCode;
    if (key < 48 || key > 57) {
        e.preventDefault(); // Bloquea cualquier tecla que no sea número
    }
});


$("#clienteForm").on("submit", function(e) {
  e.preventDefault(); // Evita el envío del formulario mientras validamos

  let valido = true;

  // Recorre todos los campos obligatorios
  $(this).find(".obligatorio").each(function() {
    const valor = $.trim($(this).val());

    if (valor === "") {
      $(this).addClass("is-invalid"); // Marca el campo en rojo (Bootstrap)
      valido = false;
    } else {
      $(this).removeClass("is-invalid");
    }
  });

  if (!valido) {
  
    alert(0, "Por favor llena todos los campos obligatorios.");
    return false;

  }else{
    
     var dataString = $(this).serialize()+"&action=abcClientes";

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
		    url: "cmpa11_ajax.php",
			data: dataString,
			dataType: "json",
			success: function(data) {
				
				  $.unblockUI();
		      if(data.ID == 1){

            alert(data.ID, data.MSJ);
            location.href="?f=cmpa11&_g=see";

          }else{

            alert(data.ID, data.MSJ);
           

          }
				 
			}
	    });

    
    
  }

});