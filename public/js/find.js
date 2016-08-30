new Vue({
	el: '#find',
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
				this.farmesr_markets = [];
				this.farmers_markets = response.data;
			}, (response) => {
				console.log("error");
			});
		}
	}
})