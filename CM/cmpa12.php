    <?php

class cmpa12{
	
	public function see($tib){


         $Content = '
		 
         <div style="max-width:1200px; width:100%;" class="table-responsive">

		   <div class="pantallasweb">

              <span class="tituloLeyenda">COTIZACIONES</span>
		   
		   <div style="float:right;">
		      <a href="?f=cmpa12&_g=add" class="btn btn-success">+ AGREGAR</a>
		   </div>
		   
		   <br><br>


                  <table id="sipa11_tbl_1" class="bordered table-responsive" width="100%"  border="0" cellspacing="2" cellpading="1" style="border-collapse: separate; border-spacing:1px;">
        <thead>
          <tr>
            <th class="cabeceraTablajq">Id Cotizacion</th>
			<th class="cabeceraTablajq">Nombre Razon Social</th>
			<th class="cabeceraTablajq">Fecha</th>
            <th class="cabeceraTablajq">Facturacion</th>
            <th class="cabeceraTablajq">Serie</th>
            <th class="cabeceraTablajq">Folio</th>
			<th class="cabeceraTablajq">Estado</th>
			<th class="cabeceraTablajq">Usuario</th>
          </tr>    
          <tr>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="valor" autocomplete="off"></th>
			<th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="valor" autocomplete="off"></th>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>			
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>			
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>
		</tr>
        <tbody>
        </tbody>
       </table>


       
             </div>
        </div>

           ';



           return $Content;


    }


    public function add($tib){

        $Content = '
		 
         <div style="max-width:1200px; width:100%;" class="table-responsive">

		   <div class="pantallasweb">

              <span class="tituloLeyenda">COTIZACIONES</span>
              <br>
              <span class="tituloLeyenda cotzsnombre"></span>

             <div style="float:right;">
		       <a href="?f=cmpa12&_g=see" class="btn btn-sm btn-danger"><- REGRESAR</a>
		     </div>
             <br><br>

             <div class="row g-5 align-items-end">
                <div class="col-auto">
                    <label for="id_cliente" class="form-label">Id Cliente</label>
                    <input type="text" class="form-control obligatorio" id="id_cliente" name="id_cliente" style="max-width:200px;" readonly>
                </div>

                <div class="col-auto">
                    <label for="serie" class="form-label">Serie</label>
                    <input type="text" class="form-control obligatorio" id="serie" name="serie" style="max-width:200px;" maxlength="3">
                </div>

                <div class="col-auto">
                    <label for="folio" class="form-label">Folio</label>
                    <input type="text" class="form-control obligatorio" id="folio" name="folio" style="max-width:200px;" maxlength="5">
                </div>

                <div class="col-auto">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="text" class="form-control obligatorio" id="fecha" name="fecha" style="max-width:200px;">
                </div>
                </div>

<br>

<div class="table-responsive">
  <table class="tabla-productos">
    <thead>
      <tr>
        <th>SKU * <button class="btn-sku">+ A</button></th>
        <th>UNIDAD * <button class="btn-unidad">+ A</button></th>
        <th>DESCRIPCIÓN *</th>
        <th>CANTIDAD *</th>
        <th>PRECIO UNIT *</th>
        <th>PRECIO TOTAL</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type="text" name="sku_producto" id="sku_producto" class="form-control obligatorio"></td>
        <td><input type="text" name="unidad" id="unidad" class="form-control obligatorio"></td>
        <td><textarea name="descripcion" id="descripcion" class="form-control obligatorio"></textarea></td>
        <td><input type="text" name="cantidad" id="cantidad" class="form-control obligatorio"></td>
        <td><input type="text" name="unitario" id="unitario" class="form-control obligatorio"></td>
        <td><input type="text" name="total" id="total" class="form-control" readonly></td>
        <td><input type="submit" name="Guardar" id="Guardar" class="btn btn-sm btn-success" value="Guardar"></td>
      </tr>
    </tbody>
  </table>
</div>
                

             </div>
        </div>


<div id="dialog-recuperar" title="Recuperar Contraseña">
   
       <table id="sipa11_tbl_2" class="bordered table-responsive" width="800px"  border="0" cellspacing="2" cellpading="1" style="border-collapse: separate; border-spacing:1px;">
        <thead>
          <tr>
            <th class="cabeceraTablajq">Id Cliente</th>
			<th class="cabeceraTablajq">Nombre Razon Social</th>
			<th class="cabeceraTablajq">Rfc</th>
            <th class="cabeceraTablajq">Correo</th>
          </tr>    
          <tr>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_2" style="width:90%" type="text" value="" name="valor" autocomplete="off"></th>
			<th class="cabeceraTablajq"><input class="thinputrhpa199tbl_2" style="width:90%" type="text" value="" name="valor" autocomplete="off"></th>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_2" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>
            <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_2" style="width:90%" type="text" value="" name="riesgo" autocomplete="off"></th>
		</tr>
        <tbody class="tb_clientes">
        </tbody>
       </table>
 
</div>


<style>

  .tabla-container {
  width: 100%;
  min-width: 700px; /* previene que se encoja demasiado */
  overflow-x: auto;
}


  .tabla-productos {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 10px;
    border-radius: 6px;
    overflow: hidden;
  }

  .tabla-productos td {
  background-color: #fff;            /* fondo blanco limpio */
  border-bottom: 1px solid #f0d8dd;  /* línea vino clara entre filas */
  padding: 6px;
  vertical-align: middle;
}

  /* Encabezados */
  .tabla-productos th {
    background-color: #7b1f3a; /* rojo vino fuerte */
    color: #fff; /* texto blanco */
    text-align: center;
    padding: 8px;
    font-weight: 600;
    font-size: 13px;
    border-bottom: 3px solid #a0304b; /* tono vino más claro */
  }

  /* Filas de contenido */
  .tabla-productos td {
    background-color: #faf5f6; /* gris rosado claro */
    padding: 6px;
    vertical-align: middle;
  }

  /* Inputs y textarea */
  .tabla-productos input,
  .tabla-productos textarea {
    width: 100%;
    border: 1px solid #c66b84; /* borde vino claro */
    border-radius: 4px;
    padding: 4px 6px;
  }

  .tabla-productos input:focus,
  .tabla-productos textarea:focus {
    outline: none;
    border-color: #7b1f3a;
    box-shadow: 0 0 4px #a0304b;
  }

  /* Botones +A */
  .btn-sku, .btn-unidad {
    background-color: #a0304b;
    color: #fff;
    font-size: 11px;
    padding: 2px 6px;
    border-radius: 4px;
    border: none;
  }

  .btn-sku:hover, .btn-unidad:hover {
    background-color: #7b1f3a;
  }

  /* Botón Guardar */
  .btn-success {
    background-color: #7b1f3a !important;
    border-color: #7b1f3a !important;
  }

  .btn-success:hover {
    background-color: #a0304b !important;
  }
</style>

<script src="js_load/cmpa12.js?v.09324'.date("Ymdhis").'"></script> 
        ';


         return $Content;
    }

}