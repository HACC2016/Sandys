var vue = new Vue({
	el: '#farmers_market_items',
	data: {
		local: false,
		nongmo: false,
		organic: false,
	},
	ready: function() {
		console.log(id);
		this.getInitialItems();
	},
	methods:{
		getInitialItems: function() {
			this.$http.get('/api/farmers_market/' + id + '/items').then((response) => {
				this.$set('items', response.data);
			}, (response) => {
				console.log(response);
			});
		},
		getPhoto: function(id) {
			this.$http.get('/photo/getPhotoByPhotoId/' + id).then((response) => {
			}, (response) => {
				console.log(response);
			});
		},
		itemChanged: function() {
			this.$http.get('/api/farmers_market/' + id + '/items', 
				{params: {'item_name': vue.item_name, 'local': vue.local, 'nongmo': vue.nongmo, 'organic': vue.organic}}
				).then((response) => {
					console.log(response);
					this.$set('items', response.data);
			}, (response) => {
				console.log(response);
			});
		},
		change: function() {
			this.itemChanged();
		}
	}
})