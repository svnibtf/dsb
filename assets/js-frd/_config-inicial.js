//$('#debug').append('config-inicial - Versão 99999999999999999999999999999999999999');

parent.scroll(0,0);
//////////CONFIG DIMENSOES //////////
//$('#debug').append('<br> inicial - 13');
var page = '';
var url_base = '';
var url_audio = '';
function CONFIG() {
		get_url = {};
		var url = window.location.href;
		url = url.replace(/#/g, "");
		var location_search = url.split('/');
		var ultimoElemento = location_search.length - 1;
		page = location_search[ultimoElemento];
		var index_acesso = 0;
		if(url.indexOf("index")>-1){
			index_acesso = url.indexOf("index");
			//console.log('url.indexOf ', url.indexOf("index"));
		}
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
		///////////////	EMDEREÇO DA PAGINA DO AVATAR AUDIO E FLUXO //////////
		url_audio = pagina_arr[0];
		console.log('url_audio = ', url_audio);
		///////////////	EMDEREÇO DA PAGINA DO AVATAR AUDIO E FLUXO //////////
		//console.log('\n\n location_search_page - page = ', page);
		menu_open 			= get_url.a; 						//////SEM ELE NÃO CARREGA A PÁGINA ///////
		num_acd_atp 		= get_url.acd_atp_num;	//////NUM ATIVIDADE - PRINCIPAL: page-atv ///////
		tipo_acd_atp 		= get_url.tipo;					//////NUM ATIVIDADE - PRINCIPAL: page-atv ///////
		disc_id			 		= get_url.disc_id;			//////VISUALIZAÇÃO DISCIPLINA - PRINCIPAL: page-atv ///////
		atv_id					= get_url.atv;					//////VISUALIZAÇÃO DISCIPLINA - PRINCIPAL: page-atv ///////
		id_curso_aula		= get_url.id_curso_aula;//////VISUALIZAÇÃO DISCIPLINA - PRINCIPAL: page-atv-curso-aula ///////
		area						= get_url.area;					//////VISUALIZAÇÃO DISCIPLINA - PRINCIPAL: page-atv-curso-aula ///////
		num_ordem				= get_url.num_ordem;		//////VISUALIZAÇÃO DISCIPLINA - PRINCIPAL: page-atv-curso-aula ///////
		date_gravacao		= get_url.date_gravacao;//////VISUALIZAÇÃO DISCIPLINA - PRINCIPAL: page-atv-curso-aula ///////
		mobile			 		= get_url.mobile;				//////NUM ATIVIDADE - PRINCIPAL: page-atv ///////
		fb			 				= get_url.fb;						//////visualização do facebook => zero == nao ///////
		cap_id			 		= get_url.cap_id				//////VISUALIZAÇÃO DO CAPÍTULO - PRINCIPAL: page-cap ///////
		video			 			= get_url.video					//////VISUALIZAÇÃO DO CAPÍTULO - PRINCIPAL: page-cap ///////
		cap_tp		 			= get_url.cap_tp				//////VISUALIZAÇÃO DO CAPÍTULO - PRINCIPAL: page-cap ///////
		hab_id					=	get_url.hab_id				//////VISUALIZAÇÃO DO CAPÍTULO - PRINCIPAL: page-cap ///////
		myidhelp				=	get_url.myidhelp			//////ID PARA AJUDA RECLAMAÇÃO DOS USUÁRIOS page-ajudenos-inicial.html///////
		tp							=	get_url.tp						//////TIPO DE CADASTRO PROFESSOR ALUNO - PRINCIPAL:
		tit_info				=	get_url.tit_info//////VDO informação:  page-info-mat-vdo.php ///////
		//tit_info = decodeURIComponent(tit_info);
		info_mat_vdo_1	=	get_url.info_mat_vdo_1//////VDO informação:  page-info-mat-vdo.php ///////
		info_mat_vdo_2	=	get_url.info_mat_vdo_2//////VDO informação:  page-info-mat-vdo.php ///////
		trilha_desafio	=	get_url.trilha_desafio//////VDO informação:  page-estrategia-desafio-individual.html ///////		
		var uri 				= '';
		var origem_url 	= '';
		/////////FACEBOOK VIEW///////
		if(fb != null && fb !=0){
			load_SCRIPTS("assets/js-frd/viewer-fb.js", function(){});
		}
		if(video != null && video == 0){
			//document.getElementById('videos_pv').remove();
			$('#videos_pv').addClass('no_display_frd');
		}
		////////URLS////////////////
		if(window.location.host == 'prova10.com.br'){
			uri = 'http://prova10.com.br/';
			url_host = 'http://prova10.com.br/';
			origem = 'mobile';
		} else if (window.location.host == 'localhost'){
			uri = '';
			url_host = '/padrao_rapido/';
			origem_url = 'localhost';
		} else {
			uri = '';
			url_host = 'http://prova10.com.br/';
			origem_url = 'web';
		}
		desenvolvimento = false;
		$.ajax({
		url: uri + "include/config_functions.php",
		type: "POST",
		dataType: "json",
		data:({
			page			: page,
			origem 			: origem_url,
			url_host		: url_host,
			desenvolvimento : desenvolvimento,
					}),
		success: function(json){
			dados_config = json;
			console.log(dados_config, menu_open);
			if(dados_config["session_mat_cp_id"] == 2){
				if(page != 'page-inicial-app-ios-superliga-bloqueio.html'){
					//console.log(dados_config, menu_open);
					//window.open('page-inicial-app-ios-superliga-bloqueio.html',"_self");
				}
			}
			if (typeof footer_carregado !== 'undefined') {
  			logo_base(page);	
			}
			console.log('dados_config[REDIRECT] = ', dados_config["REDIRECT"]);
			if(typeof dados_config["REDIRECT"] !== 'undefined'){
				if(dados_config["REDIRECT"] != '0'){		
					window.open(dados_config["REDIRECT"],"_self");
				}
			}
			console.log('page = ', page.indexOf('index'));
			if(json[0] == 'erro' && page.indexOf('index') < 0) {				
				//window.open('index-ios-tablet-desktop.html',"_self");
			} else {
				//ghabriela.sebastiao@sesisenaipr.org.br  id = 100096		
//				if(dados_config['session_permissao_id'] < 70 && dados_config['session_id'] != 100096 && dados_config['session_id'] != 99 && index_acesso == 0){
//					var url = 'index-mensagem-inicio-17.php';
//					window.open(url,'_self');
//				}
			}
		}				
	});
}

function reload(){
	var url = window.location.href;
	window.open(url,"_self");
}

function getBrowser() {
	var navegador = '';
	 if((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1 ) {
			navegador = 'opera';
	} else if(navigator.userAgent.indexOf("Safari") != -1){
			navegador = 'Safari';
	} else if(navigator.userAgent.indexOf("Chrome") != -1 ){
			navegador = 'Chrome';
	} else if(navigator.userAgent.match('CriOS')){
			navegador = 'Chrome';
	} else if(navigator.userAgent.indexOf("Firefox") != -1 ) {
			 navegador = 'Firefox';
	} else if((navigator.userAgent.indexOf("MSIE") != -1 ) || (!!document.documentMode == true )){//IF IE > 10  
		navegador = 'IE'; 
	} else {
		 navegador = 'vazio';
	}
	return navegador;
}

console.log('navegador = ', getBrowser());

//$('#debug').append('<br> navegador = ', getBrowser());///////////////////////////////

if(getBrowser() != 'Chrome'){
	$('#tipo_browser').html('APP DESENVOLVIDO PARA <br>O NAVEGADOR GOOGLE CHROME <br><strong>O acesso de outro navegador está sujeito a erros</strong><br>').removeClass('no-display');
}


var last_page = document.referrer;
if(last_page.search('cap_tp=desafio_i') > -1){
	last_page = 'http://prova10.com.br/page-estrategia-desafio-individual.html';
}
var padrao_height_b;
function BTNS(divisao, origem){
	if(origem == 'inicial'){
		$('#btn_voltar, #btn_iniciar').addClass('no-display');
	}
	var espaco_tabela = 0;
	var pad_footer_l = 4;
	var pad_footer_r = -10;
	var footer_img	=	50;
	var footer_pv10 = 44;
	var padrao_height = $(window).height()-footer_pv10;
	if($(window).width()>999){
		$('body').width(400);
		padrao_height = 640 -footer_pv10;
	} else {
		$('body').css({'width': '100%', 'max-width':'768px'});
	}
	var fundo_footer_w = $('body').width();
	if(origem == 'cap' || origem == 'atv'){
		$('.main-content').css({'min-height':'0px'});
		padrao_height_b  = padrao_height + 30;
		setTimeout(function(){
			$('body').height(padrao_height_b);
		}, 2000);		
	}
	if(origem != 'cap' || origem != 'atv'){
		$('footer').remove();
		$('body').height(padrao_height+6);
		$('.fundo-footer').css({'max-width':fundo_footer_w});
		if(divisao > 2){
			footer_img	=	96;
			var padrao_btns_height = padrao_height-footer_img-(divisao*espaco_tabela);
		} else {
			var padrao_btns_height = padrao_height-footer_img;
		}
		$('.footer-pv10').css({'top': padrao_height});
		$('.table-pv10').css({'border-spacing': espaco_tabela,'padding-left':pad_footer_l,'padding-right':pad_footer_r});
		$('.btn-divisao-h').height(padrao_btns_height/divisao);
		if(origem == 'inicial'){
			padrao_btns_height = padrao_btns_height - $('#divisao_desafio').height() - 10;
			$('.btn-divisao-h').height(padrao_btns_height/divisao);
		}
		var percent = 0.7;
		if(divisao == 2 && padrao_height < 550){percent = 0.5};
		$('.img-dados').height(padrao_btns_height*percent/divisao).css('max-height','172px');
		if(last_page.indexOf("page-batalha-genio.html")>-1){
			$('#btn_voltar').attr('href', 'javascript:window.history.go(-3)');
		} else {
			$('#btn_voltar').attr('href', 'javascript:history.back()');
		}
	}
	///////SLIDER PRE LANCAMENTO ////////////
	var carousel_w = $('body').width();
	$('.container, .container-topo').css('width',carousel_w);
}

$(window).resize(function() {
	if(num_btn > -1){
		BTNS(num_btn, 'padrao');
		$('#btn_voltar').attr('href', last_page);
	}
});

function load_SCRIPTS(url, callback){
    var script = document.createElement("script")
    script.type = "text/javascript";
    if (script.readyState){  //IE
        script.onreadystatechange = function(){
            if (script.readyState == "loaded" ||
                script.readyState == "complete"){
                script.onreadystatechange = null;
                callback();
            }
        };
    } else {  //Others
        script.onload = function(){
            callback();
        };
    }
    script.src = url;
    document.getElementsByTagName("head")[0].appendChild(script);
}
//// PARA ESSA FUNÇÃO FUNCIONAR A PÁGINA DEVERÁ CONTER:
//// Após do panel-body
//// <div id="page_transicao"> 
//// <a id="btn_vlt" type="button" class="btn-sm no-display" onClick="avc_page('-1')"><i class="fa fa-arrow-left"></i></a> 
//// <a id="btn_avc" type="button" class="btn-sm" onClick="avc_page('1')"><i class="fa fa-arrow-right"></i></a> 
//// <button id="btn_inf" type="button" class="btn-sm" data-toggle="collapse" data-target="#inf_sel_valores"><i class="fa fa-info-circle fa-2x"></i></button>
//// e os array no jQuery(document).ready(function() {
////	inf_seq_div_array = [1, 0, 0 ... n]; zro não um sim para visualizar
////	seq_div_array = ['id_div_1', 'id_div_2', 'id_div_3' ... n];

var page_pos = 0;
var controle_avatar_view = 0;
function avc_page(id, otr){
	//console.log('id ', id);	
	$('.'+otr).addClass('no-display');
	page_pos += parseInt(id);
	////////////////////////////////// StartAvatar(); ////////////////////////
	var v = page_pos+1;
	if(inf_seq_div_array[page_pos]){
		var id_inf = '#inf_'+ seq_div_array[page_pos];
		$('#btn_inf').attr('data-target',id_inf).removeClass('no-display');
		//console.log(id_inf);
		$(id_inf).removeAttr('class').addClass('text-blue text-center btn-inf collapse');
	} else {
		$('#btn_inf').addClass('no-display');
	}
	if(page_pos > -1 && parseInt(id) !== 0){
		$('#btn_vlt, #btn_avc').removeClass('no-display');
		if(id>0){
			div_out = seq_div_array[(page_pos-1)];
			div_in = seq_div_array[(page_pos)];
		} else {
			div_in = seq_div_array[(page_pos)];
			div_out = seq_div_array[(page_pos+1)];
		}
		$('#page_transicao').addClass('fadingEffect');
		var color_fadingEffect = $('body').css('background-color');
		$('.fadingEffect').css({'background-color':color_fadingEffect});
		setTimeout(function(){
		$('#'+div_out).addClass('no-display');
		$('#'+div_in).removeClass('no-display');
	}, 100);
		$('#page_transicao').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', 	function(e) {
			$('#page_transicao').removeClass('fadingEffect');
		});
	} 
	if(page_pos <= 0 || parseInt(id) === 0) {
		$('#btn_vlt').addClass('no-display');
		page_pos = 0;
	}
	if(page_pos > (seq_div_array.length -2)) {
		$('#btn_avc').addClass('no-display');
	}
	////PAGINAS COM AÇÕES ESPECIFICAS////
	if(seq_div_array[page_pos] === 'res_set_curso'){
		//res_set_curso_db();
	}
	controle_avatar_view = page_pos;
	console.log('controle_avatar_view  config', page_pos);	
}

