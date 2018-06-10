var carregado_array = new Array();
var atv_lv_tp_temp 	= 0;
var origem_temp 		= 0;
var cont_carr = 0;
var imagem_carregar = 0
reload_lv = 0;
console.log('reload_lv ', reload_lv);
var corpo_lv = 
'<div id="vw_txt_p" class="clearfix"></div>'+
'<div id="vw_txt_t" class="clearfix"></div>'+
'<div id="vw_txt_alternativas">'+
'<div class="space15"></div>'+
'<div id="vw_r1" class="alternativa_frd space5 no_display_frd">'+
'	<table>'+
'		<tr>'+
'			<td><button id="vw_btn_r1" name="1" type="button" data-corr="A" class="btn btn-primary btn-xs btn-r" onClick="alternativa_correta(this)"><i class="fa fa-list"></i> A</button></td>'+
'			<td><span id="vw_txt_1" class="tab_frd"></span></td>'+
'	</table>'+
'</div>'+
'<div id="vw_r2" class="alternativa_frd space5 no_display_frd">'+
'	<table>'+
'		<tr>'+
'			<td><button id="vw_btn_r2" name="2" type="button" data-corr="B"  class="btn btn-primary btn-xs btn-r" onClick="alternativa_correta(this)"><i class="fa fa-list"></i> B</button></td>'+
'			<td><span id="vw_txt_2" class="tab_frd"></span></td>'+
'	</table>'+
'</div>'+
'<div id="vw_r3" class="alternativa_frd space5 no_display_frd">'+
'	<table>'+
'		<tr>'+
'			<td><button id="vw_btn_r3" name="3" type="button" data-corr="C"  class="btn btn-primary btn-xs btn-r" onClick="alternativa_correta(this)"><i class="fa fa-list"></i> C</button></td>'+
'			<td><span id="vw_txt_3" class="tab_frd"></span></td>'+
'	</table>'+
'</div>'+
'<div id="vw_r4" class="alternativa_frd space5 no_display_frd">'+
'	<table>'+
'		<tr>'+
'			<td><button id="vw_btn_r4" name="4" type="button" data-corr="D"  class="btn btn-primary btn-xs btn-r" onClick="alternativa_correta(this)"><i class="fa fa-list"></i> D</button></td>'+
'			<td><span id="vw_txt_4" class="tab_frd"></span></td>'+
'	</table>'+
'</div>'+
'<div id="vw_r5" class="alternativa_frd space5 no_display_frd">'+
'	<table>'+
'		<tr>'+
'			<td><button id="vw_btn_r5" name="5" type="button" data-corr="E" class="btn btn-primary btn-xs btn-r" onClick="alternativa_correta(this)"><i class="fa fa-list"></i> E</button></td>'+
'			<td><span id="vw_txt_5" class="tab_frd"></span></td>'+
'	</table>'+
'</div></div>'+
'<div class="space10"></div>'+
'<div id="vw_btn_so_alternativas" class="alternativa_frd no_display_frd">'+
'<table width="100%" cellspacing="2">'+
'	<tr>'+
'		<td><button id="vw_btn_sa_r1" name="1" type="button" data-corr="A"  class="btn btn-primary btn-xs btn-r" onClick="alternativa_correta(this)"><i class="fa fa-list"></i> A</button></td>'+
'		<td><button id="vw_btn_sa_r2" name="2" type="button" data-corr="B"  class="btn btn-primary btn-xs btn-r" onClick="alternativa_correta(this)"><i class="fa fa-list"></i> B</button></td>'+
'		<td><button id="vw_btn_sa_r3" name="3" type="button" data-corr="C"  class="btn btn-primary btn-xs btn-r" onClick="alternativa_correta(this)"><i class="fa fa-list"></i> C</button></td>'+
'		<td><button id="vw_btn_sa_r4" name="4" type="button" data-corr="D"  class="btn btn-primary btn-xs btn-r" onClick="alternativa_correta(this)"><i class="fa fa-list"></i> D</button></td>'+
'		<td><button id="vw_btn_sa_r5" name="5" type="button" data-corr="E"  class="btn btn-primary btn-xs btn-r" onClick="alternativa_correta(this)"><i class="fa fa-list"></i> E</button></td>'+
'	</tr>'+
'</table>'+
'<button id="vw_btn_timeout" name="6" type="button" data-corr="F"  class="btn btn-primary btn-xs btn-r no_display_frd" onClick="alternativa_correta(this)" disabled><i class="fa fa-list"></i></button>'+
'</div>'+
'<div id="resp_correta" class="no_display_frd space12"><a id="btn_resp_correta" class="btn btn-success btn-xs btn-block space5" onClick="alter_correta(name)">Ver alternativa correta</div></a>'+
'<button id="reload_quest" class="btn btn-blue btn-block" onClick="reload_lousa_virtual_db()"><i class="fa fa-refresh"></i> RECARREGAR</button>';

