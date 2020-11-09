const mix = require('laravel-mix')
const cssnano = require('cssnano')
const autoprefixer = require('autoprefixer')

const productionOptions = {
	postCss: [
		cssnano({
			preset: ['default', {
				discardComments: {
					removeAll: true,
				},
			}]
		}),
		autoprefixer()
	]
}

if (mix.inProduction()) {
	mix.version()
	mix.options(productionOptions)
	mix.webpackConfig({
		optimization: {
			usedExports: true
		}
	})
}

mix.less('resources/less/guest/app.less', 'css/guest.css')
mix.less('resources/less/account/app.less', 'css/account.css')
mix.less('resources/less/admin/app.less', 'css/manage.css')

mix.js('resources/js/guest/app.js', 'js/guest.js')
mix.js('resources/js/account/app.js', 'js/account.js')
mix.js('resources/js/admin/app.js', 'js/manage.js')

mix.extract([
	'vue', 'aos', 'axios', 'chart.js', 'flickity', 'jquery', 'vue-text-mask', 'vuelidate', 'vuex'
])


mix.disableNotifications()