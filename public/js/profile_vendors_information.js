var vue = new Vue({
	el: '#profile_vendors_information',
	data: {
		vendors: [
			{ message: 'Foo' },
			{ message: 'Bar' }
		]
	},
	ready: function() {
		console.log("got in here");
	},
	methods:{
	}
})