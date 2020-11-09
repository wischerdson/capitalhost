import Vue from 'vue'
import App from './views/App'
import store from './store/index'
import initPlugins from './plugins/index'
import View from './views/View'
import components from './components'


const app = {
	render: h => h(App),
	store
}

initPlugins(app, Vue)
components(new View)

new Vue(app).$mount('#app')