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

   
   $aColumns = array('perfil', 'nombre', 'estado', 'usuario_admin'  );
   $IndexColumn = "perfil";
   $Table = "perfiles";
  
 
  
  for ( $I=0 ; $I<count($aColumns) ; $I++ ){
    if ( isset($_GET['bSearchable_'.$I]) && $_GET['bSearchable_'.$I] == "true" && $_GET['sSearch_'.$I] != '' ){
      if ( $Where == "" ){
        $Where = "WHERE ";
      }else{
        $Where .= " AND ";
      }
      $Columna=$aColumns[$I]; 
      switch ($Columna){
        case 'perfil':
          $Columna ='perfil';
          $Condicion=" $Columna like '%".trim(strtoupper($_GET['sSearch_'.$I]))."%' ";
          break;
        case 'nombre':
          $Columna='nombre';
          $Condicion=" $Columna like '%".strtoupper($_GET['sSearch_'.$I])."%'";
          break;
        case 'estado':
          $Columna="estado";
          $Condicion=" upper ($Columna) like '%".strtoupper($_GET['sSearch_'.$I])."%'";
          break;
          case 'usuario_admin':
            $Columna="usuario_admin";
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
  $Sql="select count(perfil)
        from perfiles
        $Where";
  $NumRows = $conn->GetOne($Sql);

  //Get data to display Pagination
  $Inicio = $_GET['iDisplayStart'];
  $Fin= $Inicio + $_GET['iDisplayLength'];

  
  $Sql="SELECT perfil, nombre, estado, usuario_admin
FROM (
  SELECT perfil, nombre, estado, usuario_admin, rnum
  FROM (
    SELECT perfil, nombre, estado, usuario_admin,
           ROW_NUMBER() OVER () AS rnum
    FROM perfiles
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
    $aRow[] ='<span class="linkCont">'.$rcon["perfil"].'</span>';
    $aRow[] = $rcon["nombre"];
	  $aRow[] = $rcon["estado"];

    $aRow[] = $rcon["usuario_admin"];

   if($rcon["usuario_admin"] == 'S'){

    $aRow[] = ''; 

   }else{
  
    $aRow[] = "<a href='?f=sipa15&_g=asignarPermisos&ided=".$rcon["perfil"]."' class='btn btn-sm btn-dark'>Asignar Permisos</a>";

  }
    

    $aOutput['aaData'][] = $aRow;

  }
  echo json_encode($aOutput);
?>

 