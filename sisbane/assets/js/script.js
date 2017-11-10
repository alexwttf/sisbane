// JavaScript Document

$('document').ready(function()
{ 
     /* validation */
	 $("#register-form").validate({
      rules:
	  {
			user_name: {
		    required: true,
			minlength: 3
			},
			password: {
			required: true,
			minlength: 6,
			maxlength: 15
			},
			cpassword: {
			required: true,
			equalTo: '#password'
			},
			cbox1: {
            required: true,
            cbox1: true
            },
	   },
       messages:
	   {
            user_name: "INTRODUCE EL USUARIO",
            cbox1: "elije un nivel de usuario",
            password:{
                      required: "INTRODUZCA LA CONTRASEÑA",
                      minlength: "CONTRASEÑA MINIMO 8 CARACTERES"
                     },
			cpassword:{
						required: "ESCRIBA DE NUEVO LA CONTRASEÑA",
						equalTo: " NO COINCIDEN LAS CONTRASEÑAS !"
					  }
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	   function submitForm()
	   {		
				var data = $("#register-form").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : '../registrousuario.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Enviando ...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
											$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Lo sentimos ya existe el usuario !</div>');
											
											$("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Crear Cuenta');
										
									});
																				
								}
								else if(data=="registered")
								{
									
									$("#btn-submit").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing Up ...');
									setTimeout('$(".form-signin").fadeOut(500, function(){ $(".signin-form").load("admin/success.php"); }); ',5000);
									
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');
											
									$("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Crear Cuenta');
										
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
	   
	   
	 

});