var Login = function() {
	"use strict";
	var error_email = 0;
	var error_email_indicacao = 0;
	var runBoxToShow = function() {
		var el = $('.box-login');
		if (getParameterByName('box').length) {
			switch(getParameterByName('box')) {
				case "register" :
					el = $('.box-register');
					break;
				case "forgot" :
					el = $('.box-forgot');
					break;
				default :
					el = $('.box-login');
					break;
			}
		}
		el.show().addClass("animated flipInX").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
			$(this).removeClass("animated flipInX");
		});
	};
	var runLoginButtons = function() {
		$('.forgot').on('click', function() {
			$('.box-login').removeClass("animated flipInX").addClass("animated bounceOutRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).hide().removeClass("animated bounceOutRight");

			});
			$('.box-forgot').show().addClass("animated bounceInLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).show().removeClass("animated bounceInLeft");

			});
		});
		$('.register').on('click', function() {
			$('.box-login').removeClass("animated flipInX").addClass("animated bounceOutRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).hide().removeClass("animated bounceOutRight");

			});
			$('.box-register').show().addClass("animated bounceInLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).show().removeClass("animated bounceInLeft");

			});

		});
		$('.go-back').click(function() {
			var boxToShow;
			if ($('.box-register').is(":visible")) {
				boxToShow = $('.box-register');
			} else {
				boxToShow = $('.box-forgot');
			}
			boxToShow.addClass("animated bounceOutLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				boxToShow.hide().removeClass("animated bounceOutLeft");

			});
			$('.box-login').show().addClass("animated bounceInRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).show().removeClass("animated bounceInRight");

			});
		});
	};
	//function to return the querystring parameter with a given name.
	var getParameterByName = function(name) {
		name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"), results = regex.exec(location.search);
		return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	};
	var runSetDefaultValidation = function() {
		$.validator.setDefaults({
			errorElement : "span", // contain the error msg in a small tag
			errorClass : 'help-block',
			errorPlacement : function(error, element) {// render error placement for each input type
				if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {// for chosen elements, need to insert the error after the chosen container
					error.insertAfter($(element).closest('.form-group').children('div').children().last());
				} else if (element.attr("name") == "card_expiry_mm" || element.attr("name") == "card_expiry_yyyy") {
					error.appendTo($(element).closest('.form-group').children('div'));
				} else {
					error.insertAfter(element);
					// for other inputs, just perform default behavior
				}
			},
			ignore : ':hidden',
			success : function(label, element) {
				label.addClass('help-block valid');
				// mark the current input as valid and display OK icon
				$(element).closest('.form-group').removeClass('has-error');
			},
			highlight : function(element) {
				$(element).closest('.help-block').removeClass('valid');
				// display OK icon
				$(element).closest('.form-group').addClass('has-error');
				// add the Bootstrap error class to the control group
			},
			unhighlight : function(element) {// revert the change done by hightlight
				$(element).closest('.form-group').removeClass('has-error');
				// set error class to the control group
			}
		});
	};
	var runLoginValidator = function() {
		var form = $('.form-login');
		var errorHandler = $('.errorHandler', form);
		form.validate({
			rules : {
				username : {
					minlength : 2,
					required : true
				},
				password : {
					minlength : 6,
					required : true
				}
			},
			submitHandler : function(form) {
				//form.submit();
				var dados = $( '.form-login' ).serialize();
				document.getElementById('msg_login_verifica').innerHTML = 'verificando email e senha, por favor aguarde...';
				$('#msg_login_verifica').removeClass('no-display');
				//	var email_teste = document.getElementById('email_indicacao').value;
						$.ajax({
						url: "login_verifica_usuario.php?"+dados,
						type: "POST",
						dataType: "json",
						success: function(json){
						if(json.ativado == '1'){
							document.getElementById('msg_login_verifica').innerHTML = 'Acesso total liberado para o seu nível de cadastro .... SUCESSO';
							window.open('page-inicial.html',"_self",false);
						} else if(json.ativado == '2' || json.ativado == '0'){
							document.getElementById('msg_login_verifica').innerHTML = 'Você  ainda não indicou um email válido de um especialista para sua indicação seu acesso ilimitado a um contato com um Gestor ou ...<br> <strong> Entre em contato com o especialista que o indicou e confirme/verifique o email dele </strong><br>agaurdamos você... <strong>SUCESSO</strong>';
							$('#msg_login_verifica').removeClass('alert-info').addClass('alert-warning');
							$('#bt_acessar_index').addClass('no-display');
							$('#bt_acessar_limitado').removeClass('no-display');
							document.getElementById('nova_conta').innerHTML = '';
							document.getElementById('input_username_login').setAttribute('disabled','disabled');
							document.getElementById('input_password_login').setAttribute('disabled','disabled');
							$('#info_email_indicacao_login').removeClass('no-display');
						} else if(json.ativado == '3'){
							document.getElementById('msg_login_verifica').innerHTML = 'O especilista que você indicou ainda não liberou seu acesso ilimitado no nível LIFE <br> <strong>Você pode acessar o ambiente e ver informações gerais importantes</strong><br>.... entre em contato com o especilista que você cadastrou pra liberação';
							$('#msg_login_verifica').removeClass('alert-info').addClass('alert-warning');
							$('#bt_acessar_index').addClass('no-display');
							$('#bt_acessar_limitado').removeClass('no-display');
							document.getElementById('input_username_login').setAttribute('disabled','disabled');
							document.getElementById('input_password_login').setAttribute('disabled','disabled');
						} else if(json.ativado == 'erro'){
							document.getElementById('msg_login_verifica').innerHTML = 'Ocorreu algum erro com seu login (email) e senha, ou com a conexão. Confira seus dados e tente novamente';
							$('#').removeClass('alert-info').removeClass('alert-info').addClass('alert-danger');
						}
					}
				});
			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				errorHandler.show();
			}
		});
	};
	var runForgotValidator = function() {
		var form2 = $('.form-forgot');
		var errorHandler2 = $('.errorHandler', form2);
		form2.validate({
			rules : {
				email : {
					required : true
				}
			},
			submitHandler : function(form2) {
				var email_esqueci = document.getElementById("email_esqueci").value;
				console.log('email_esqueci = ' + email_esqueci);
				errorHandler2.show();
				$('.errorHandler', form2).html('enviando email para = ' + email_esqueci + '<br> Aguarde isso pode legar alguns minutos');
					$.ajax({
						url: "consulta_PHP_Ajax_esqueci_senha_exec_email.php",
						type: "POST",
						dataType: "json",
						data: ({
							email_esqueci: email_esqueci,
						}),
						success: function(json){
							console.log(json);
							console.log(json.retorno);
							var retorno = '';
							switch(json.retorno) {
									case 'sucesso':
										retorno = '<strong>PROCEDIMENTO:</strong> acesse seu email (<em>verifique o span se necessário</em>) e obtenha um novo link de validação.';
											break;
									case 'error':
										retorno = '<strong>PROCEDIMENTO:</strong> houve um erro no envio do email com o link para validação.<br>Verifique a sua conexão e solicite novamente acessando desde a página inicial como teste.<br>Se o problema persistir entre em contato com um Gestor.';
											break;
									case 'email_invalido':
										retorno = 'Não encontramos esse email em nosso banco de dados, verifique-o e tente novamente.<br>Se o problema persistir entre em contato com um Gestor.';
											break;
							}
							$('.errorHandler', form2).html(retorno);
						}
					});
			},
			invalidHandler : function(event, validator) {
				errorHandler2.show();
			}
		});
	};
	var runRegisterValidator = function() {
		var form3 = $('.form-register');
		var errorHandler3 = $('.errorHandler', form3);
		form3.validate({
		rules : {
				first_name : {
				minlength : 3,
				required : true
				},
				last_name : {
					minlength : 3,
					required : true
				},
				tel_cel : {
					minlength : 10,
					required : true
				},
				address : {
					minlength : 5,
					required : true
				},
				city : {
					minlength : 2,
					required : true
				},
				gender : {
					required : true
				},
				email : {
					required : true
				},
				password : {
					minlength : 6,
					required : true
				},
				password_again : {
					required : true,
					minlength : 6,
					equalTo : "#password"
				},
				agree : {
					minlength : 1,
					required : true
				}
			},
			submitHandler : function(form) {
				errorHandler3.hide();
					var email_teste = document.getElementById("email_form").value;
					$.ajax({
						url: "consulta_PHP_Ajax_get_email.php?email="+email_teste, //URL de destino
						type: "POST",
						dataType: "json", //Tipo de Retorno
						success: function(json){ //Se ocorrer tudo certo
//							alert(json.email + ' == ' + email_teste);
							if(json.email == 'usado'){
								errorHandler3.show();
								document.getElementById('info_email_err').innerHTML = 'Esse email já está sendo usado. Solicite a sua senha em "esqueci minha senha".';
							} else {
								enviar_dados();
							}
						}
					
					});
			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				errorHandler3.show();
			}
		});
	};
	return {
		//main function to initiate template pages
		init : function() {
			runBoxToShow();
			runLoginButtons();
			runSetDefaultValidation();
			runLoginValidator();
			runForgotValidator();
			runRegisterValidator();
		}
	};
}();

