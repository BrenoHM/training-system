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

  $(".meus-cursos").on('mouseover', function(){

      var conteudo = $(".dropdown-menu-right").html().length;
    
      if ( conteudo == 0 ){
          $.ajax({ 
              url: "/subscribed",
              data: {},
              dataType: "json",
              type: "GET",
              beforeSend: function(){
                  $('.dropdown-menu-right').html('<div class="text-center">Buscando...</div>');
              },
              success: function(data){
                  var linha = '';
                  if( data.length > 0 ){
                      $.each(data, function(i, value){
                          linha += `
                              <div class="media">
                                  <a href="/cursos/${data[i].curso.idCurso}" class="dropdown-item">${data[i].curso.curso}</a>
                              </div>
                              <div class="dropdown-divider"></div>
                          `;
                      });
                      linha += '<a href="/meus-cursos" class="dropdown-item dropdown-footer">Ver todos</a>';
                  }else{
                      linha = `
                          <div class="media">
                              <a href="javascript:void(0)" class="dropdown-item">Nenhum curso!</a>
                          </div>
                      `;
                  }
                  $('.dropdown-menu-right').html(linha);
              }
          });
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

function hideLoad() {
    $("#div-loader").hide();
}