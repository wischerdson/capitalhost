<script>

	export default {
		template: '#template__home',
		data () {
			return {
				wait: false,
				pagination: {
					currentPage: null,
					total: null,
					pages: null,
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
					this.setPage(1)
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
			paginationOffset () {
				const elWidth = 30 + 5
				const onEachSide = 2
				let offset = this.pagination.currentPage - onEachSide - 1
				offset = offset + onEachSide + 1 > this.pagination.pages - onEachSide ? this.pagination.pages - onEachSide*2 - 1 : offset
				offset = offset <= 0 ? 0 : offset
				return -offset*elWidth
			}
		},
		methods: {
			selectUser (userId) {
				const user = this.users.find(user => user.id === userId)
				this.$store.commit('user', user)
			},
			setPage (num) {
				const params = document.location.search
				const searchParams = new URLSearchParams(params);

				searchParams.set('page', num)
				const urlQuery = searchParams.toString()

				history.pushState({foo: 'bar'}, 'Title', `${document.location.pathname}?${urlQuery}`)
				this.pagination.currentPage = num

				clearTimeout(this.timeout)
				this.timeout = setTimeout(() => {
					this.refreshUsers()
				}, 700)
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
					this.pagination.pages = Math.ceil(this.pagination.total/this.pagination.perPage)
				}).finally(() => {
					this.wait = false
				})
			}
		},
		mounted () {
			const searchParams = new URLSearchParams(document.location.search);

			this.pagination.currentPage = +(+searchParams.get('page')) || 1

			this.refreshUsers()
		}
	}

</script>