new Vue({
	el: '#post_photo',
	data: {
		imageSrc: '',
	},
	ready: function() {
		console.log("post_photo");
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
		}
	}
})