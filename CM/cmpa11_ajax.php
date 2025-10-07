  <?php
  session_start();
  ini_set('display_errors','off');

   include("/var/www/html/devtib/tibsa/validacionCredrenciales.php");

  $Action = strip_tags($_POST["action"]);
  echo $Action($tib);
  
   function abcClientes($tib){


     $tib->BeginTrans();

     $id_cliente  = $_POST["id_cliente"] ?? '';
     $nombre = $_POST["nombre"];
     $rfc = $_POST["rfc"];
     $regimenfiscal = $_POST["regimenfiscal"];
     $codigopostal = $_POST["codigopostal"];
     $telefono = $_POST["telefono"];
     $correo = $_POST["email"];
     $limite = $_POST["credito"];
     $estado = $_POST["estado"];


    
    try {

     $Consulta = "select count(id_cliente) as cliente from CM_CLIENTES where id_cliente = ? ";
     $Const = $tib->prepare($Consulta);
     $Ver = $tib->Execute($Const, [$id_cliente]);

      if ($Ver->fields["cliente"] > 0 ) {

          $update = "UPDATE CM_CLIENTES
                    SET nombre_razon   = ?,
                        rfc_social     = ?,
                        regimen_fiscal = ?,
                        codigo_postal  = ?,
                        telefono       = ?,
                        correo         = ?,
                        limite_credito = ?,
                        estado         = ?
                    WHERE id_cliente   = ?";

          $Const = $tib->Prepare($update);
          $Ver = $tib->Execute($Const, [
              $nombre,        // nombre_razon
              $rfc,           // rfc_social
              $regimenfiscal, // regimen_fiscal
              $codigopostal,  // codigo_postal
              $telefono,      // telefono
              $correo,        // correo
              $limite, 
              $estado,
              $id_cliente     // <-- ¡Este va al final! (WHERE id_cliente = ?)
          ]);
       
          if (!$Ver) {
              throw new Exception($tib->ErrorMsg());

          }else{

          $tib->CommitTrans(); 


          $aData["ID"] = 1;
          $aData["MSJ"] = "MSJ: EL REGISTRO HA SIDO ACTUALIZADO CORRECTAMENTE";

          }
      } else {

         $numeroSeq = $tib->GetOne("SELECT LPAD(nextval('SEQ_CM_CLIENTES')::text, 8, '0')");
          $nextId = 'TIB' . $numeroSeq;
          $insert = "INSERT INTO CM_CLIENTES (
               id_cliente, 
               nombre_razon, 
               rfc_social, 
               regimen_fiscal,
               codigo_postal, 
               telefono, 
               correo,
               limite_credito,
               estado
           ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $Const = $tib->Prepare($insert);
          $Ver = $tib->Execute($Const, [
              $nextId,        // id_cliente
              $nombre,        // nombre_razon
              $rfc,           // rfc_social
              $regimenfiscal, // regimen_fiscal
              $codigopostal,  // codigo_postal
              $telefono,      // telefono
              $correo,         // correo
              $limite,
              $estado
          ]);
          if (!$Ver) {
             throw new Exception($tib->ErrorMsg());
          }else{                   
         
          $tib->CommitTrans(); 

          $aData["ID"] = 1;
          $aData["MSJ"] = "MSJ: EL REGISTRO HA SIDO INSERTADO CORRECTAMENTE";

          }
      }


     } catch (Exception $e) {
         $tib->RollbackTrans();
      
         $aData["ID"] = 0;
         $aData["MSJ"] = "MSJ: ERROR: ". $e->getMessage();
         

    
    }

     return json_encode($aData);	
   }
   
   
  ?>