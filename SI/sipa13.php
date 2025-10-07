<?php

class sipa13{
	
   public function see($tib){
		
		 $Content = ' 
         
         <div style="overflow-x:auto; max-width:1200px; width:100%;" class="table-responsive">

         <div class="pantallasweb">
         
         <span class="tituloLeyenda">PERFIL</span>

         <div style="float:right;">
           <a href="?f=sipa13&_g=add" class="btn btn-sm btn-success">+ AGREGAR</a>
         </div>
        
        <br><br>

         <table id="sipa13_tbl_1" class="bordered" width="100%"  border="0" cellspacing="2" cellpading="1" style="border-collapse: separate; border-spacing:1px;">
         <thead>
        <tr>
          <th class="cabeceraTablajq">Perfil</th>
          <th class="cabeceraTablajq">Nombre</th>
          <th class="cabeceraTablajq">Estado</th>
          <th class="cabeceraTablajq">Usuario Administrador</th>
          <th class="cabeceraTablajq">Editar</th>
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
</div>

 <script src="js_load/sipa13.js"></script>';


         return $Content;
    }


    public function add($tib){


     $readonly = "";
     if($_GET["ided"] == true){

        $Consulta = "select perfil, 
                           nombre, 
                           estado, 
                           usuario_admin 
                           from perfiles where perfil =  '".$_GET["ided"]."'  ";
        $Cont = $tib->Execute($Consulta );

        $readonly = "readonly";
     }
 

     $Content = ' 

       <div style="overflow-x:auto; max-width:1200px; width:100%;" class="table-responsive">
		   
        <div class="pantallasweb">

        <span class="tituloLeyenda">PERFIL</span>

        <div style="float:right;">
           <a href="?f=sipa13&_g=see" class="btn btn-sm btn-danger"><- REGRESAR</a>
        </div>
     
       <br>


        <form id="envioForm" autocomplete="off">
         <table>
           <tr>
             <td><label>Perfil</label></td>
           </tr>
           <tr>
             <td><input type="text" name="perfil" id="perfil" style="width:80px;" value="'.$Cont->fields["perfil"].'" class="form-control" maxlength="3" '.$readonly.'></td>
           </tr>
           <tr>
             <td><label>Nombre</label></td>
           </tr>
           <tr>
             <td><input type="text" name="mombre" id="mombre" style="width:300px;" value="'.$Cont->fields["nombre"].'" class="form-control" maxlength="100"></td>
           </tr>
           <tr>
             <td><label>Estado</label></td>
           </tr>
           <tr>
              <td><select name="estado"  id="estado"  class="chosen">
                  <option value="">Elige una opcion</option>
                  <option value="A">Alta</option>
                  <option value="B">Baja</option>
                  </select>
                  <script>
                    $("#estado").val("'.$Cont->fields["estado"].'");
                  </script>
                  </td>
            </tr>
         </table>

        <br>

        <input type="submit" name="boton" id="boton" class="btn btn-sm btn-primary" value="Guardar">

         </form>

       </div>
       </div>
      
       <script src="js_load/sipa13.js"></script>
       ';


       return $Content;

    }

    }