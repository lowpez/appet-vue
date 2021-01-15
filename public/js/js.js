$(document).ready(function(){
    "use strict";
	var rows = 1;
	$("#createRows").click(function(){
						var tr = "<tr>";
						tr = tr + "<td><input type='text' name='people"+rows+"' id='people"+rows+"' class='form-control'></td>";
						tr = tr + "<td><input type='text' name='price"+rows+"' id='price"+rows+"' class='form-control'></td>";
						tr = tr + "</tr>";
						$('#myPrices > tbody:last').append(tr);
					
						$('#hdnCount').val(rows);
						rows = rows + 1;
		});

		$("#deleteRows").click(function(){
				if ($("#myPrices tr").length !==1) {
					 $("#myPrices tr:last").remove();
				}
		});

		$("#clearRows").click(function(){
				rows = 1;
				$('#hdnCount').val(rows);
				$('#myPrices > tbody:last').empty(); // remove all
		});

	});
	
//

$('#submit-view').on('click', function(event){
"use strict";
    event.preventDefault();
    var formUrl = url + "pet/AddView"; 
    
    $.ajax({
        type: "POST",
        url: formUrl,
        data: $("#view-form").serialize(), // serializes the form's elements.
        success: function(data)
        {
            var response = JSON.parse(data);
            if (response.success) {
				 $("#hey").show().append(response.message);
				 $('#view-form')[0].reset();
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


var bootstrap_alert = function() {}
bootstrap_alert.warning = function(message) {
    $('#alert_placeholder').html('<div class="alert alert-warning"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
}
bootstrap_alert.error = function(message) {
    $('#alert_placeholder').html('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
}
bootstrap_alert.success = function(message) {
    $('#alert_placeholder').html('<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
}



var $uploadCrop,
    rawImg;
function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.upload-avatar-wrapper').addClass('ready');
            $('#avatarModal').modal('show');
            rawImg = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        swal("Sorry - you're browser doesn't support the FileReader API");
    }
}

$uploadCrop = $('#upload-avatar').croppie({
    viewport: {
        width: 250,
        height: 250,
    },
    enforceBoundary: true,
    enableExif: true
});


$('#avatarModal').on('shown.bs.modal', function(){
    // alert('Shown pop');
    $uploadCrop.croppie('bind', {
        url: rawImg
    }).then(function(){
        console.log('jQuery bind complete');
    });
});

$('#avatar').on('change', function() {
    $('#avatarModal').addClass($(this).data('avatar-mode'));

    readFile(this);
});

$('#pick').on('click', function() {
    $uploadCrop.croppie('result', {
        type: 'base64',
        size: 'original'
    }).then(function(dataImg) {
        // use ajax to send data to php
        $('#avatarModal').modal('hide');
        $('.upload-avatar-wrapper').removeClass('ready');

        $('#avatarFile').val(dataImg);
        $('.img-file-reload').attr('src', dataImg);
    });
})


$('#use').on('click', function() {
    $uploadCrop.croppie('result', {
        type: 'base64',
        size: 'original'
    }).then(function(dataImg) {
        // use ajax to send data to php
        $('#avatarModal').modal('hide');
        $('.upload-avatar-wrapper').removeClass('ready');

        $.LoadingOverlay('show');

        var formData = new FormData();
        var postUrl = $('#avatarPostUrl').val();
        formData.append("avatarFile", dataImg);
        axios.post(postUrl, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
            .then(function ({data}) {
                console.log(data);
                $.LoadingOverlay('hide');
                if (!data.success) {
                    bootstrap_alert.error(data.message);
                } else {
                    var src = $('.img-file-reload').attr('src');
                    var timestamp = new Date().getTime();
                    $('.img-file-reload').attr('src', src + '.' + timestamp);
                    bootstrap_alert.success(data.message);
                }

                $('html').scrollTop(0);
            })
            .catch(function (e) {
                console.log(e);
                $.LoadingOverlay('hide');
            });
    });
})
///////


$(function(){
	"use strict";
  $('input[type="tel"], input[type="password"], input[type="email"]').bind('input', function(){
    $(this).val(function(_, v){
     return v.replace(/\s+/g, '');
    });
  });
});