var VDModal = function() {
	"use strict";
var initVideo = function() {
	var content_w = $('body').width() - 120;
	var valor_width = content_w < 760 ? content_w : 760;
//	console.log('content_w - 22 = ', content_w);
//	console.log('valor_width = ', valor_width);
	var valor_height = valor_width*9/16;
	$('#panel-atv-pv').data('width',content_w);
	$('#frame_pv').width(valor_width).height(valor_height);
	$('#modal_body').css({'padding': '4px 2px'});
	$('.modal-footer').css({'padding': '4px 20px'});
};
return {
		init : function() {
			initVideo();
		}
	};
}();

scrollTop = 0;
$(function() {
	$(window).scroll(function(){
		scrollTop = $(window).scrollTop(); // qto foi rolado a barra
		var content_w = $('.main-content').width();
		if(scrollTop > 1){
			$('#icon_video').css({'position' : 'absolute', 'margin-top' : scrollTop + 2, 'margin-left':content_w-100});
		}               
	});
});

$(window).on('show.bs.modal', function() {
	$('body').removeClass('modal-open');
	video_interval = setInterval(set_video, 200);
});
$(window).on('hide.bs.modal', function() {
	$('#set_video').height(0);
});

function set_video(){
	var content_w = $('body').width() - 30;
	var panel_video_w = content_w < 760 ? content_w : 760;
	var window_video_w = $(window).width();
	//var window_video_w = content_w;
	var valor_height = panel_video_w*9/16;
//	console.log('window_video_w-77 = ', window_video_w);
//	console.log('content_w = ', content_w);
//	console.log('panel-atv-pv ',panel_video_w);
//	console.log('valor_height ',valor_height);
	var margin_left_pv = (window_video_w - content_w)/2
	var top_modal = '0';
	if(window_video_w <= 760){
			$('.star').css({'font-size':'1.4em'});
		if(window_video_w <= 300){
			$('.star').css({'font-size':'1.0em'});
		}
		var left_modal = 0;
	} else if (window_video_w > 760 && window_video_w < 992){
		var left_modal = margin_left_pv +'px';
		$('.star').css({'font-size':'2.0em'});
	} else{
		var left_modal = 236 + margin_left_pv +'px';
		$('.star').css({'font-size':'1.8em'});
		var top_modal = '16%';
	}
	$('#panel-atv-pv').data('width',content_w);
	$('#panel-atv-pv').css({'left':left_modal, 'top': top_modal, 'max-width':'720px'})
	$('#div_frame_pv, #frame_pv, #set_video').height(valor_height);
	$('#set_video').height(valor_height+50);
	clearInterval(video_interval);
}