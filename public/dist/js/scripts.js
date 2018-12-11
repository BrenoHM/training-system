(function ($) {
  'use strict'

  $('.dataTable').DataTable({
  	"paging": true,
      "ordering": true,
      "info": true,
      "oLanguage": {
        "sLengthMenu": "_MENU_ registros por página",
        "sInfo": "Mostrando registros de _START_ a _END_ de um total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de um total de _MAX_ registros)",
        "zeroRecords": "Nothing found - sorry",
        "sEmptyTable": "Nenhum registro encontrado.",
        "sSearch": "Pesquisar:",
        "oPaginate": {
                "sFirst":    "Primero",
                "sLast":    "Último",
                "sNext":    "Seguinte",
                "sPrevious": "Anterior"
            },
        "buttons": {
                "copy":  "Copiar",
                "excel": "Excel",
                "pdf":   "PDF",
                "print": "Imprimir"
            }
        }
  });

})(jQuery)