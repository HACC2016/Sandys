new Vue({
	el: '#find_farmers_market',
	data: {
	},
	ready: function() {
		console.log("asdfasdqwerqwer");
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
			console.log("submitted form")
		}
	}
})