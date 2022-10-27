
camera();

setInterval(function () {
	camera();
	console.log("Hi Interval");

}, 50000);



function camera() {

	let d = new Date();
	let date = d.getFullYear() + '-' + d.getMonth() + 1 + '-' + d.getDate();
	console.log("Interval: ",d.getSeconds());
	var settings = {
		"async": true,
		"crossDomain": true,
		"url": ajax_url + "api/ajax/cam/info_dash",
		"method": "GET",
		"headers": {
			"content-type": "application/x-www-form-urlencoded"
		}
	}

	$.ajax(settings).done(function (response) {
		var locations = [];

		for (let i = 0; i < response.length; i++) {
			const element = response[i];
			var status_id = element.status_id;
			// console.log("TABLE > ", response[i].lat);
			// console.log("TABLE > ", '#'+status_id);

			var status = $('#' + status_id);
			var ioc_status;
			status.empty();
			if (element.status == "OFFLINE") {
				status.append(`
				<b style="color: red;">Offline</b>
				`);
				ioc_status = '<b style="color: red;">Offline</b>';
			}

			if (element.status == "ONLINE") {
				status.append(`
				<b style="color: green;">Online</b>
				`);
				ioc_status = '<b style="color: green;">Online</b>';
			}

			locations.push(['<b>Location: ' + element.name + '</b><br> Date & Time: ' + date + ' </b><br>Active Status:' + ioc_status + '', +parseFloat(response[i].lat), parseFloat(response[i].long), 2, "" + element.png + ""]);
		}

		// var locations = [
		// 	['<section><b>Location: Ranchi</b><br> Date & Time: ' + date + ' </b><br>Active Status:<b style="color: red;">Offline</b></section>', 23.3429431, 85.0342137, 2, "main/public/images/mapicon/cctvoffline.png"],
		// 	['<section><b>Location: Durgapur</b><br> Date & Time: ' + date + ' </b><br>Active Status:<b style="color: green;">Online</b></section>', 23.5310378, 87.1566416, 2, "main/public/images/mapicon/cctvonline.png"],
		// ];
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 5,
			center: new google.maps.LatLng(23.5066233,80.3069606),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		var infowindow = new google.maps.InfoWindow();
		var marker, i;


		for (i = 0; i < locations.length; i++) {
			// console.log(locations[i][1], locations[i][2])
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(locations[i][1], locations[i][2]),
				icon: locations[i][4],
				map: map
			});
			google.maps.event.addListener(marker, 'click', (function (marker, i) {
				return function () {
					infowindow.setContent(locations[i][0]);
					infowindow.open(map, marker);
				}
			})(marker, i));
		}
	});

}

