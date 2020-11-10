<script>

	export default {
		template: '#template__home',
		data () {
			return {
				wait: false,
				pagination: {
					currentPage: null,
					total: null,
					totalPages: null,
					perPage: null
				},
				timeout: null,
				search: ''
			}
		},
		watch: {
			search () {
				clearTimeout(this.timeout)
				this.timeout = setTimeout(() => {
					this.pagination.currentPage = 1
					this.refreshUsers()
				}, 700)
			}
		},
		computed: {
			user () {
				return this.$store.getters.user
			},
			users () {
				return this.$store.state.users
			},
		},
		methods: {
			selectUser (userId) {
				const user = this.users.find(user => user.id === userId)
				this.$store.commit('user', user)
			},
			refreshUsers () {
				this.wait = true
				const url = `/users/${this.search ? 'search' : 'get'}`
				this.$axios.post(url, {
					secret: 255655,
					page: this.pagination.currentPage,
					search: this.search
				}).then(({data}) => {
					this.$store.commit('users', data.data)
					this.pagination.currentPage = data.current_page
					this.pagination.total = data.total
					this.pagination.perPage = data.per_page
					this.pagination.totalPages = Math.ceil(this.pagination.total/this.pagination.perPage)
				}).finally(() => {
					this.wait = false
				})
			},
			pageChanged (currentPage) {
				this.pagination.currentPage = currentPage
				this.refreshUsers()
			}
		},
		mounted () {
			const searchParams = new URLSearchParams(document.location.search);
			this.pagination.currentPage = +(+searchParams.get('page')) || 1
			this.refreshUsers()
		}
	}

</script>