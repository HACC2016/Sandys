var vue = new Vue({
	el: '#farmers_market_home',
	data: {
	},
	ready: function() {
		console.log("farmers_market_home");
	},
	methods:{
		doThis: function() {
			console.log(this.photo);
		}
	}
})