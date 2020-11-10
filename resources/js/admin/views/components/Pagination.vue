<script>
	
export default {
	template: '#component_pagination',
	props: ['totalPages', 'currentPage'],
	data () {
		return {
			timeout: null
		}
	},
	watch: {
		currentPage () {
			const params = document.location.search
			const searchParams = new URLSearchParams(params);

			searchParams.set('page', this.currentPage)
			const urlQuery = searchParams.toString()

			history.pushState(null, null, `${document.location.pathname}?${urlQuery}`)
		}
	},
	computed: {
		paginationOffset () {
			const elWidth = 30 + 5
			const onEachSide = 2
			let offset = this.currentPage - onEachSide - 1
			offset = offset + onEachSide + 1 > this.totalPages - onEachSide ? this.totalPages - onEachSide*2 - 1 : offset
			offset = offset <= 0 ? 0 : offset
			return -offset*elWidth
		},
		setPage (num) {
			// this.currentPage = num

			clearTimeout(this.timeout)
			this.timeout = setTimeout(() => {
				this.$emit('change', num)
			}, 700)
		},
	},
	mounted () {
		
	}
}

</script>