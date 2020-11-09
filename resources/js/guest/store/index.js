import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
	modules: {
		
	},
	state: {
		modal: false
	},
	getters: {
		modal (state) {
			return state.modal
		}
	},
	mutations: {
		modal (state, payload) {
			state.modal = payload
		}
	}
})