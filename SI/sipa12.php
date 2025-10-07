<?php

  class sipa12{
	
	public function see($tib){
		
	$Content = '	
		   
		   
    <div class="pantallasweb">
		   
	<div style="overflow-x:auto; max-width:1200px; width:100%;" class="table-responsive">


	<span class="tituloLeyenda">MODULO</span>

	<div style="float:right;">
	  <a href="?f=sipa12&_g=add" class="btn btn-sm btn-success">+ AGREGAR</a>
	</div>
			
	<br><br>

	 <table id="sipa12_tbl_1" class="bordered table-responsive" width="100%"  border="0" cellspacing="2" cellpading="1" style="border-collapse: separate; border-spacing:1px;">
           <thead>
          <tr>
            <th class="cabeceraTablajq">Modulo</th>
			<th class="cabeceraTablajq">Nombre</th>
			<th class="cabeceraTablajq">Estado</th>
            <th class="cabeceraTablajq">Editar</th>
          </tr>    
          <tr>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="valor" autocomplete="off"></th>
			<th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="valor" autocomplete="off"></th>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>
            <th class="cabeceraTablajq"></th>
		</tr>
        <tbody>
        </tbody>
       </table>
	   </div>


	    </div>
		<script src="js_load/sipa12.js"></script>
		
		
		';
		
		
		 return $Content;
	}


	public function add($tib){
		
		$readonly = "";
		
		if($_GET["ided"] == true){
			
			$selectCount = "select modulo, 
			                       nombre, estado 
								   from modulos_web where modulo = '".$_GET["ided"]."' ";
			$selctCount = $tib->Execute($selectCount);
			
			
			$readonly = "readonly";
		}
		
		
		
	    $Content = '
		 
		  <span class="tituloLeyenda">MODULO</span>
		  
		  <br>
		  
		 <div class="pantallasweb">
		 
		  <div style="float:right;">
		     <a href="?f=sipa12&_g=see" class="btn btn-sm btn-danger"><- REGRESAR</a>
		 </div>
		  
		    <br>
			
			
		 <form id="modulosweb" autocomplete="off">
		  <table>
		     <tr>
	          <td><label>Modulo</label></td>
	         </tr>
			 <tr>
			   <td><input type="text" name="modulo" id="modulo" style="width:80px;" maxlength="2" value="'.$selctCount->fields["modulo"].'" class="form-control" '.$readonly.'></td>
			 </tr>
			 <tr>
	          <td><label>Nombre</label></td>
	         </tr>
			 <tr>
			   <td><input type="text" name="descripcion" id="descripcion" style="width:200px;" maxlength="100" class="form-control" value="'.$selctCount->fields["nombre"].'"></td>
			 </tr>
			 <tr>
	          <td><label>Estado</label></td>
	         </tr>
			 <tr>
			   <td><select name="estado" id="estado" class="chosen">
			       <option value="">Elige una opcion</option>
				   <option value="A">ALTA</option>
				   <option value="B">BAJA</option>
			   </select>
			    <script>
			      $("#estado").val("'.$selctCount->fields["estado"].'");
			   </script>
			   </td>
			 </tr>
	      </table>
		  
		  <br>
		  
		  <input type="submit" name="boton" id="boton" value="Guardar" class="btn btn-sm btn-primary">
		  </form>
		  
	      </div>
         <script src="js_load/sipa12.js"></script>
		 ';
		
		return $Content;
	}

}

?>