function config_menu(dados_config,menu_open){
	for(index in dados_config['dados_menu']){
		var menu_id = dados_config['dados_menu'][index]['menu_id'];
		var nome_btn = dados_config['dados_menu'][index]['nome_btn'];
		var links = dados_config['dados_menu'][index]['links'];
		var grupo = dados_config['dados_menu'][index]['grupo'];
		var ordem = dados_config['dados_menu'][index]['ordem'];
		var status_ul = "fechado";
		var menu_ul;
		if(ordem == 0){
			menu_ul = 'ul_'+menu_id;
			$('#menu_left').append('<li id="'+menu_id+'"><a href="'+links+'" class="active"><span class="title"> '+nome_btn+' </span><i class="icon-arrow"></i></a><ul id="'+menu_ul+'" class="sub-menu"></ul></li>');
		}
		if(ordem>0){
			$('#'+menu_ul).append('<li id="'+menu_id+'"><a href="'+links+'"><span class="title"> '+nome_btn+' </span></a></li>');
		}
		if(ordem == -1){
			var icone = '<i class="fa fa-gear"></i>';
			if(dados_config['dados_menu'][index]['nome_btn'] == 'Mensagens'){
				icone = '<i class="fa fa-envelope-o"></i>';
			} else if(dados_config['dados_menu'][index]['nome_btn'] == 'Meu Perfil'){
				icone = '<i class="fa fa-user"></i>';
			} else if(dados_config['dados_menu'][index]['nome_btn'] == 'Alterar Senha'){
				icone = '<i class="fa fa-lock"></i>';
			}	
			$('#menu_left').append('<li id="'+menu_id+'"><a href="'+links+'">'+icone+'<span class="title"> '+nome_btn+' </span></a></li>');
		}			
	}
	$('#menu_left').append('</li>');
	if(dados_config['menus']['url_logo'] == 0){
		$('#logo_sb_left').addClass('no-display');
	} else {
		$('#logo_sb_left img').attr('src', 'img-config/'+dados_config['menus']['url_logo']);
	}
	if(dados_config['session_avatar']!= '' && dados_config['session_avatar']!=0){
			$('#avatar_sb_left img').attr('src', 'img-user/'+dados_config['session_avatar']);
	} else {
			$('#avatar_sb_left img').attr('src', 'img-user/anonymous.jpg');
	}
	if(dados_config['session_nome']!= ''){
		$('#user_nome_sb_left').html(dados_config['session_nome']);
	}
	menu_open = menu_open.toString();
	document.title = dados_config.menus.nome_sigla;
	if(menu_open != "menu"){
		var menu_open_itens = menu_open.split("_");
		if(menu_open_itens[2]>0){
			var menu_1 = 'm_'+ menu_open_itens[1].toString() +'_0_0';
			document.getElementById(menu_1).className = 'active open';
			document.getElementById(menu_open).className = 'active';			
		} else {
			if(menu_open != ''){
				document.getElementById(menu_open).className = 'active';
			}
		}
	}
}