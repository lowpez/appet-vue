$(function() {
    $('#submit-user').on('click', function(event){
"use strict";
    event.preventDefault();
    var formUrl = url + "user/createUser";

    $.ajax({
        type: "POST",
        url: formUrl,
        data: $("#user-form").serialize(), // serializes the form's elements.
        success: function(data)
        {
            if (data.indexOf("Duplicate entry") > -1) {
                alert("This email is already in use!");
                return;
            }
            var response = JSON.parse(data);
            if (response.success) {
                alert(response.message);
                window.location = url + "user/login";
            } else {
                var messages = "";
                for (var key in response.errors){
                    var msg = response.errors[key];
                    messages += msg;
                    messages += "\n";
                }
                alert(messages);
            }
        },
        error: function(data)
        {
            alert(data);
        }
    });
});

//UPDATE

 /*$('#save-user').on('click', function(event){

    event.preventDefault();
    var formUrl = url + "user/updateUser" + eventId;

    $.ajax({
        type: "POST",
        url: formUrl,
        data: $("#performer-form").serialize(), // serializes the form's elements.
        success: function(data)
        {
            var response = JSON.parse(data);
            if (response.success) {
                alert(response.message);
                window.location = url + "perfil";
            } else {
                var messages = "";
                for (var key in response.errors){
                    var msg = response.errors[key];
                    messages += msg;
                    messages += "\n";
                }
                alert(messages);
            }
        },
        error: function(data)
        {
            alert(data);
        }
    });
}); */






 });




$(document).ready(function(){

 setInterval(function(){
  load_last_notification();
 }, 5000);

 function load_last_notification()
 {
     var formUrl = url + "my/notify";
    $.ajax({
   url: formUrl,
   method:"POST",
   success:function(data)
   {
    $('.counter').html(data);
   }
  });
 }
});







$(document).ready(function(){
	$('#clickme').on('click', function() {
        $('#avatar').val('');
        $('#avatar').trigger('click');
    });

    $('#state').on('change', function() {

        console.log("sfds");


        if($("#state").val()=='')
        {
            $("#city").html('<option value="">SELECCIONE</option>');
           $('.selectpicker').selectpicker('refresh');
            return;

        }


        let path = "/states";

console.log(path);

      /*  $.getJSON( '/state/'+$("#state").val() )
            .done(function( response, textStatus, jqXHR ) {
console.log(response.success);
                if (response.success) {
                    $('#city').html("");
                    $.each(response.data, function(key, value) {

                        $('#city').append($('<option>', {
                            value: value['id'],
                            text : value['name']
                        }));

                    });
                    $('.selectpicker').selectpicker('refresh');
                }
            })
            .fail(function( jqXHR, textStatus, errorThrown ) {
                if ( console && console.log ) {
                    alert( "Algo ha fallado: " +  textStatus );
                }
            });
*/
        fetch('/state/'+$("#state").val())
            .then((res) => {
                console.log('Output: ', res);
            })
            .catch(err => console.error(err));

    });

    });

/*////// AJAX + MODAL //////*/

