<?php
/*------------------------------------------------------------------------------
* Archivo             : sipa11.php
* Realizado por       : Alejandro Polo Medina
*-----------------------------------------------------------------------------*/
  ini_set('display_errors','off');
  session_start();
  include("/var/www/html/devtib/tibsa/validacionCredrenciales.php");
   
  $conn=$tib;
 // $conn->debug = true;

   
   $aColumns = array('a.pantalla', 'a.nombre', 'a.url_desc', 'a.estado', 'a.modulo', 'b.descripcion' );
   $IndexColumn = "a.pantalla";
   $Table = "pantallas a JOIN movimientos b ON a.tipo_movimiento = b.tipo_movimiento";
  
 
  
  for ( $I=0 ; $I<count($aColumns) ; $I++ ){
    if ( isset($_GET['bSearchable_'.$I]) && $_GET['bSearchable_'.$I] == "true" && $_GET['sSearch_'.$I] != '' ){
      if ( $Where == "" ){
        $Where = "WHERE ";
      }else{
        $Where .= " AND ";
      }
      $Columna=$aColumns[$I]; 
      switch ($Columna){
        case 'a.pantalla':
          $Columna ='a.pantalla';
          $Condicion=" $Columna like '%".trim(strtoupper($_GET['sSearch_'.$I]))."%' ";
          break;
        case 'a.nombre':
          $Columna='a.nombre';
          $Condicion=" $Columna like '%".strtoupper($_GET['sSearch_'.$I])."%'";
          break;
        case 'a.url_desc':
          $Columna="a.url_desc ";
          $Condicion=" upper ($Columna) like '%".strtoupper($_GET['sSearch_'.$I])."%'";
          break;
		 case 'a.estado':
          $Columna='a.estado';
          $Condicion=" upper ($Columna) like '%".strtoupper($_GET['sSearch_'.$I])."%'";
          break;
		  case 'a.modulo':
          $Columna='a.modulo';
          $Condicion=" upper ($Columna) like '%".strtoupper($_GET['sSearch_'.$I])."%'";
          break;
		   case 'b.descripcion':
          $Columna='b.descripcion';
          $Condicion=" upper ($Columna) like '%".strtoupper($_GET['sSearch_'.$I])."%'";
          break;
        default :
          $Columna=$Columna;
          $Condicion=" $Columna like '%".strtoupper(trim($_GET['sSearch_'.$I]))."%'";
      }
      $Where .= $Condicion;
    }
  } 
  
  //Total de registros en la tabla
  $Sql = "select count(".$IndexColumn.") from $Table $Where";
  $TotalRows = $conn->GetOne($Sql);
  
  //Total registros Selecionados con la busqueda
  $Sql="select count(a.pantalla)
        from pantallas a JOIN movimientos b ON a.tipo_movimiento = b.tipo_movimiento
        $Where";
  $NumRows = $conn->GetOne($Sql);

  //Get data to display Pagination
  $Inicio = $_GET['iDisplayStart'];
  $Fin= $Inicio + $_GET['iDisplayLength'];

  
  $Sql="SELECT pantalla, nombre, url_desc, estado, modulo, descripcion
FROM (
  SELECT pantalla, nombre, url_desc, estado, modulo, descripcion, rnum
  FROM (
    SELECT a.pantalla, a.nombre, a.url_desc, a.estado, a.modulo, b.descripcion,
           ROW_NUMBER() OVER () AS rnum
    FROM pantallas a
    JOIN movimientos b ON a.tipo_movimiento = b.tipo_movimiento

    $Where

    $Order
  ) AS subconsulta1
) AS subconsulta2
WHERE rnum <= $Fin AND rnum > $Inicio   ";
  $rs = $conn->Execute($Sql);

  $aOutput = array(
    "sEcho" => intval($_GET['sEcho']),
    "iTotalRecords" => $TotalRows,
    "iTotalDisplayRecords" => $NumRows,
    "aaData" => array()
  );
 
  $aOutput = array(
    "sEcho" => intval($_GET['sEcho']),
    "iTotalRecords" => $TotalRows,
    "iTotalDisplayRecords" => $NumRows,
    "aaData" => array()
  );
  
  foreach($rs as $rcon){
	  
    $aRow=array();
    $aRow[] ='<span class="linkCont">'.$rcon["pantalla"].'</span>';
    $aRow[] = $rcon["nombre"];
	$aRow[] = $rcon["url_desc"];
	$aRow[] = $rcon["modulo"];
	$aRow[] = $rcon["estado"];
	$aRow[] = $rcon["descripcion"];
	
		
	$Select = "select nivel_acceso from derechos_pantallas where pantalla = '".$rcon["pantalla"]."' and perfil = '".$_GET["idnum"]."' ";
	$SelCn = $tib->Execute($Select);
	
    $valor =  ($SelCn->fields["nivel_acceso"] == "") ? "selected" : "";
	$valor1 = ($SelCn->fields["nivel_acceso"] == 1) ? "selected" : "";
	$valor2 = ($SelCn->fields["nivel_acceso"] == 2) ? "selected" : "";
	$valor3 = ($SelCn->fields["nivel_acceso"] == 3) ? "selected" : "";
	$valor4 = ($SelCn->fields["nivel_acceso"] == 4) ? "selected" : "";
	$valor5 = ($SelCn->fields["nivel_acceso"] == 5) ? "selected" : "";
	$valor6 = ($SelCn->fields["nivel_acceso"] == 6) ? "selected" : "";
	$valor7 = ($SelCn->fields["nivel_acceso"] == 7) ? "selected" : "";
	
	$aRow[] = "<select name='verpermios' id='verpermios' pantalla='".$rcon["pantalla"]."'  modulo='".$rcon["modulo"]."' perfil='".$_GET["idnum"]."' class='changefunction'>
	           <option value='99' ".$valor.">Elige una opcion</option>
			   <option value='1' ".$valor1.">1</option>
			   <option value='2' ".$valor2.">2</option>
			   <option value='3' ".$valor3.">3</option>
			   <option value='4' ".$valor4.">4</option>
			   <option value='5' ".$valor5.">5</option>
			   <option value='6' ".$valor6.">6</option>
			   <option value='7' ".$valor7.">7</option>
			   </select>";
    $aOutput['aaData'][] = $aRow;

  }
  echo json_encode($aOutput);
?>

 