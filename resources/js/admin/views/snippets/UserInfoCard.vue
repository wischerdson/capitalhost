<script>
	
export default {
	template: '#snippet_userInfoCard',
	props: ['user'],
	computed: {
		selectedUser () {
			return this.$store.getters.user
		},
		hColor () {
			return this.user.freeze_in > 7*24 ? 'green' : (this.user.freeze_in <= 0 ? 'red' : 'yellow')
		},
		dColor () {
			return this.user.domains.length ? 'green' : 'red'
		},
		sColor () {
			return this.user.purchased_ssl.length ? 'green' : 'red'
		},
		unresolvedTasksCount () {
			return this.user.admin_tasks.reduce((i, task) => {
				if (task.status != 2)
					return i + 1
				return i
			}, 0)
		}
	},
	methods: {
		selectUser () {
			this.$store.state.user = this.user
		}
	}
}

</script>