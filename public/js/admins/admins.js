/**
 * Created by developer on 04-05-16.
 */


function aprobarSorteo(id){
  var route = "http://192.168.0.103/aprobarsorteopendiente";
  var token = $("#token").val();
  $.ajax({
    url: route,
    headers: {'X-CSRF-TOKEN': token},
    type: 'GET',
    dataType: 'json',
    data:{ id:id },
    success: function success() {
      $('#estado'+id).text('Activo');
      $('#estado'+id).addClass('list-group-item-success');
    }
  });
  return true;
}
function visualizarEmpresaSorteo(id){
  var route = "http://192.168.0.103/visualizarempresasorteopendiente";
  var token = $("#token").val();
  $.ajax({
    url: route,
    headers: {'X-CSRF-TOKEN': token},
    type: 'GET',
    dataType: 'json',
    data:{ id:id },
    success: function success(data, status) {
      $('#nombre_empresa').text(data.nombre);
      $('#empresa_id').text(data.id);
      $('#rut').text(data.rut);
      $('#empresa_email').text(data.email);
      $('#descripcion_empresa').text(data.descripcion);
      $('#direccion_empresa').text(data.direccion);
      $('#ciudad_empresa').text(data.ciudad);
      $('#region_empresa').text(data.region);
      $('#pais_empresa').text(data.pais);
      $('#fono_empresa').text(data.fono);
      $('#fono_2_empresa').text(data.fono_2);
      $('#encargado_empresa').text(data.nombre_encargado);


    }
  });
  return true;

}
