$(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        //url: 'server/php/'
				url: url_pv10
    });

    // Enable iframe cross-domain access via redirect option:
    $('#fileupload').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );

/*		$('#fileupload').addClass('fileupload-processing');
		$.ajax({
				url: $('#fileupload').fileupload('option', 'url'),
				dataType: 'json',
				context: $('#fileupload')[0]
		}).always(function () {
				$(this).removeClass('fileupload-processing');
		}).done(function (result) {
				$(this).fileupload('option', 'done')
						.call(this, $.Event('done'), {result: result});
		});*/

});
