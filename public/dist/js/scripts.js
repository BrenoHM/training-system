(function ($) {
  'use strict'

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.notify.defaults({
    className: 'info',
    globalPosition: 'top center',
  });

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

function mostraErro(error, alvo){
  var msg = "<div class='alert alert-danger'><ul>";
  for(i in error.responseJSON.errors.url){
    msg += "<li>"+error.responseJSON.errors.url[i]+"</li>";
    //alert(error.responseJSON.errors.url[i]);
  }
  msg += "</ul></div>";
  $("#"+alvo).html(msg);
}