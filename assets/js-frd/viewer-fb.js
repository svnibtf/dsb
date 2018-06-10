// JavaScript Document
$('#fb_pv10').html('<span class="fb-comments-count" data-href=""></span> <!--awesome comments--> <a id="btn-fb" type="button" class="btn btn-success btn-block accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#fb-chat" onClick="fb_chat()"> <i class="icon-arrow"></i> Carregar comentários FB </a><div id="fb-chat" class="panel-collapse collapse"><div id="fb-root"></div><!--<div class="fb-like" data-href="http://accbr.com.br/prova10/chat-pageface/page-chat-face-prv-946684861-1.html" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>--><div id="fb-comments" class="fb-comments" data-href="" data-numposts="30" data-order-by="reverse_time" data-width="800"></div>');
mouse_over_element = '';
status_fb = 0;
fb_chat_on = false;
function fb_chat(){
	if($.trim($('#btn-fb').text()) === 'Carregar comentários FB'){
	///COMENTARIOS FACEBOOK///
	//dados_atv[0].chat_face
	var dados_face = ''
		$('#fb-comments, #fb-comments-count').attr('data-href',dados_face);
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6&appId=1635454356720649";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		reload_chat();
	}
	if ($.trim($('#btn-fb').text()) === 'Exibir Comentários' || $.trim($('#btn-fb').text()) === 'Carregar comentários FB'){
        $('#btn-fb').text('Fechar Comentários');
				$('#fb-comments').addClass('no-display');
				status_fb = 1;
    } else {
        $('#btn-fb').text('Exibir Comentários');
				$('#fb-comments').removeClass('no-display');
				status_fb = 0;
    }
		fb_chat_on = true;
}
function randon_time(min, max) {
	return Math.floor(Math.random() * (max - min + 1)) + min;
}
$('.fb-carregado').on('mouseover',function(e){
	if(status_fb == 1){
		pos_touch_scroll = scrollTop;
		console.log(mouse_over_element);
	}		
});

function reload_chat(){
	if(status_fb == 1){
		var time = randon_time(15000,30000);
		console.log('time = ', time);
		setTimeout(function(){
			if(mouse_over_element != 'IFRAME' && scrollTop<200){
					FB.XFBML.parse();	
				} else {
					if(pos_touch_scroll != scrollTop)mouse_over_element = '';
				}
			reload_chat();
		}, time);	
	}
}