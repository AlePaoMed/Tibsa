  <?php
/*------------------------------------------------------------------------------
* Archivo             : sipa11.php
* Realizado por       : Alejandro Polo Medina
*-----------------------------------------------------------------------------*/
ini_set('display_errors','off');
session_start();
include("/var/www/html/devtib/tibsa/validacionCredrenciales.php");


$conn = $tib;

$Order = "order by id_cliente desc ";
// Columnas a mostrar y filtrar
$aColumns = array('id_cliente', 'nombre_razon', 'rfc_social', 'regimen_fiscal', 'codigo_postal', 'telefono', 'correo', 'limite_credito', 'estado');
$IndexColumn = "id_cliente";
$Table = "CM_CLIENTES";

for ($I = 0; $I < count($aColumns); $I++) {
    if (isset($_GET['bSearchable_' . $I]) && $_GET['bSearchable_' . $I] == "true" && $_GET['sSearch_' . $I] != '') {
        if ($Where == "") {
            $Where = "WHERE ";
        } else {
            $Where .= " AND ";
        }
        $Columna = $aColumns[$I];
        $busqueda = strtoupper(trim($_GET['sSearch_' . $I]));
        $Where .= "UPPER($Columna) LIKE upper('%$busqueda%') ";
    }
}


// 3️⃣ Total de registros
$TotalRows = $conn->GetOne("SELECT COUNT($IndexColumn) FROM $Table");
$NumRows = $conn->GetOne("SELECT COUNT($IndexColumn) FROM $Table $Where");

// 4️⃣ Paginación
$Inicio = intval($_GET['iDisplayStart']);
$Fin = $Inicio + intval($_GET['iDisplayLength']);

// 5️⃣ Consulta con ROW_NUMBER() para paginación
$Sql = "
SELECT id_cliente, nombre_razon, rfc_social, regimen_fiscal, codigo_postal, telefono, correo, limite_credito, estado
FROM (
    SELECT id_cliente, nombre_razon, rfc_social, regimen_fiscal, codigo_postal, telefono, correo, limite_credito, estado,
           ROW_NUMBER() OVER ($Order) AS rnum
    FROM CM_CLIENTES
    $Where
) AS sub
WHERE rnum > $Inicio AND rnum <= $Fin
";

$rs = $conn->Execute($Sql);

// 6️⃣ Preparar salida JSON
$aOutput = array(
    "sEcho" => intval($_GET['sEcho']),
    "iTotalRecords" => intval($TotalRows),
    "iTotalDisplayRecords" => intval($NumRows),
    "aaData" => array()
);

while (!$rs->EOF) {
    $aRow = array();
    $aRow[] = '<span class="linkCont"><a class="clientes" style="color:blue;" idcliente="'. $rs->fields['id_cliente'].'" nombre="'.$rs->fields['nombre_razon'].'"> ' . $rs->fields['id_cliente'] . '</span>';
    $aRow[] = $rs->fields['nombre_razon'];
    $aRow[] = $rs->fields['rfc_social'];
    $aRow[] = $rs->fields['regimen_fiscal'];
    $aRow[] = $rs->fields['codigo_postal'];
    $aRow[] = $rs->fields['telefono'];
    $aRow[] = $rs->fields['correo'];
    $aRow[] = $rs->fields['limite_credito'];
    $aRow[] = $rs->fields['estado'];
    $aOutput['aaData'][] = $aRow;
    $rs->MoveNext();
}

echo json_encode($aOutput);