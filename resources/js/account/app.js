import Vue from 'vue'
import App from './views/App'
import store from './store/index'
import initPlugins from './plugins/index'
import View from './views/View'
import components from './components'


import MaskedInput from 'vue-text-mask'
Vue.component('masked-input', MaskedInput);


const app = {
	render: h => h(App),
	store
}

initPlugins(app, Vue)
components(new View)

new Vue(app).$mount('#hostcapital')