function lousa_virtual_db(atv_lv_tp,origem){
	atv_lv_tp_temp 	= atv_lv_tp;
	origem_temp 		=	origem;
	//console.log('carregado_array 1 = ', carregado_array);
	$('#corpo_tp').html(corpo_lv);
	toastr.remove();
	//toastr["info"]('Aguarde carregando dados!', "");
	console.log('atv_lv_tp = ',atv_lv_tp);
	$.ajax({
		url: "consulta-lousa-virtual-dados.php",
		type: "POST",
		dataType: "json",
		data:({
				acd_atp_num: atv_lv_tp
			}),
		success: function(json){
			lv_dados = json;
			//console.log('lv_dados = ',lv_dados);
			console.log('lv_dados = ',lv_dados['acd_atp_config']['acd_atp_id_num'], ' - ', lv_dados['acd_atp_config']['acd_atp_alter_corr']);
			//console.log('lv_dados = ',lv_dados['acd_atp_config']['acd_atp_id_num']);
			if(json == '' || json == null){				
				toastr['error']("Ocorreu algum erro ao carregar os seus dados dados. Verifique sua conexão e tente novamente, ou entre em contato conosco.",'ERRO: falha no acesso aos dados');
			} else {
				//toastr["success"]('Dados carregados .... ', '');
				montar_dados(lv_dados,atv_lv_tp, origem);
				pro_lv_tp = lv_dados['acd_atp_config']['acd_atp_alter_corr'];
				//console.log(json);
			}
		}		
	});
}
function montar_dados(lv_dados,atv_lv_tp, origem){
	carregado_array = new Array();
	cont_carr = 0;
	imagem_carregar = 0;
	if(lv_dados[0]['acd_atp_resp_tipo'] != 'vazio' && lv_dados[0]['acd_atp_resp_tipo'] != null){
		var resp_tipo_tp = '';
		if(lv_dados['acd_atp_config']['acd_atp_tipo_alternativas'] == 0){
			$('#vw_txt_alternativas').addClass('no_display_frd');
			$('#vw_btn_so_alternativas').removeClass('no_display_frd');
		} else if(lv_dados['acd_atp_config']['acd_atp_tipo_alternativas'] == 1) {
			$('#vw_btn_so_alternativas').addClass('no_display_frd');
			$('#vw_txt_alternativas').removeClass('no_display_frd');
		}
		for(var index in lv_dados){
			//console.log('CARREGADO!!!! viewer_lv.js  =  JAVASCRIPT 1');
			if(origem != null){
				//console.log('CARREGADO!!!! viewer_lv.js  =  JAVASCRIPT 2 DESAFIO_I = ', origem);
				if(origem === 'desafio_i'){
					//console.log('CARREGADO!!!! viewer_lv.js  =  JAVASCRIPT 3');
					$('#panel_tp, .main-content, body').css({'background-color':'#F36C00'});
					var txt_des_h = $('#corpo_tp').width();
					txt_des_h = 10*txt_des_h/16;
					$('.alternativa_frd').css({'background-color': 'white', 'border-color': '#d9534f'});
					$('.btn-r').removeClass('btn-primary');
					config_time = 0;
					draw_watch(config_time);
				} else if(origem === 'desafio_genio'){
					$('#panel_tp, .main-content').css({'background-color':'white'});
					if(reload_lv == 0){
						config_time = 0;
						draw_watch(config_time);
						reload_lv = 1;
					}
				}
			}
			if(index != 'acd_atp_config'){
				var resp_tipo = lv_dados[index].acd_atp_resp_tipo;
				var dados_tipo = lv_dados[index].acd_atp_dados_tipo;
				var class_item =lv_dados[index].acd_atp_class;
				var valor_item = lv_dados[index].acd_atp_item;
				if(valor_item != 'vazio_x_0'){
					if(dados_tipo == 'TEXTO'){
						var valor_item = '<span id="vw_'+index+'" class="'+class_item+' txt-item" data-order="'+lv_dados[index].acd_atp_order+'" data-dados_tipo="'+dados_tipo+'" data-resp_tipo="'+resp_tipo+'">'+valor_item+' </span>';
					} else if(dados_tipo == 'IMAGEM' || dados_tipo == 'EQUACAO' || dados_tipo == 'LINKPV10'){
						imagem_carregar = 1;
						carregado_array.push(0);
						if(class_item == 'img_inter_txt' || class_item == 'img_equacao' || class_item == 'img_equacao_gg'){
							var valor_item = '<span><img id="vw_car_'+index+'" src="images/icones/spinner.gif" class="'+class_item+'"><img id="vw_img_'+index+'" src="img-atv/'+atv_lv_tp+'/'+valor_item+'?'+(new Date()).getTime()+'" class="'+class_item+' no_display_frd" name="vw_car_'+index+'" onload="doneLoading(id,name)"/></span>';
						} else if(class_item == 'img_entre_txt'){
							var valor_item = '<div align="center" class="div_enter_txt"><img id="vw_car_'+index+'" src="images/icones/loading-1.gif" width="100%"><img id="vw_img_'+index+'" src="img-atv/'+atv_lv_tp+'/'+valor_item+'?'+(new Date()).getTime()+'" class="'+class_item+' no_display_frd" name="vw_car_'+index+'" onload="doneLoading(id,name)"/></div>';
						} else if(class_item == 'img_desafio_txt'){
							var valor_item = '<div align="center" class="div_enter_txt"><img id="vw_car_'+index+'" src="images/icones/loading-1.gif" width="100%" ><img id="vw_img_'+index+'" src="img-atv/'+atv_lv_tp+'/'+valor_item+'?'+(new Date()).getTime()+'" class="'+class_item+' no_display_frd" name="vw_car_'+index+'" onload="doneLoading(id,name)"/></div>';
						}	else if(class_item == 'linkpv10'){
							var valor_item = '<div align="center" class="div_enter_txt"><img id="vw_car_'+index+'" src="images/icones/loading-1.gif" width="100%"><img id="vw_img_'+index+'" src="'+valor_item+'?'+(new Date()).getTime()+'" class="'+class_item+' no_display_frd" name="vw_car_'+index+'" onload="doneLoading(id,name)"/></div>';
						}
					}
					if(resp_tipo == 'p')resp_tipo_tp = 'p';		
					if(resp_tipo == '1' || resp_tipo == '2' || resp_tipo == '3' || resp_tipo == '4' || resp_tipo == '5')exibir_alternativas = true;
					///////////////ESPAÇO RETIRADO PARA IMAGENS -- TIPO div_enter_txt ... <span>&nbsp;'+valor_item+'</span>//////////////////
					$('#vw_txt_'+resp_tipo).append('<span>'+valor_item+'</span>');
					$('#vw_r'+resp_tipo).removeClass('no_display_frd');
					if(resp_tipo == 'p' && origem === 'desafio_i' ){
							$('#vw_txt_p').addClass('txt_desafios').css({'max-height':'360px'});
							//console.log('txt_des_h 2 = ', txt_des_h);
					}
				}
			}
		}
		if(imagem_carregar == 1){				
				set_carregando = setTimeout(function(){ lousa_virtual_db(atv_lv_tp,origem);}, 3000);
			}
		if(origem == 'page_atv'){
			//$('#vw_btn_so_alternativas, #vw_txt_alternativas').addClass('no_display_frd');
			$('.btn-r').attr('disabled','disabled');
			$('#resp_correta').removeClass('no_display_frd');
			$('#btn_resp_correta').attr('name',lv_dados['acd_atp_config']['acd_atp_alter_corr']);			
		}
		if(origem === 'desafio_i' || origem === 'page_adm'){
			$('#vw_txt_p div').removeClass('div_enter_txt');
		}
		if(origem === 'desafio_genio'){
			$('#vw_txt_p').addClass('desafio_genio_p');
		}
	} else {
		$('#corpo_tp').html('NÃO HÁ DADOS RELACIONADOS A ESSE ITEM CADASTRADOS NESSA CONFIGURAÇÃO, OU A QUESTÃO NÃO FOI CONSOLIDADA NO MOMENTO DA GRAVAÇÃO<br>FAVOR INFORMAR AOS GESTORES.');
	}
	$('#carregando_dados').addClass('no_display_frd');
	//set_pos_alternativas();
	if(imagem_carregar == 0)$('#reload_quest').attr('disabled','disabled');
}

