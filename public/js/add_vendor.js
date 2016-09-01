var vue = new Vue({
	el: '#add_vendor',
	data: {
		items: [
	    ]

	},
	ready: function() {
		console.log("add_vendor");
	},
	methods:{
		nameChanged: function() {
			this.items = [];
			this.$http.get('/api/vendors/' + this.vendor_name).then((response) => {
				this.items = response.data;
				console.log(response.data);
		          // success callback
			}, (response) => {
				// error callback
			});
		}
	}
})
