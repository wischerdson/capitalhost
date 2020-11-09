<script>
	
	export default {
		template: '#template_component_modal',
		model: {
			prop: 'show',
			event: 'close'
		},
		props: {
			show: {
				type: Boolean
			}
		},
		watch: {
			show (value) {
				this.$store.commit('modal', value)
			}
		},
		methods: {
			close () {
				this.$emit('close', false)
			}
		}
	}

</script>