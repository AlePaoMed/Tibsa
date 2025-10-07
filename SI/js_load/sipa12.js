 
  var oTable = $("#sipa12_tbl_1").dataTable({
		  "bJQueryUI": false,
		  "bLengthChange": false, 
		  "bProcessing": true,
		  "iDisplayLength": 20,
		  "bServerSide": true,
		  "bDestroy": true,
		  "bFilter":true,
		  "sPaginationType": "full_numbers",
		  "sAjaxSource": "sipa12_tbl_1.php",
		  "fnServerParams": 
		function ( aoData ) {
		  aoData.push( { "name": "var", "value": "" });
		},
		  "aoColumns" : [
		  {sWidth: "10%"},
		 {sWidth: "10%"},
		{sWidth: "10%"}, 
		{sWidth: "10%"}
		  ],
		  "oLanguage": {
		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Busqueda:",
		"sUrl":            "",
		"sInfoThousands":  ",",
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

	  $(".thinputrhpa199tbl_1").change( function () {
		/* Filter on the column (the index) of this element */
		oTable.fnFilter( this.value, $(".thinputrhpa199tbl_1").index(this) );
	  });
	   
	 $("#sipa12_tbl_1_filter").hide();




    $(".chosen").chosen({width: "300px"});
			
	$("#modulosweb").on("submit", function(e){
				
				e.preventDefault();
				
						 var dataString = $(this).serialize()+"&action=enviomodulosweb";
				 
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
		    url: "sipa12_ajax.php",
			data: dataString,
			dataType: "json",
			success: function(data) {
				
				  $.unblockUI();
		          if(data.ID == 1){
					  
					  alert("MSJ: SE HA ACTUALIZADO CORRECTAMENTE");
					  location.href= "?f=sipa12&_g=see";
					  
				  }
				 
			}
	        });
				
				
	});