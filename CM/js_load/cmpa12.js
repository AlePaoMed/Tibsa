
$("#fecha").datepicker();

$("#dialog-recuperar").dialog({
  autoOpen: false,
  modal: true,
  width: "auto",     // que calcule automáticamente
  maxWidth: 600,     // 👈 ancho máximo (ajústalo a tu gusto)
  height: "400",
  resizable: false,
  draggable: false,
  fluid: true,        // (opción personalizada)
  open: function() {
    // Ajusta tamaño y posición al abrir
    $(this).dialog("option", "position", { my: "center", at: "center", of: window });
  }
});

$("#id_cliente").off("click").on("click", function(e) {
    e.preventDefault();

    $("#dialog-recuperar").dialog("open");

    // Destruye si ya existe la instancia previa
    if ($.fn.DataTable.isDataTable("#sipa11_tbl_2")) {
        $("#sipa11_tbl_2").DataTable().destroy();
    }

    var oTable = $("#sipa11_tbl_2").DataTable({
        "responsive": true,
        "bJQueryUI": false,
        "bLengthChange": false,
        "bProcessing": true,
        "iDisplayLength": 20,
        "bServerSide": true,
        "bDestroy": true,
        "bFilter": true,
        "bSort": false,
        "sPaginationType": "full_numbers",
        "sAjaxSource": "cmpa12_tbl_2.php",
        "fnServerParams": function (aoData) {
            aoData.push({ "name": "var", "value": "" });
        },
        "aoColumns": [null, null, null, null],
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Busqueda:",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            }
        }
    });

    // Ocultar filtros individuales
    $(".thinputrhpa199tbl_2").off("change").on("change", function () {
        oTable.column($(".thinputrhpa199tbl_2").index(this))
              .search(this.value)
              .draw();
    });

    $("#sipa11_tbl_2_filter").hide();
});


$(".tb_clientes").on("click", ".clientes", function(e){

  $("#id_cliente").val($(this).attr("idcliente"));
   $("#dialog-recuperar").dialog("close");

   $(".cotzsnombre").html("");
   $(".cotzsnombre").append($(this).attr("nombre"));

});