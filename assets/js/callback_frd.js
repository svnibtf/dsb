// JavaScript Document
function enable_bts(){
	document.getElementById("opcoes_metas").disabled = false;
}

function reloadPage(url){
	window.open(url,"_self",false);
}

function reloadPage2(){
	var url = document.getElementById("linkpage").innerHTML;
	abreURL(url,'GET','ajax-content');
}


function abreURL(url,metodo,onde){
   if(metodo=='POST'){
	  // metodo post
	   $.post(url, function(data) {
	  // página do carregador (loading)
	   $("#carregador").show();
	   $( "#"+onde).load(url);
	  });
   }
   else if(metodo=='GET'){
	  // metodo get
	  $.get(url, function(data) {
	 // página do carregador (loading)
	  $("#carregador").show();
	 $("#"+onde).load(url);
	});
  }
}

var param_url = {};
function location_search_func (url){
		var location_search = url.substring(1).split('?');
		var parts = location_search[1].substring(0).split('&');
		for (var i = 0; i < parts.length; i++) {
			var nv = parts[i].split('=');
			if (!nv[0]) continue;
			param_url[nv[0]] = nv[1] || true;
		}
//		console.log('param_url-index-param_url.log = ' + param_url.log);
//		console.log('param_url-index-param_url.adm_page = ' + param_url.adm_page);
//		console.log('param_url-index-param_url.pos_sug = ' + param_url.pos_sug);
}

function scape_ce(field) {
	var numCaracInicial = field.length
	field = field.replace(/[{};\\'<>^$|]/g, "");
	var numCaracFinal = field.length
	var badword = new Array(" select","select "," insert"," update","update "," delete","delete "," drop","drop "," destroy","destroy ", ".php", ".html", "  ");
	for(var index in  badword){
		if(field.search(badword[index]) > -1){
			field = field.replace(badword[index],"");
		}
	}
	if(numCaracInicial != numCaracFinal){
	alert('Foram retirados os caracteres especias do seu texto para segurança do sistema, se concluir que seu texto foi comprometido, reescreva e envie novamente');
	}
	return field;
}


var arrayDia = new Array(7);
arrayDia[0] = "Domingo";
arrayDia[1] = "Segunda";
arrayDia[2] = "Terça";
arrayDia[3] = "Quarta";
arrayDia[4] = "Quinta";
arrayDia[5] = "Sexta";
arrayDia[6] = "Sábado";
 
var arrayMes = new Array(12);
arrayMes[0] = "Janeiro";
arrayMes[1] = "Fevereiro";
arrayMes[2] = "Março";
arrayMes[3] = "Abril";
arrayMes[4] = "Maio";
arrayMes[5] = "Junho";
arrayMes[6] = "Julho";
arrayMes[7] = "Agosto";
arrayMes[8] = "Setembro";
arrayMes[9] = "Outubro";
arrayMes[10] = "Novembro";
arrayMes[11] = "Dezembro";