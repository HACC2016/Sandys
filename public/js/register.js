var vue = new Vue({
	el: '#register',
	data: {
		street_address_changed: false,
		can_change: false,
		markers: []
	},
	ready: function() {
		console.log("asdf");
	},
	methods:{ 
		streetAddressChanged: function() {
			this.update_address();
		},
		initialize: function() {
			this.$set('geocoder', new google.maps.Geocoder());
			var latlng = new google.maps.LatLng(12.999, 30.0000);
			var mapOptions = {
				zoom: 8,
				center: latlng
			}
			this.$set('map', new google.maps.Map(document.getElementById('map'), mapOptions));
		},
		update_address: function() {
			this.geocodeAddress(this.geocoder, this.map);
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
		geocodeAddress: function(geocoder, resultsMap) {
			geocoder.geocode(
				{'address': this.street_address}, 
				function(results, status) {
					if (status === 'OK') {
						resultsMap.setCenter(results[0].geometry.location);
						vue.deleteMarkers();
						var marker = new google.maps.Marker({
							map: resultsMap,
							position: results[0].geometry.location
						});
						vue.markers.push(marker);
						console.log(results[0]);
						vue.state = vue.getState(results[0].address_components);
						vue.country = vue.getCountry(results[0].address_components);
						vue.lat = results[0].geometry.location.lat();
						vue.lng = results[0].geometry.location.lng();
						vue.lng = results[0].geometry.location.lng();
						vue.county = vue.getCounty(results[0].address_components);
						vue.zipcode = vue.getPostalCode(results[0].address_components);
						vue.city = vue.getCity(results[0].address_components);
						vue.street_address_changed = false;
						vue.can_change = true;
					} else {
						alert('Geocode was not successful for the following reason: ' + status);
					}
				}
			)
		},
		getCounty: function(address_components) {
			return this.findAddressComponent(address_components, 'administrative_area_level_2');
		},
		getCountry: function(address_components) {
			return this.findAddressComponent(address_components, 'country');
		},
		getState: function(address_components) {
			return this.findAddressComponent(address_components, 'administrative_area_level_1');
		},
		getPostalCode: function(address_components) {
			return this.findAddressComponent(address_components, 'postal_code');
		},
		getCity: function(address_components) {
			return this.findAddressComponent(address_components, 'locality');
		},
		findAddressComponent: function(address_components, type_name) {
			for(var i = 0; i < address_components.length; i++) {
				for(var ti = 0; ti < address_components[i].types.length; ti++) {
					if(address_components[i].types[ti] == type_name) {
						return address_components[i].long_name;
					}
				}
			}
		},
	}
})

function initialize() {
	vue.initialize();
}
