//$('#debug').append('config-inicial - Versão 99999999999999999999999999999999999999');

parent.scroll(0,0);
//////////CONFIG DIMENSOES //////////
//$('#debug').append('<br> inicial - 13');
		get_url = {};
		var url = window.location.href;
		url = url.replace(/#/g, "");
		var location_search = url.split('/');
		var ultimoElemento = location_search.length - 1;
		page = location_search[ultimoElemento];
		index_acesso = url.indexOf("index");
		if(url.indexOf("?")>-1){
			var location_search = url.substring(1).split('?');
			url_base = location_search[0];
			//console.log('url_base = ', url_base);
			var location_search_page = url_base.split('/');
			var ultimoElemento = location_search_page.length - 1;
			page = location_search_page[ultimoElemento];
			var parts = location_search[1].substring(0).split('&');
			for (var i = 0; i < parts.length; i++) {
				var nv = parts[i].split('=');
				if (!nv[0]) continue;
				get_url[nv[0]] = nv[1] || true;
			}
		}
		var pagina_arr = page.split('.');
		///////////get_url['VARIAVEL NA URL']///////////////////////////////
		//console.log('origin = ', get_url['origin']);
		
		///////////////	EMDEREÇO DA PAGINA DO AVATAR AUDIO E FLUXO //////////
		url_audio = pagina_arr[0];
		console.log('url_audio = ', url_audio);
		///////////////	EMDEREÇO DA PAGINA DO AVATAR AUDIO E FLUXO //////////
		//console.log('\n\n location_search_page - page = ', page);
		menu_open 			= get_url.a; 						//////SEM ELE NÃO CARREGA A PÁGINA ///////
		mobile			 		= get_url.mobile;				//////NUM ATIVIDADE - PRINCIPAL: page-atv ///////
		fb			 				= get_url.fb;						//////visualização do facebook => zero == nao ///////
		video			 			= get_url.video					//////VISUALIZAÇÃO DO CAPÍTULO - PRINCIPAL: page-cap ///////
		cap_tp		 			= get_url.cap_tp				//////VISUALIZAÇÃO DO CAPÍTULO - PRINCIPAL: page-cap ///////
		tp							=	get_url.tp						//////TIPO DE CADASTRO PROFESSOR ALUNO - PRINCIPAL:
		tit_info				=	get_url.tit_info//////VDO informação:  page-dim-1.php ///////
///////
		tit_dim				=	get_url.tit_dim//////VDO informação:  page-dim-passo-1.php ///////
///////	

////////// DIMENSOES DADOS ////////////
id_dim_item_meta = "";
per_valor = "";
dim = "";
dims="";
dim_id ="";
origin = get_url['origin'] ////////// ACESSO AO MENU SIM/NÃO ////////////
console.log('tit_dim = ', tit_dim);	
var uri 				= '';
var origem_url 	= '';
/////////FACEBOOK VIEW///////
////////URLS////////////////
if(window.location.host == 'prova10.com.br'){
	uri = 'http://prova10.com.br/';
	url_host = 'http://accbr.com.br/';
	origem = 'mobile';
} else if (window.location.host == 'localhost'){
	uri = '../';
	url_host = '/accbr/';
	origem_url = 'localhost';
} else {
	uri = '';
	url_host = 'http://accbr.com.br/';
	origem_url = 'web';
}
if(index_acesso < 0){
	console.log('uri = ', uri);
	$.ajax({
	url: uri + "include/config_functions.php",
	type: "POST",
	dataType: "json",
	data:({
		page						: page,
		origem 					: origem_url,
		url_host				: url_host,
		desenvolvimento : desenvolvimento,
				}),
	success: function(json){
		dados_config = json;
		console.log(dados_config);
		
		}				
});