var recuo_menu = '-200px';
function menu() {
	console.log('img_direto_pto = ', $('#img_direto_pto').height());
	var hgt_menu_icon = $('#img_direto_pto').height()+8;
	var pdd_menu_icon = (-10+hgt_menu_icon/2)+'px';
	$('.nav-toggle').height(hgt_menu_icon).css('padding-top', pdd_menu_icon );
	$('.nav-toggle').click(function() {
		if($(".nav").hasClass("side-fechado")) {
			$('.nav').animate({
					left: "0px",
			}, 150, function() {
					$(".nav").removeClass("side-fechado");
			});
		}
		else {
			$('.nav').animate({
					left: recuo_menu,
			}, 150, function() {
					$(".nav").addClass("side-fechado");
			});
		}
	});
	$('#btn_menu').html('<i class="fa fa-bars" aria-hidden="true"></i>');
}

//Menu Sidebar
$(window).resize(function() {
	var tamanhoJanela = $(window).width();
	$(".nav-toggle").remove();
	
	if (tamanhoJanela < 4000) { 
		$('.nav').css('left', recuo_menu).addClass('side-fechado');
		$('.nav').append( "<div id='btn_menu' class='nav-toggle'><strong>...</strong></div>" );
	} else {
		$('.nav').css('left', '0px').addClass('side-fechado');
	}	
	menu();
});

