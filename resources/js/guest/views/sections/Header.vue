<script>
	
	export default {
		template: '#template_section_header',
		data () {
			return {
				showMenu: false
			}
		},
		watch: {
			showMenu (value) {
				window.scrollTo(0, 0)
				document.body.scrollTop = 0

				document.body.style.overflow = value ? 'hidden' : ''

				// const main = document.querySelector('main')
				// const footer = document.querySelector('#site_footer')
				// const display = value ? 'none' : ''

				// main.style.display = display
				// footer.style.display = display
			}
		},
		mounted () {
			this.$refs.dunce.style.height = this.$el.offsetHeight + 'px'
		}
	}

</script>