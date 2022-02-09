(function ($) {
	$('body').on('click', 'a.app_thanks_ajax', function (ev) {
		var el = $(this);
		$(ev).stop();
		var old = el.clone();
		el.attr('disabled', 'disabled');
		$.ajax({
			async: true,
			url: el.attr('href'),
			type: 'POST',
			dataType: 'json',
			data: {
				action: el.data('action'),
				pid: el.data('pid'),
				fid: el.data('fid'),
				to_id: el.data('to_id'),
				from_id: el.data('from_id')
			},
			success: function (response) {
				if (response && response.result) {
					if (response && response.update) {
						for (var idx in response.update) {
							if (response.update.hasOwnProperty(idx)) {
								$('.' + idx).replaceWith(response.update[idx]);
							}
						}
					}
				} else {
					el.replaceWith(old)
				}
			},
			error: function (r, e) {
				el.replaceWith(old)
			}
		});
		return false;
	});
})(jQuery);

