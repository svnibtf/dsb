//console.log('body = ', $('body').css('background-color'));
var color_footer = $('body').css('background-color');
function footer_pv10(){
	color_footer = $('body').css('background-color');
	$('.footer-pv10').html(
	'<div class="space5"></div>'+
	'<div class="fundo-footer">'+
	'<table class="table-footer table-pv10" border=0>'+
		'<tr>'+
			'<td align="left" width="14%"><a id="btn_voltar" class="btn btn-primary btn-voltar btn-sm" style="font-size:"small"><i class="fa fa-arrow-left">&nbsp;</i>Voltar</a></td>'+
			'<td align="center" width="22%"><a id="btn_iniciar" class="btn btn-danger btn-sm btn-iniciar" style="font-size:"small" href="page-dimensoes.html"><i class="fa fa-square">&nbsp;</i>Inicial/Menu</a></td>'+
			'<td width="4%"></td>'+			
			'<td width="20%" align="center"><a id="info_mat_vdo" class="no-display" style="text-decoration:none !important;"><img src="images/icones/info-geral-bckg-cinza.png" alt="info" class="img-responsive" style="margin-top:6px;max-height:28px; text-decoration:none !important;"></a></td>'+	
			'<td width="20%" align="center"><a id="info_whatsapp" class="" href="page-info-chat-hg.html" ><img src="images/icones/whatsapp_logo_icone.png" alt="whatsapp" class="img-responsive" style="margin-top:6px;max-height:30px;text-decoration:none !important;"></a></td>'+
			'<td width="20%" align="right"><img id="img_log_footer" src="images/elementos/drawable-ldpi/logo_m.png" alt="logo" class="img-logo-cliente"></td>'+
		'</tr>'+
	'</table></div>').attr('id','footer-pv10');
	$('.table-footer, .fundo-footer').css({'background-color':color_footer});

	footer_carregado = 1;
	if (typeof page !== 'undefined') {
  		logo_base(page);
	}	
}
footer_pv10();
setTimeout(function(){
	$('#info_mat_vdo img').css('background-color','transparent');
}, 100);

function logo_base(page){
	if(page == 'page-info-chat-hg.html.html'){
		$('#info_mat_vdo, #info_whatsapp, #btn_iniciar').addClass('no-display');
	}
	if(page == 'page-info-chat-hg-externa.html'){
		$('#info_mat_vdo, #info_whatsapp, #btn_iniciar, #btn_voltar').addClass('no-display');		
	}
}



