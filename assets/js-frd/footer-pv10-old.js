//console.log('body = ', $('body').css('background-color'));
var color_footer = $('body').css('background-color');
function footer_pv10(){
	color_footer = $('body').css('background-color');
	$('.footer-pv10').html(
	'<div class="space5"></div>'+
'	<div class="fundo-footer">'+
'	<table class="table-footer table-pv10">'+
'		<tr>'+
'			<td align="left" width="16%"><a id="btn_voltar" class="btn btn-primary btn-voltar btn-sm" style="font-size:small"><i class="fa fa-arrow-left">&nbsp;</i>Voltar</a></td>'+
'			<td align="center" width="20%"><a id="btn_iniciar" class="btn btn-danger btn-sm btn-iniciar" style="font-size:small" href="page-inicial-ios-tablet-desktop.html"><i class="fa fa-square">&nbsp;</i>Inicial/Menu</a></td>'+
'			<td width="6%"></td>'+
				
'			<td width="20%" align="center"><a id="info_whatsapp" class="" onClick="viewChat()"><img src="images/icones/whatsapp_logo_icone.png" alt="whatsapp" class="img-responsive" style="margin-top:6px;max-height:28px;text-decoration:none !important;"></a></td>	'+
			
'			<td width="24%" align="center"><a id="info_mat_vdo" class="no-display" style="text-decoration:none !important;"><img src="images/icones/video_info_bco.png" alt="info" class="img-responsive" style="margin-top:6px;max-height:32px;text-decoration:none !important;"></a></td>'+	
			
'			<td width="24%" align="right"><img id="img_log_footer" src="images/elementos/drawable-ldpi/logo_m.png" alt="logo" class="img-logo-cliente"></td>'+
'		</tr>'+
'	</table></div>').attr('id','footer-pv10');
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
	var trocar_logo = 0;
	if(page == 'index-ios-tablet-sesi.html') trocar_logo = 1; 
	if (typeof dados_config !== 'undefined')if(dados_config["session_mat_cp_id"] == '2') trocar_logo = 1;
	if(trocar_logo == 1){
		$('#img_log_footer').attr('src', 'images/images/elementos/sesi-10-anos.png');
		if($('body').css('background-color') === 'rgb(255, 255, 255)'){
			$('#img_log_footer').attr('src', 'images/elementos/sesi-10-anos-azul.png');
			$('body').css({'border-left': '1px solid #D9D9D9', 'border-right': '1px solid #D9D9D9'});
		} else {
				$('#img_log_footer').attr('src', 'images/elementos/sesi-10-anos-amarelo.png');
		}
	}
	if(page == 'page-estrategia-desafio-individual-gestao.html'){
		$('#btn_iniciar').addClass('no-display');
	}
}

//var $_PowerZAP = { defaultCountry: '+55', widget_id: '2355', company: "7316" }; (function(i,s,o,g,r,a,m){ i[r]={context:{id:'6c74533e0fe50349d5a0af9811bd2244'}};a=o;o=s.createElement(o); o.async=1;o.src=g;m=s.getElementsByTagName(a)[0];m.parentNode.insertBefore(o,m); })(window,document,'script','https://w-cdn.huggy.io/widget.min.js?v=6.12.1','pwz');

var cont = 0;
function viewChat(){
/*	console.log('viewChat');
	if(cont%2 == 0){
		$('.powerzap_open_button_iframe').addClass('no-display');
	} else {
		$('.powerzap_open_button_iframe').removeClass('no-display');
	}
	cont++;*/
}

//function posChat(){
//	console.log('posChat');
//	$('.powerzap_open_button_iframe').css('margin-bottom', '36px');
//}

//viewChatTime = setInterval(posChat, 3000);



