var vue = new Vue({
	el: '#farmers_market',
	data: {
		items: [],
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
		itemChanged: function(farmers_market_id) {
			this.items = [];
			this.$http.get('/api/farmers_market/' + farmers_market_id + '/items', 
				{params: {'item_name': vue.item_name}}
				).then((response) => {
					console.log(response);
					this.$set('items', response.data);
			}, (response) => {
				console.log(response);
			});
		}
	}
})

function initialize() {
	vue.initialize();
}