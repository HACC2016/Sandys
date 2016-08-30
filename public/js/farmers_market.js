var vue = new Vue({
	el: '#farmers_market',
	data: {
	},
	ready: function() {
		console.log(this.lat);
		console.log(this.lng);
	},
	methods:{ 
		initialize: function() {
			this.$set('geocoder', new google.maps.Geocoder());
			var latlng = new google.maps.LatLng(this.lat, this.lng);
			var mapOptions = {
				zoom: 12,
				center: latlng,
				draggable: false,
			}
			this.$set('map', new google.maps.Map(document.getElementById('map'), mapOptions));
			var marker = new google.maps.Marker({
				map: this.map,
				position: latlng
			});
		},
	}
})

function initialize() {
	vue.initialize();
}