function pagina_inicial() {
	var boxToShow;
	if ($('.box-register').is(":visible")) {
		boxToShow = $('.box-register');
	} else {
		boxToShow = $('.box-forgot');
	}
	boxToShow.addClass("animated bounceOutLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
		boxToShow.hide().removeClass("animated bounceOutLeft");

	});
	$('.box-login').show().addClass("animated bounceInRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
		$(this).show().removeClass("animated bounceInRight");

	});
}

function enviar_dados(){
	document.getElementById('info_email').innerHTML = 'Cadastando seus dados ... '; 
	var dados = $( '.form-register' ).serialize();
//	alert(dados);
	$.post("login_cadastra_usuario.php", {
	data: dados}, 
	function(data){
			$('#info_email_indicacao').removeClass('no-display');
			$('#bt_enviar_cadastro').addClass('no-display');
//			alert(data);
	});
}

function enviar_indicacao(){
	document.getElementById('info_email_indicacao_alerta').innerHTML = 'verificando email, por favor aguarde...';
	var email_teste = document.getElementById('email_indicacao').value;
	alert(email_teste);
			$.ajax({
			url: "consulta_PHP_Ajax_get_email_indicacao.php?email="+email_teste, //URL de destino
			type: "POST",
			dataType: "json", //Tipo de Retorno
			success: function(json){ //Se ocorrer tudo certo
			if(json.email == 'usado'){
				document.getElementById('info_email_indicacao_alerta').innerHTML = 'Esse email é válido ... aguarde que nosso especialista irá validá-lo e entrará em contato. <br> <strong>Você pode acessar o ambiente e ver informações gerais importantes</strong>';
				$('#bt_enviar_cadastro').addClass('no-display');
				$('#bt_enviar_indicacao').addClass('no-display');
				document.getElementById('email_indicacao').setAttribute('disabled','disabled');
				document.getElementById('bt_enviar_indicacao_login').setAttribute('disabled','disabled');
			} else {
				document.getElementById('info_email_indicacao_alerta').innerHTML = 'Você foi cadastrado, mas não encontramos nenhuma referência a esse email em nosso banco de dados, favor conferir com o email com o Especialista que o indicou. Fique tranquilo, se você sair ao acessar com o login e senha que voce acabou de cadastrar será pedido novamente o email do Especialista que o indicou';
			}
		}
	});
}

