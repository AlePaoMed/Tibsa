<?php
/*------------------------------------------------------------------------------
* Archivo             : sipa11.php
* Realizado por       : Alejandro Polo Medina
*-----------------------------------------------------------------------------*/
  ini_set('display_errors','off');
  session_start();
  include("/var/www/html/devtib/tibsa/validacionCredrenciales.php");

  $conn=$tib;

   
   $aColumns = array('a.usuario', 'a.rfc', 'a.fecha_alta', 'b.nombre', 'a.estado');
   $IndexColumn = "a.usuario";
   $Table = "usuarios a join perfiles b  on a.perfil = b.perfil";
  
 
  
  for ( $I=0 ; $I<count($aColumns) ; $I++ ){
    if ( isset($_GET['bSearchable_'.$I]) && $_GET['bSearchable_'.$I] == "true" && $_GET['sSearch_'.$I] != '' ){
      if ( $Where == "" ){
        $Where = "WHERE ";
      }else{
        $Where .= " AND ";
      }
      $Columna=$aColumns[$I]; 
      switch ($Columna){
        case 'a.usuario':
          $Columna ='a.usuario';
          $Condicion=" $Columna like '%".trim(strtoupper($_GET['sSearch_'.$I]))."%' ";
          break;
        case 'a.rfc':
          $Columna='a.rfc';
          $Condicion=" $Columna like '%".strtoupper($_GET['sSearch_'.$I])."%'";
          break;
        case 'a.fecha_alta':
          $Columna="a.fecha_alta";
          $Condicion=" upper ($Columna) like '%".strtoupper($_GET['sSearch_'.$I])."%'";
          break;
        case 'b.nombre':
            $Columna="b.nombre";
            $Condicion=" upper ($Columna) like '%".strtoupper($_GET['sSearch_'.$I])."%'";
         break;
        case 'a.estado':
                $Columna="a.estado";
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
  $Sql="select count(a.usuario)
        from usuarios a join perfiles b  on a.perfil = b.perfil
        $Where";
  $NumRows = $conn->GetOne($Sql);

  //Get data to display Pagination
  $Inicio = $_GET['iDisplayStart'];
  $Fin= $Inicio + $_GET['iDisplayLength'];

  
  $Sql="SELECT usuario, rfc, fecha_alta, estado, nombre, perfil
FROM (
  SELECT usuario, rfc, fecha_alta, estado, nombre, perfil, rnum
  FROM (
    SELECT a.usuario, a.rfc, a.fecha_alta, a.estado, b.nombre, b.perfil,
           ROW_NUMBER() OVER () AS rnum
    FROM usuarios a join perfiles b  on a.perfil = b.perfil
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
    $aRow[] ='<span class="linkCont">'.$rcon["usuario"].'</span>';
    $aRow[] = $rcon["rfc"];
	$aRow[] = $rcon["fecha_alta"];
    $aRow[] = $rcon["nombre"];
    $aRow[] = $rcon["estado"];

    if($rcon["perfil"] == '001' ){

      $aRow[] = ""; 
      
    }else{

      $aRow[] = "<a href='?f=sipa14&_g=add&ided=".$rcon["usuario"]."' class='btn btn-sm btn-warning'>+ Editar</a>";
      

    }
  
    $aOutput['aaData'][] = $aRow;

  }
  echo json_encode($aOutput);
?>

 