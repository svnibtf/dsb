function enviar_dados(){
	$('#retorno_post').removeClass('no_display_frd');
	var nome = document.getElementById('nome_contato').value;
	var email = document.getElementById('email_contato').value;
	var mensagem = document.getElementById('mensagem_contato').value;
	if(nome != '' && email != '' && mensagem != ''){ 
	$('#retorno_post').html('<i class="fa fa-spinner fa-spin"></i>&nbsp; Aguarde enviando email.');
	$.ajax({
		type: "POST",
		url: "php/contato2.php",
		data: ({
			nome: nome, 
			email: email,
			mensagem: mensagem,
			}),
		success: function(data)
		{
			$('#retorno_post').html(data);
			console.log(data);
		}
	});

	}else{
		$('#retorno_post').html('Obrigatório preencher todos os campos');
	}
	return false;
}

$('.show-tab').on('click', function(e) {
	e.preventDefault();
	var tabToShow = $(this).attr("href");
	if ($(tabToShow).length) {
		$('a[href="' + tabToShow + '"]').tab('show');
	}
	$('a[href="#' + getParameterByName('tabId') + '"]').tab('show');
});