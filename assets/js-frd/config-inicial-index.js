parent.scroll(0,0);
function CONFIG() {
		get_url = {};
		var url_local = window.location.href;
		url = url_local.replace(/#/g, "");
		if(url_local.indexOf("?")>-1){
			var location_search = url_local.substring(1).split('?');
			var parts = location_search[1].substring(0).split('&');
			for (var i = 0; i < parts.length; i++) {
				var nv = parts[i].split('=');
				if (!nv[0]) continue;
				get_url[nv[0]] = nv[1] || true;
			}
		}
		email 		= get_url.login;
		senha 		= get_url.senha;
		uri = '';
		var origem_url = '';
		if(window.location.host == ''){
			uri = 'http://prova10.com.br/';
			origem = 'mobile';
		} else if (window.location.host == 'localhost'){
			uri = '/padrao_rapido/';
			url_local = '/padrao_rapido/';
			origem_url = 'localhost';
		} else {
			uri = '';
			url_local = '';
			origem_url = 'web';
		}
}