function enviar_indicacao_login(){
	document.getElementById('info_email_indicacao_login_alerta').innerHTML = 'verificando email, por favor aguarde...';
	var email_teste = document.getElementById('email_indicacao_login').value;
	alert('22  ' + email_teste);
			$.ajax({
			url: "consulta_PHP_Ajax_get_email_indicacao.php?email="+email_teste, //URL de destino
			type: "POST",
			dataType: "json", //Tipo de Retorno
			success: function(json){ //Se ocorrer tudo certo
			alert(json.email);
			if(json.email == 'usado'){
				document.getElementById('msg_login_verifica').innerHTML = 'O especilista que você indicou irá liberar o seu acesso ilimitado no nível LIFE <br> <strong>Você pode acessar o ambiente e ver informações gerais importantes</strong><br>.... entre em contato com o especilista que você cadastrou para agilizar a liberação';
				$('#info_email_indicacao_login').addClass('no-display');
			} else {
				document.getElementById('info_email_indicacao_login_alerta').innerHTML = 'Ainda não encontramos nenhuma referência a esse email em nosso banco de dados, favor conferi-lo com o Especialista que o indicou, ou tente novamente.';
				$('#info_email_indicacao_login_alerta').removeClass('no-display');
			}
		}
	});
}

function acesso_limitado_link(){
	window.open('page-inicial.html',"_self",false);
}




