var modalConfirm = function(callback){
  
  $("#btn-confirm").on("click", function(){
    $("#mi-modal").modal('show');
  });

  $("#modal-btn-si").on("click", function(){
    callback(true);
    $("#mi-modal").modal('hide');
  });
  
  $("#modal-btn-no").on("click", function(){
    callback(false);
    $("#mi-modal").modal('hide');
  });
};

modalConfirm(function(confirm){
  if(confirm){
    //Acciones si el usuario confirma
	$('#is_active').prop('checked', true);
    //$("#result").html("CONFIRMADO");
  }else{
    //Acciones si el usuario no confirma
    $('#is_active').prop('checked', false);
  }
});