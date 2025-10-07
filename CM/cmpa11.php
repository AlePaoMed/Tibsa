  <?php

class cmpa11{
	
	public function see($tib){
		
		 $Content = '
		 
         <div style="overflow-x:auto; max-width:1200px; width:100%;" class="table-responsive">

		   <div class="pantallasweb">

              <span class="tituloLeyenda">CLIENTES</span>
		   
		   <div style="float:right;">
		      <a href="?f=cmpa11&_g=add" class="btn btn-success">+ AGREGAR</a>
		   </div>
		   
		   <br><br>


       <table id="sipa11_tbl_1" class="bordered table-responsive" width="100%"  border="0" cellspacing="2" cellpading="1" style="border-collapse: separate; border-spacing:1px;">
        <thead>
          <tr>
            <th class="cabeceraTablajq">Id Cliente</th>
			<th class="cabeceraTablajq">Nombre Razon Social</th>
			<th class="cabeceraTablajq">Rfc</th>
            <th class="cabeceraTablajq">Regimen Fiscal</th>
			<th class="cabeceraTablajq">Codigo Postal</th>
			<th class="cabeceraTablajq">Telefono</th>
      <th class="cabeceraTablajq">Correo</th>
      <th class="cabeceraTablajq">Limite de Credito</th>
      <th class="cabeceraTablajq">Estado</th>
          </tr>    
          <tr>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="valor" autocomplete="off"></th>
			<th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="valor" autocomplete="off"></th>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>			
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>
		        <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>
            <th class="cabeceraTablajq"></th>
            <th class="cabeceraTablajq"></th>
		</tr>
        <tbody>
        </tbody>
       </table>

      
		   
		 </div>
         </div>

       <script src="js_load/cmpa11.js?v.09324'.date("Ymdhis").'"></script>
		 ';
		
		
		 return $Content;
	}

    public function add($tib){

        $insert = "SELECT id_cliente, 
                            nombre_razon, 
                            rfc_social, 
                            regimen_fiscal, 
                            codigo_postal, 
                            telefono, 
                            correo, 
                            limite_credito, 
                            estado
                     FROM CM_CLIENTES where id_cliente = ? ";
         $Const = $tib->Prepare($insert);
         $Ver = $tib->GetRow($Const, [$_GET["ided"]]);

        $Content = '

        <div style="max-width:1200px; width:100%;" >

		   <div class="pantallasweb">

           <span class="tituloLeyenda">CLIENTES</span>

          <div style="float:right;">
		     <a href="?f=cmpa11&_g=see" class="btn btn-sm btn-danger"><- REGRESAR</a>
		  </div>
		  
  
           <div class="card-body">
  <form id="clienteForm" autocomplete="off">
    <div class="row g-3">
          
          <!-- Nombre -->
      <div class="col-12">
        <label for="nombre" class="form-label">MATRICULA</label>
        <input type="text" class="form-control" id="id_cliente" name="id_cliente" value="'. $Ver["id_cliente"].'" readonly>
      </div>

      <!-- Nombre -->
      <div class="col-12">
        <label for="nombre" class="form-label">Nombre Razon Socail</label>
        <input type="text" class="form-control obligatorio" id="nombre" name="nombre" value="'. $Ver["nombre_razon"].'" maxlength="500">
      </div>

      <!-- RFC -->
      <div class="col-12">
        <label for="rfc" class="form-label">RFC</label>
        <input type="text" class="form-control obligatorio" id="rfc" name="rfc" value="'. $Ver["rfc_social"].'"  maxlength="13">
      </div>

      <!-- RFC -->
      <div class="col-12">
        <label for="rfc" class="form-label">Regimen Fiscal</label>
        <select name="regimenfiscal" id="regimenfiscal" class="obligatorio">
				<option value="">Elige una opcion</option>
				<option value="601">601 - General de Ley Personas Morales</option>
				<option value="603">603 - Personas Morales con Fines no Lucrativos</option>
				<option value="605">605 - Sueldos y Salarios e Ingresos Asimilados a Salarios</option>
				<option value="606">606 - Arrendamiento</option>
				<option value="607">607 - Régimen de Enajenación o Adquisición de Bienes</option>
				<option value="608">608 - Demás ingresos</option>
				<option value="610">610 - Residentes en el Extranjero sin Establecimiento Permanente en México</option>
				<option value="611">611 - Ingresos por Dividendos (socios y accionistas)</option>
				<option value="612">612 - Personas Físicas con Actividades Empresariales y Profesionales</option>
				<option value="614">614 - Ingresos por intereses</option>
				<option value="615">615 - Régimen de los ingresos por obtención de premios</option>
				<option value="616">616 - Sin obligaciones fiscales</option>
				<option value="620">620 - Sociedades Cooperativas de Producción que optan por diferir sus ingresos</option>
				<option value="621">621 - Incorporación Fiscal</option>
				<option value="622">622 - Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras</option>
				<option value="623">623 - Opcional para Grupos de Sociedades</option>
				<option value="624">624 - Coordinados</option>
				<option value="625">625 - Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas</option>
				<option value="626">626 - Régimen Simplificado de Confianza</option>
		   </select>
       <script>
         $("#regimenfiscal").val('. $Ver["regimen_fiscal"].');
       </script>
      </div>

     <!-- CP -->
      <div class="col-12">
        <label for="codigo" class="form-label">Codigo Postal</label>
        <input type="tel" class="form-control obligatorio numeros" id="codigopostal" name="codigopostal" maxlength="6" value="'. $Ver["codigo_postal"].'">
      </div>

      <!-- Teléfono -->
      <div class="col-12">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="tel" class="form-control obligatorio numeros" id="telefono" name="telefono" maxlength="10" value="'. $Ver["telefono"].'">
      </div>

      <!-- Email -->
      <div class="col-12">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="text" class="form-control obligatorio" id="email" name="email" value="'. $Ver["correo"].'" maxlength="120">
      </div>

       <!-- Email -->
      <div class="col-12">
        <label for="email" class="form-label">Limite de Credito</label>
        <input type="text" class="form-control obligatorio" id="credito" name="credito" value="'. $Ver["limite_credito"].'" maxlength="120">
      </div>

      <!-- RFC -->
      <div class="col-12">
        <label for="rfc" class="form-label">Estado</label>
        <select name="estado" id="estado" class="obligatorio">
				<option value="">Elige una opcion</option>
				<option value="A">ALTA</option>
				<option value="B">BAJA</option>
		   </select>
       <script>
         $("#estado").val("'. $Ver["estado"].'");
       </script>
      </div>

      <!-- Botón -->
      <div class="col-12 text-center">
        <button type="submit" class="btn btn-sm btn-primary" style="width:100%;">GUARDAR REGISTRO</button>
      </div>
    </div>
  </form>
</div>


         </div>
         </div>



 <script src="js_load/cmpa11.js?v.09324'.date("Ymdhis").'"></script>
		';

        return $Content;
    }
}