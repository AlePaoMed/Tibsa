<?php

class sipa11{
	
	public function see($tib){
		
		 $Content = '
		 
         <div style="overflow-x:auto; max-width:1200px; width:100%;" class="table-responsive">

		   <div class="pantallasweb">

              <span class="tituloLeyenda">PANTALLA</span>
		   
		   <div style="float:right;">
		      <a href="?f=sipa11&_g=add" class="btn btn-success">+ AGREGAR</a>
		   </div>
		   
		   <br><br>
		   
		   <table id="sipa11_tbl_1" class="bordered table-responsive" width="100%"  border="0" cellspacing="2" cellpading="1" style="border-collapse: separate; border-spacing:1px;">
        <thead>
          <tr>
            <th class="cabeceraTablajq">Pantalla</th>
			<th class="cabeceraTablajq">Nombre</th>
			<th class="cabeceraTablajq">Url</th>
            <th class="cabeceraTablajq">Modelo</th>
			<th class="cabeceraTablajq">Estado</th>
			<th class="cabeceraTablajq">Tipo Movimiento</th>
			<th class="cabeceraTablajq">Editar</th>
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
        <tbody>
        </tbody>
       </table>
		
		</div>
    </div>
		   
 <script src="js_load/sipa11.js"></script>
		 
		 ';
		
		
		 return $Content;
	}
	
	
	public function add($tib){
	
	    $readonly = "";
	
		if($_GET["ided"] == true){
		
			
			$ConsLow = "select pantalla, 
			                   nombre, 
							   url_desc, 
							   estado, 
							   modulo, 
							   tipo_movimiento 
			                   from pantallas where pantalla = '".$_GET["ided"]."' ";
			$Cndvn = $tib->Execute($ConsLow);
			
			$readonly = "readonly";
			
		}
		
		
	    $Content = '
	
		
        <div style="overflow-x:auto; max-width:1200px; width:100%;" class="table-responsive">

		  <div class="pantallasweb">

            <span class="tituloLeyenda">PANTALLAS</span>
		  
		   <div style="float:right;">
		     <a href="?f=sipa11&_g=see" class="btn btn-sm btn-danger"><- REGRESAR</a>
		    </div>
		  
		    <br>
		  
		  <form id="pantallitasweb" autocomplete="off">
		  <table>
		    <tr>
		     <td><label>Pantalla:</label></td>
			 </tr>
			 <tr>
			 <td><input type="text" name="pantalla" id="pantalla" class="form-control" style="width:200px;" value="'.$Cndvn->fields["pantalla"].'" '.$readonly.'></td>
		    </tr>
			<tr>
		     <td><label>Nombre:</label></td>
			</tr>
		    <tr>
			 <td><input type="text" name="nombre" id="nombre" value="'.$Cndvn->fields["nombre"].'" class="form-control" style="width:350px;"></td>
		    </tr>
			<tr>
		     <td><label>URL:</label></td>
			</tr>
			<tr>
			 <td><input type="text" name="url_desc" id="url_desc" value="'.$Cndvn->fields["url_desc"].'" class="form-control" style="width:350px;"></td>
		    </tr>
			<tr>
		     <td><label>Modulo:</label></td>
			</tr>
			<tr>
			  <td><select name="moduloweb" id="moduloweb" class="selectchs">
			      <option value="">Elige una opcion</option>';
			
				  $ConsWeb = "select modulo, nombre from modulos_web where estado = 'A' ";
				  $ConsWb = $tib->Execute($ConsWeb);
				  foreach($ConsWb as $cbn => $mdlweb){
					  $Content .= '<option value="'.$mdlweb["modulo"].'">'.$mdlweb["nombre"].'</option>';
					  
				  }
		
			  $Content .= '</select>
			  <script>
			    $("#moduloweb").val("'.$Cndvn->fields["modulo"].'");
			  </script>
			  </td>
			</tr>
			<tr>
		     <td><label>Tipo de Movimiento:</label></td>
			</tr>
			<tr>
			  <td><select name="tipomov" id="tipomov" class="selectchs">
			      <option value="">Elige una opcion</option>';
				  
				  $ConsultaMovs = "select tipo_movimiento, descripcion from movimientos where estado = 'A' ";
				  $ConstMovs = $tib->Execute($ConsultaMovs);
				  foreach($ConstMovs as $cvnm => $cfrt){
					  
					  $Content .= '<option value="'.$cfrt["tipo_movimiento"].'">'.$cfrt["descripcion"].'</option>';
					  
				  }
		
			  $Content .= '</select>
			  <script>
			    $("#tipomov").val("'.$Cndvn->fields["tipo_movimiento"].'");
			  </script>
			  </td>
			</tr>
			<tr>
		     <td><label>Estado:</label></td>
			</tr>
			<tr>
			  <td><select name="estadod" id="estadod" class="selectchs">
				  <option value="A">ALTA</option>
			      <option value="B">BAJA</option>
			  </select>
			   <script>
			    $("#estadod").val("'.$Cndvn->fields["estado"].'");
			  </script>
			  
			  </td>
			</tr>
		  </table>

          <br>
 

		  <input type="submit" name="boton" id="boton" class="btn btn-sm btn-primary" value="Guardar">
		  </form>
		  
		  
		  </div>
          </div>
		   
		 <script src="js_load/sipa11.js"></script> 

		 ';
		
		return $Content;
	}
}

