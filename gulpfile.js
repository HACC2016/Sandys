var elixir = require('laravel-elixir');

elixir(function(mix) {
	mix.scripts([
		'vendor/vue.min.js',
		'vendor/vue-resource.min.js',
	], 'public/js/vendor.js')
});