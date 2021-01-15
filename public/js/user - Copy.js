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

