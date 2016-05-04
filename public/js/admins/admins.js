/**
 * Created by developer on 04-05-16.
 */


function aprobarSorteo(id){
  
  var route = "http://localhost:8000/aprobarsorteopendiente";
  var token = $("#token").val();
  $.ajax({
    url: route,
    headers: {'X-CSRF-TOKEN': token},
    type: 'GET',
    dataType: 'json',
    data:{ id:id },
    success: function success(data, status) {
      $('estado'+id).text('Lanzado');
    }
  });




}
