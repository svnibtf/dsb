function enviar_dados_unicos_form(id) {
	$('#'+id).attr('disabled','disabled');
	console.log(id, ' .. ', $('#'+id).data('old'), ' .. ', $('#'+id).val());
	if($('#'+id).data('old') == $('#'+id).val()){
		toastr['error']("O dado não foi alterado", "Não Enviado");
	} else {	
		var user = 'id';
		toastr['info']("", "Enviando Dados");
		$.ajax({
		url: "consulta-update-dados-unicos.php",
		type: "POST",
		dataType: "json",
		data: ({
						user		: user,
						tabela	: $('#'+id).data('tabela'),
						campo		: $('#'+id).data('campo'),
						valor		: $('#'+id).val()
					}),
		success: function(json){
				toastr.remove();
				if(json.cadastro == 'ok'){
					toastr["info"]('','Dados enviados com sucesso!');
					$('#'+id).css({'color':'#537283','font-weight':'bold', 'font-size':'120%'}).removeAttr('disabled','disabled');
				} else {
					//toastr["error"]('Tente novamente','Erro ao enviar seus dados!');
					$('#'+id).data('old', $('#'+id).val()).css('color','red').removeAttr('disabled','disabled');
				}
			}
		});	
	}
}