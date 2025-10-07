<?php

class sipa14{
	
	public function see($tib){
		
		 $Content = ' 

    <div style="overflow-x:auto; max-width:1200px; width:100%;" class="table-responsive">

         <div class="pantallasweb">

         <span class="tituloLeyenda">USUARIO</span>
		   

         <div style="float:right;">
           <a href="?f=sipa14&_g=add" class="btn btn-sm btn-success">+ AGREGAR</a>
         </div>
        
        <br><br>

        <table id="sipa13_tbl_1" class="bordered" width="100%"  border="0" cellspacing="2" cellpading="1" style="border-collapse: separate; border-spacing:1px;">
        <thead>
       <tr>
         <th class="cabeceraTablajq">Usuario</th>
         <th class="cabeceraTablajq">Rfc</th>
         <th class="cabeceraTablajq">Fecha alta</th>
         <th class="cabeceraTablajq">Perfil</th>
         <th class="cabeceraTablajq">Estado</th>
         <th class="cabeceraTablajq">Editar</th>
       </tr>    
       <tr>
         <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="valor" autocomplete="off"></th>
         <th class="cabeceraTablajq"><input class="thinputrhpa199tbl_1" style="width:90%" type="text" value="" name="valor" autocomplete="off"></th>
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


     <script src="js_load/sipa14.js"></script>

        ';

        return $Content;
    }


    public function add($tib){


      $readonly = "";
      if($_GET["ided"] == true){

        $Consultita = "select usuario, contrasena, rfc, estado, fecha_alta, perfil 
                            from usuarios where usuario = '".$_GET["ided"]."' ";

        $ConstSrt = $tib->Execute($Consultita);

        
       $readonly = "readonly";

      }

      


      $Content = ' 

      <div style="overflow-x:auto; max-width:1200px; width:100%;" class="table-responsive">
		   
        <div class="pantallasweb">


        <span class="tituloLeyenda">USUARIO</span>


        <div style="float:right;">
           <a href="?f=sipa14&_g=see" class="btn btn-sm btn-danger"><- REGRESAR</a>
        </div>
     
       <br>

       <form id="envioUser" autocomplete="off">

       <table>
         <tr>
          <td><label>Usuario</label></td>
         </tr>
         <tr>
          <td><input type="text" name="usuarioid" id="usuarioid" value="'. $ConstSrt->fields["usuario"].'" maxlength="8" style="width:80px;" class="form-control"  '.$readonly.'></td>
         </tr>
         <tr>
         <td><label>Rfc</label></td>
        </tr>
        <tr>
        <td><input type="text" name="rfcid" id="rfcid" value="'. $ConstSrt->fields["rfc"].'" maxlength="16" style="width:350px;" class="form-control"></td>
       </tr>
        <tr>
        <td><label>Fecha Alta</label></td>
       </tr>
       <tr>
       <td><input type="text" name="fechaalta" id="fechaalta" value="'. $ConstSrt->fields["fecha_alta"].'" maxlength="16" style="width:150px;" class="form-control"></td>
      </tr>
       <tr>
       <td><label>Perfil</label></td>
      </tr>
      <tr>
      <td><select name="perfil" id="perfil" class="chosen">
          <option value="">Elige un estado</option>';

          $Consultita = "select perfil, nombre from perfiles where perfil not in ('001') ";
          $ConstUna = $tib->Execute($Consultita);
          foreach($ConstUna as $Cbns){

            $Content.= '<option value="'.$Cbns["perfil"].'">'.$Cbns["nombre"].'</option>';


          }

          $Content .= '</select>
          <script>
              $("#perfil").val("'.$ConstSrt->fields["perfil"].'");
          </script>
          </td>
     </tr>
      <tr>
        <td><label>Estado</label></td>
       </tr>
       <tr>
       <td><select name="estado" id="estado" class="chosen">
            <option value="">Elige un estado</option>
            <option value="A">ALTA</option>
            <option value="B">BAJA</option>
       </select>
       <script>
              $("#estado").val("'.$ConstSrt->fields["estado"].'");
          </script>
       </td>
      </tr>
       </table>

       <br>

      <input type="submit" name="boton" id="boton" class="btn btn-sm btn-primary" value="Guardar">

      </form>
      </div>
      </div>

     <script src="js_load/sipa14.js"></script>';


      return $Content;

    }   

}