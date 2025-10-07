<?php

class sipa15{
	
	public function see($tib){
		
		 $Content = ' <span class="tituloLeyenda">PERMISOS</span>
		   
         <div class="pantallasweb">

           <table id="sipa13_tbl_1" class="bordered" width="100%"  border="0" cellspacing="2" cellpading="1" style="border-collapse: separate; border-spacing:1px;">
         <thead>
        <tr>
          <th class="cabeceraTablajq">Perfil</th>
          <th class="cabeceraTablajq">Nombre</th>
          <th class="cabeceraTablajq">Estado</th>
          <th class="cabeceraTablajq">Usuario Administrador</th>
          <th class="cabeceraTablajq">Asignar Permisos</th>
        </tr>    
        <tr>
          <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="valor" autocomplete="off"></th>
          <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="valor" autocomplete="off"></th>
          <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>
          <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>
          <th class="cabeceraTablajq"></th>
        </tr>
        <tbody>
        </tbody>
        </table>


        </div>
		
		
		  <script>
		   
	
        var oTable = $("#sipa13_tbl_1").dataTable({
         "bJQueryUI": false,
         "bLengthChange": false, 
         "bProcessing": true,
         "iDisplayLength": 20,
         "bServerSide": true,
         "bDestroy": true,
         "bFilter":true,
         "sPaginationType": "full_numbers",
         "sAjaxSource": "sipa15_tbl_1.php",
         "fnServerParams": 
       function ( aoData ) {
         aoData.push( { "name": "var", "value": "" });
       },
         "aoColumns" : [
         {sWidth: "10%"},
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
      
	  
	   $("#sipa13_tbl_1_filter").hide();
      
      </script>

         ';
		 
		 
		 return $Content;
		 
	}
	
	
	public function asignarPermisos($tib){
		
		
		$Consulita = "SELECT perfil, perfil||' '||nombre as perfiles from perfiles where perfil = '".$_GET["ided"]."' ";
		$ConsUna = $tib->Execute($Consulita);
		
		$Content = ' <span class="tituloLeyenda">PERMISOS -- '.$ConsUna->fields["perfiles"].'</span>
		   
          <div class="pantallasweb">
		  
		     <table id="sipa15_tbl_1" class="bordered" width="100%"  border="0" cellspacing="2" cellpading="1" style="border-collapse: separate; border-spacing:1px;">
        <thead>
          <tr>
            <th class="cabeceraTablajq">Pantalla</th>
			<th class="cabeceraTablajq">Nombre</th>
			<th class="cabeceraTablajq">Url</th>
            <th class="cabeceraTablajq">Modelo</th>
			<th class="cabeceraTablajq">Estado</th>
			<th class="cabeceraTablajq">Tipo Movimiento</th>
			<th class="cabeceraTablajq">Nivel</th>
          </tr>    
          <tr>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="valor" autocomplete="off"></th>
			<th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="valor" autocomplete="off"></th>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>			
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>
		   <th class="cabeceraTablajq"></th>
		</tr>
        <tbody class="bodisito">
        </tbody>
       </table>
		 
		 
		  </div>
		  <script>
		  
		 var oTable = $("#sipa15_tbl_1").dataTable({
		  "bJQueryUI": false,
		  "bLengthChange": false, 
		  "bProcessing": true,
		  "iDisplayLength": 20,
		  "bServerSide": true,
		  "bDestroy": true,
		  "bFilter":true,
		  "sPaginationType": "full_numbers",
		  "sAjaxSource": "sipa15_tbl_2.php",
		  "fnServerParams": 
		function ( aoData ) {
		  aoData.push( { "name": "idnum", "value": "'.$_GET["ided"].'" });
		},
		  "aoColumns" : [
		  {sWidth: "10%"},
		 {sWidth: "10%"},
		{sWidth: "10%"}, 
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
	   
	   
	    $("#sipa15_tbl_1_filter").hide();
		
		
		  $(".bodisito").on("change", ".changefunction", function(e){
			 
             var dataString = "perfil="+$(this).attr("perfil")+"&permiso="+$(this).val()+"&action=PermisosWeb&pantalla="+$(this).attr("pantalla")+"&modulo="+$(this).attr("modulo");

             $.blockUI({ message: "Espere Por Favor", css: {
		    border: "none", 
			padding: "15px", 
		    backgroundColor: "#000", 
		    "-webkit-border-radius": "10px", 
		    "-moz-border-radius": "10px", 
		    opacity: .5, 
		    color: "#fff" 
	         }});
	        $.ajax({
			type: "POST",
		    url: "sipa15_ajax.php",
			data: dataString,
			dataType: "json",
			success: function(data) {
				
				  $.unblockUI();
		          if(data.ID == 1){
					  
					  alert("MSJ: SE HA ACTUALIZADO CORRECTAMENTE");
				
					  
				  }
				 
			}
	        });
			  
		  });
		  
		  </script>
		 ';
		
		return $Content;
	}
	
}
	
	