function set_pos_alternativas(){
	var valor_height = $(window).height() - 60;
	console.log('set_pos_alternativas ', valor_height);
	$('#vw_btn_so_alternativas').css({'top': valor_height});
	 console.log($(window).height());
}

function exibir_alternativas_sem_texto(exibir_alternativas){
	//console.log(exibir_alternativas);
}

function reload_lousa_virtual_db(){
	lousa_virtual_db(atv_lv_tp_temp,origem_temp);
	$('#reload_quest').attr('disabled','disabled');
	set_carregando = setTimeout(function(){$('#reload_quest').removeAttr('disabled');}, 3000); 
}
function alter_correta(e){
	toastr.options.timeOut = 1500;
	toastr['success'](e,"ALTERNATIVA CORRETA:");
	toastr.options.timeOut = 500;
}

function doneLoading(id,name){
	console.log('carregado_array 1 = ', carregado_array);
	carregado_array[cont_carr] = 1;
	console.log('carregado_array 2 = ', carregado_array);
	console.log('carregado_array = ', carregado_array.indexOf(0));
	if(carregado_array.indexOf(0) < 0){
		clearTimeout(set_carregando);
		console.log('carregado 1');
		$('#reload_quest').attr('disabled','disabled');
	} else {
		cont_carr ++;
	}
	$('#'+name).addClass('no_display_frd');
	$('#'+id).removeClass('no_display_frd');
	$('#'+id).removeAttr('onload');	 
}