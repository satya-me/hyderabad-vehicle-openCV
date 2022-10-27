setInterval(function () {

	var settings = {
		"async": true,
		"crossDomain": true,
		"url": ajax_url + "api/ajax/cam/info",
		"method": "GET",
		"headers": {
			"content-type": "application/x-www-form-urlencoded"
		}
	}

	$.ajax(settings).done(function (response) {
		// console.log("TABLE > ", response);

		for (let i = 0; i < response.length; i++) {
			const element = response[i];
			var status_id = element.status_id;
			// console.log("TABLE > ", '#'+status_id);

			var status = $('#' + status_id);

			status.empty();
			if (element.status == "OFFLINE") {
				status.append(`
				<b style="color: red;">Offline</b>
				`);
			}

			if (element.status == "ONLINE") {
				status.append(`
				<b style="color: green;">Online</b>
				`);
			}
		}

	});

}, 2000);







//download btn click


