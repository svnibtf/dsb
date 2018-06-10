$('#carregando_pv10').html(
'<div class="div_carreg">'+
'	<div class="div_carreg_bar">'+
'  <div id="carreg_per" class="div_carreg_per"></div>'+
'  </div>'+
'  <p class="div_carreg_txt" >Carregando</p>'+
'</div>'+);
e = document.getElementsByClassName('div_carreg_per');
function callback_CARREGANDO(){
    if(dados_config != ''){
			var dados = true;
    } else {
			var dados = false;
			carregando ++;
			if(carregando > 90)carregando = 30;
			e[0].style["width"] = carregando+'px';
		}
		return console.log(dados);
}
function callback_CARREGADO(){
	carregando = 100;
	$('.div_carreg_per').css({'width':carregando});
	clearInterval(call);
	$('#pg_pv10').removeClass('no-display');
	$('.div_carreg').addClass('no-display');
}
call = setInterval(callback_CARREGANDO, 100);