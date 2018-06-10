function progress_bar(){
	time = 200;
	var w = $(window).width()/2;
	var $topLoader = $("#topLoader").percentageLoader({
		width: 600, height: 600, controllable: true, progress: 0.5, onProgressUpdate: function (val) {
			this.setValue(Math.round(val * 100.0) + 'kj');
		}
	});
	
	var topLoaderRunning = false;
	$topLoader.percentageLoader({onready: function () {
			if (topLoaderRunning) {
				return;
			}
			topLoaderRunning = true;
			var kb = 0;
			var totalKb = 1000;
			var animateFunc = function () {
				kb += 17;
				$topLoader.percentageLoader({progress: kb / totalKb});
				//$topLoader.percentageLoader({value: (kb.toString() + 'kb')});
				if (kb < totalKb) {
					setTimeout(animateFunc, time);
				} else {
					topLoaderRunning = false;
					$('#content-geral').removeClass('no-display');
					$('#topLoader').addClass('no-display');
				}
			};
			setTimeout(animateFunc, time);
	}});
}