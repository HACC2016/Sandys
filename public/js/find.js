var vue = new Vue({
	el: '#find',
	data: {
		list:false,
		map:true,
		markers: [], 
	},
	ready: function() {
		console.log("find");
		this.fetchFarmersMarket();

	},
	methods:{ 
		fetchFarmersMarket: function() {
			this.$http.get('/api/farmers_markets').then((response) => {
				this.$set('farmers_markets', response.data);
			}, (response) => {
				console.log(response);
			});
		},
		find: function(e){ 
			e.preventDefault(); 

		},
		onSubmitForm: function() {
			this.fetchNewFarmersMarkets();
		},
		fetchNewFarmersMarkets: function() {
			var paramsarray = [];
			if(this.island) {
				paramsarray.push({island: this.island})
			}
			if(this.day) {
				paramsarray.push({island: this.island})
			}
			if(this.time_hour) {
			}
			this.$http.get('api/farmers_markets/queried', {params: {island: this.island, day: this.day}}).then((response) => {
				this.farmers_markets = [];
				this.farmers_markets = response.data;
			}, (response) => {
				console.log("error");
			});

			this.deleteMarkers();
			for($i = 0; $i < this.farmers_markets.length; $i++) { 
				var latlng = new google.maps.LatLng(this.farmers_markets[$i].lat, this.farmers_markets[$i].lng);
				var marker = new google.maps.Marker({
					map: this.map,
					position: latlng
				});
				this.markers.push(marker);
			}
			this.map.setCenter(this.findMiddleOfCoordinates(this.markers));
		},
		setMapOnAll: function(map) {
			for( var i = 0; i < this.markers.length; i++) {
				this.markers[i].setMap(map);
			}
		},
		clearMarkers: function() {
			this.setMapOnAll(null);
		},
		deleteMarkers: function() {
			this.clearMarkers();
			this.markers =[];
		},
		listTemplate: function() {
			console.log('list')
			this.list = true;
			this.map = false;
		},
		mapTemplate: function() {
			console.log('map')
			this.list = false;
			this.map = true;
		},
		initialize: function() {
			var latlng = new google.maps.LatLng(12, 13);
			var mapOptions = {
				zoom: 12,
				center: latlng,
				draggable: false,
			}
			this.$set('map', new google.maps.Map(document.getElementById('map'), mapOptions));
		},
		findMiddleOfCoordinates: function(markers) {
			var x= 0;
			var y= 0;
			var z= 0;
			console.log(markers.length);
			for(var i = 0; i < markers.length; i++){ 
				var lat = markers[i].getPosition().lat() * Math.PI /180;
				var lng = markers[i].getPosition().lng() * Math.PI /180;
				
				x += Math.cos(lat) * Math.cos(lng);
	            y += Math.cos(lat) * Math.sin(lng);
	            z += Math.sin(lat);

				var total = markers.length;

		        x = x / total;
		        y = y / total;
		        z = z / total;

		        var centralLongitude = Math.atan2(y, x);
		        var centralSquareRoot = Math.sqrt(x * x + y * y);
		        var centralLatitude = Math.atan2(z, centralSquareRoot);

		        return new google.maps.LatLng(centralLatitude * 180 / Math.PI, centralLongitude * 180 / Math.PI);
			}
		}
	}
})

function initialize() {
	vue.initialize();
}