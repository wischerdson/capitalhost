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
	},
	methods: {
		selectUser () {
			this.$store.state.user = this.user
		}
	}
}

</script>