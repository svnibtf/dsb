var timer;
var timerCurrent = 0;
var timerSeconds = 60;
var timerFinish = 0;
var tempo_desafio = 0;
var timerSeconds;
function drawTimer(percent){
	$('.timer').html('<div id="slice"'+(percent > 50?' class="gt50"':'')+'><div class="pie"></div>'+(percent > 50?'<div class="pie fill"></div>':'')+'</div>');
	var deg = 360/100*percent;
	$('#slice .pie').css({
		'-moz-transform':'rotate('+deg+'deg)',
		'-webkit-transform':'rotate('+deg+'deg)',
		'-o-transform':'rotate('+deg+'deg)',
		'transform':'rotate('+deg+'deg)'
	});
	if(deg >120)$('#slice .pie').css({'background-color': 'yellow'});
	if(deg >240)$('#slice .pie').css({'background-color': 'red'});
}

function draw_watch(config_time){
	if(config_time == 0){
		clearInterval(timer);
		timer = setInterval(draw_watch, 301);
		timerFinish = new Date().getTime()+(timerSeconds*1000);
		timerIni = new Date().getTime();
		config_time++;
		tempo_desafio = 0;
		percent = 0;
	}
	var seconds = (timerFinish-(new Date().getTime()))/1000;
	tempo_desafio = ((new Date().getTime())-timerIni)/1000;
	if(seconds < 0){
		drawTimer(500);
		clearInterval(timer);
		timer = setInterval(tempo_excedido, 300);
	}else{
			var percent = 100-((seconds/timerSeconds)*100);
			drawTimer(percent);
	}
}

var contador_te = 0;
function tempo_excedido(){
		tempo_desafio = ((new Date().getTime())-timerIni)/1000;
		if(contador_te % 3 == 0){	
			$('#slice .pie').css({'background-color': '#5cb85c'});
		} else if(contador_te % 3 == 1){	
			$('#slice .pie').css({'background-color': 'yellow'});
		} else if(contador_te % 3 == 2){	
			$('#slice .pie').css({'background-color': 'red'});
		}
		contador_te++;
		if(contador_te > 10){
			$('#vw_btn_timeout').trigger('click');
			contador_te = 0;
		}
}