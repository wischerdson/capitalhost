import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
	modules: {
		
	},
	state: {
		user: null,
		users: null
	},
	getters: {
		user (state) {
			return state.user
		}
	},
	mutations: {
		user (state, payload) {
			state.user = payload
		},
		users (state, payload) {

			state.users = payload.map((user) => {
				user.balance = +(+user.balance).toFixed(2)
				return user
			})
		}
	}
})