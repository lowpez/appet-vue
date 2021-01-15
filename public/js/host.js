$(function() {
	$('#submit-host').on('click', function(event){

    event.preventDefault();
    var formUrl = url + "host/addHost"; 

    $.ajax({
        type: "POST",
        url: formUrl,
        data: $("#host-form").serialize(), // serializes the form's elements.
        success: function(data)
        {
            var response = JSON.parse(data);
            if (response.success) {
                alert(response.message);
                window.location = url + "attend";
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



$('#submit-request').on('click', function(event){
"use strict";
    event.preventDefault();
    var formUrl = url + "request/crea"; 
    
    $.ajax({
        type: "POST",
        url: formUrl,
        data: $("#apply-form").serialize(), // serializes the form's elements.
        success: function(data)
        {
            var response = JSON.parse(data);
            if (response.success) {
				 $("#hey").show().append(response.message);
				 $('#apply-form')[0].reset();
                //alert(response.message);
                //window.location = url + "attend";
				//window.location = url;
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

 });