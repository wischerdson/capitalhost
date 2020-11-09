<script type="text/javascript">
	
	export default {
		template: '#template__sign_in',
		data () {
			return {
				email: '',
				password: '',
				remember: true,
				passwordRecovery: true,
				errorCode: null
			}
		},
		methods: {
			sendForm (e) {
				this.errorCode = null
				const form = e.target
				const data = new FormData(form)
				const url = e.target.getAttribute('action')

				this.$axios.post(url, data).then(({data}) => {
					if (data.hasOwnProperty('code')) {
						this.errorCode = data.code
						return
					}
					location.reload()
				}).catch((e) => {
					console.log(e)
				})
			}
		}
	}

</script>