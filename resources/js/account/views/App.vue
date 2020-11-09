<script type="text/javascript">
	
	export default {
		template: '#hostcapital',
		computed: {
			modal () {
				return this.$store.getters.modal
			}
		},
		watch: {
			modal (value) {
				const body = document.querySelector('body')
				body.style.overflowY = value ? 'hidden' : ''
			}
		},
		mounted () {
			this.$aos.init({
				duration: 1000,
				once: true
			})
		}
	}

</script>