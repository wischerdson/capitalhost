import Vue from 'vue'

export default (app) => {
	let inject = (name, plugin) => {
		let key = `$${name}`
		app[key] = plugin
		app.store[key] = plugin

		if ('__construct' in plugin)
			plugin.__construct()

		Vue.use(() => {
			if (Vue.prototype.hasOwnProperty(key))
				return

			Object.defineProperty(Vue.prototype, key, {
				get () {
					return this.$root.$options[key]
				}
			})
		})
	}

	require('./axios').default(app, inject)
	// require('./jquery').default(app, inject)
	// require('./collapse').default(app, inject)
	// require('./flickity').default(app, inject)
	require('./aos').default(app, inject)
	require('./vuelidate').default(app, inject)
}