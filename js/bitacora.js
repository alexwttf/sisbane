$(document).ready(function(){
	
	$("#register-form").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			bitacora: {
				required : true,
				maxlength: 200
			},
		    idusuario : {
				required : true,
				idusuario: true
			}
		idfacebook : {
				required : true,
				idfacebook: true,
				remote: checarfb.php
			}
		},
		messages : {
			bitacora : {
				required : "Por favor, escriba el motivo del ban"
			},
			idfacebook : {
				required : "Introduzca el id de facebook",
				remote : "El id de facebook ya esta registrado en nuestra base de datos"
			}
		},
		errorPlacement : function(error, element) {
			$(element).closest('div').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('div').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			 $(element).closest('div').removeClass('has-error').addClass('has-success');
			 $(element).closest('div').find('.help-block').html('');
		}
	});
	
});