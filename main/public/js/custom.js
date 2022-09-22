var locations = [
	['<b>Location: Miyapur</b><br> Date & Time: 14/09/2020 </b><br>Active Status:Offline', 17.545219347298673, 78.29285321055747, 2, "images/mapicon/cctvoffline (2).png"],
	['<b>Location: Miyapur</b><br> Date & Time: 14/09/2020 </b><br>Active Status:online', 17.532124828643553, 78.3543079773492, 1, "images/mapicon/cctvonline.png"],
	['<b>Location: Miyapur</b><br> Date & Time: 14/10/2020 </b><br>Active Status:Online',17.498402092666247, 78.32907375746542, 1, "images/mapicon/cctvonline.png"],
	['<b>Location: Miyapur</b><br> Date & Time: 14/08/2020 </b><br>Active Status:Online', 17.554384947459017, 78.25886426132628, 2, "images/mapicon/cctvoffline (2).png"],
];
var map = new google.maps.Map(document.getElementById('map'), {
	zoom: 10,
	center: new google.maps.LatLng(17.43981534616295, 78.26177749490182),
	mapTypeId: google.maps.MapTypeId.ROADMAP
});
var infowindow = new google.maps.InfoWindow();
var marker, i;
for (i = 0; i < locations.length; i++) {
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





//download btn click