$(document).ready(function() {
	if(page == 'page-inicial-ios-tablet-desktop.html'){
		var url1 = '#';
		var item1 = 'Cursos/seviços';
		var url2 = 'https://www.facebook.com/prova10';
		var item2 = 'Face 10';
		var url3 = 'http://blog.prova10.com.br/';
		var item3 = 'Blog 10';
		var url4 = 'http://prova10.com.br/page-ajudenos-inicial.html';
		var item4 = 'Ajude-nos';
		var url5 = 'http://prova10.com.br';
		var item5 = 'CONTATOS';
		var url6 = 'http://prova10.com.br/page-ajudenos-inicial.html';
		var item6 = 'Reclame aqui';
		var url7 = 'https://www.youtube.com/channel/UCHW4VV-x9Po2FQdJ9MFMd6g';
		var item7 = 'YouTube';
		var url8 = '';
		var item8 = '';
		var url9 = '';
		var item0 = '';
		var menu_frd = '<nav id="menu_esq_frd" class="nav nav-aberta">'+
											'<div class="wrap">'+
												'<ul class="listaNav"><li style="color:white">MENU</li>';
												
		if(url1 != '' && item1 != '')menu_frd += '<li><a href="'+url1+'" onClick="change_menu()" >'+item1+'</a></li>';
		if(url2 != '' && item2 != '')menu_frd += '<li><a href="'+url2+'" onClick="change_menu()" target = "_blank">'+item2+'</a></li>';
		if(url3 != '' && item3 != '')menu_frd += '<li><a href="'+url3+'" onClick="change_menu()" target = "_blank">'+item3+'</a></li>';
		if(url4 != '' && item4 != '')menu_frd += '<li><a href="'+url4+'" onClick="change_menu()" >'+item4+'</a></li>';
		if(url5 != '' && item5 != '')menu_frd += '<li><a href="'+url5+'" onClick="change_menu()"  target = "_blank">'+item5+'</a></li>';
		if(url6 != '' && item6 != '')menu_frd += '<li><a href="'+url6+'" onClick="change_menu()"  target = "_blank">'+item6+'</a></li>';
		if(url7 != '' && item7 != '')menu_frd += '<li><a href="'+url7+'" onClick="change_menu()" target = "_blank">'+item7+'</a></li>';
		if(url8 != '' && item8 != '')menu_frd += '<li><a href="'+url8+'" onClick="change_menu()" >'+item8+'</a></li>';
		if(url9 != '' && item9 != '')menu_frd += '<li><a href="'+url9+'" onClick="change_menu()" >'+item9+'</a></li>';
		menu_frd += '</ul></div></nav>';
		$('body').append(menu_frd);
		var tamanhoJanela = $(window).width();
		$(".nav-toggle").remove();
		
		if (tamanhoJanela < 4000) { 
			$('.nav').css('left', recuo_menu).addClass('side-fechado');
			$('.nav').append( "<div id='btn_menu' class='nav-toggle'><strong>...</strong></div>" );
		} else {
			$('.nav').css('left', '0px').addClass('side-fechado');
		}		
		menu();
	}
});

function change_menu(){
	console.log(".nav-toggle");
	$(".nav-toggle").trigger('click');
}

CONFIG();
