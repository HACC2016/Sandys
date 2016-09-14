var vue = new Vue({
	el: '#my_vendor_map',
	data: {
		id: '',
		vendors: [],
		vendor_map_positions: [],
		imageSrc: '',
		lastTarget: null,
		vendorLastClicked: null,
		focus: '',
		i: 0,
		v_id: 0,
	},
	ready: function() {
		this.$http.get('/api/getFarmersMarketId').then((response) => {
			var id = response.data;
			vue.id = id;
			vue.$http.get('/api/farmers_market/' + id + '/vendors').then((vendor_response) => {
				var vendors = vendor_response.data;
				for(var i = 0; i < vendors.length; i++) {
					vue.v_id = vendors[i].id;
					vue.$http.get('/api/vendor_name/' + vendors[i].id).then((v_response) => {
						vue.vendors.push(v_response.data);
						vue.placeMarker(v_response.data.id);
						vue.$http.get('/api/getVendorMapPosition/' + vue.id + '/' + v_response.data.id).then((vendor_position_response) => {
							var marker = $("#mapmarker" + vendor_position_response.data.vendor_id);
							marker.css("left", vendor_position_response.data.left*100 + "%");
							marker.css("top", vendor_position_response.data.top*100 + "%");
							marker.css("visibility", "visible");
							marker.attr("data-toggle", "tooltip");
							marker.attr("data-placement", "top");
							marker.attr("title", v_response.data.vendor_name);
						});
					});
				}
			});
			$(function () {
				$('[data-toggle="tooltip"]').tooltip()
			})

		});
	},
	methods:{
		previewThumbnail: function(event) {
			console.log("changed");
			var input = event.target;

			if (input.files && input.files[0]) {
				var reader = new FileReader();

				var vm = this;

				reader.onload = function(e) {
					vm.imageSrc = e.target.result;
				}

				reader.readAsDataURL(input.files[0]);
			}
		},
		placeMarker: function (id) {
			var img = document.createElement("img");
			img.src = "/images/map-marker.png"; 
			img.height = 30; 
			img.width = 30;
			img.style.left = 50 + '%';
			img.style.top = 0;
			img.style.position='absolute';
			img.id = "mapmarker" + id;
			img.className += "mapmarker";
			img.style.visibility='hidden';
			console.log(img)
			$('#map').parent().append(img)
		},
		mapClick: function(event, where) {
			vue.focus.css("left", (event.offsetX/event.target.clientWidth - 15/event.target.clientWidth)*100 + "%");
			vue.focus.css("top", (event.offsetY/event.target.clientHeight - 15/event.target.clientHeight)*100 + "%");
			vue.focus.css("visibility", "visible");
			$('#save_button' + vue.focus.id).css('background', "#ffad99");
		},
		find: function($event, vendorId) {
			$( ".fe_button" ).css( "background", "white" );
			$event.target.style.background = '#99ffb3';
			$( ".mapmarker" ).css( "visibility", "hidden" );
			$("#mapmarker" + vendorId).css("visibility", "visible");

		},
		edit: function($event, vendorId) {
			$( ".fe_button" ).css( "background", "white" );
			$event.target.style.background = '#99ffb3';
			vue.focus = $("#mapmarker" + vendorId);
			vue.focus['id'] = vendorId;
			$( ".mapmarker" ).css( "visibility", "hidden" );
			$("#mapmarker" + vendorId).css("visibility", "visible");
		},
		save: function($event, vendorId) {
			var marker = $( "#mapmarker" + vendorId);
			var map = $( "#map");
			var width = marker.position().left/map.width();
			var height = marker.position().top/map.height();
			vue.$http.get('api/getVendorMapPosition/' + width + '/' + height + '/' + vendorId + '/' + this.id).then((response) => {
				console.log(response);
			});
			$('#save_button' + vendorId).css('background', "white");

		},
		showAll: function () {
			$( ".mapmarker" ).css( "visibility", "visible" );
		},
		hideAll: function () {
			$( ".mapmarker" ).css( "visibility", "hidden" );
		}
	}
})