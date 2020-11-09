<script type="text/javascript">
	
	export default {
		template: '#template__ssl',
		data () {
			return {
				form_confirmation__wait: false,
				confirmationResult: null,
				selectedSSL: null
			}
		},
		computed: {
			ssl () {
				return d.ssl
			}
		},
		methods: {
			buy (sslDetails) {
				this.selectedSSL = sslDetails
			},
			confirm (e)
			{
				this.form_confirmation__wait = true
				this.confirmationResult = null
				const form = e.target
				const url = form.attributes.action.value
				const formData = new FormData(form)

				this.$axios.post(url, formData).then(({data}) => {
					this.confirmationResult = data

					if (data.status == 'error')
						return
					location.reload()
				}).catch((e) => {
					console.log(e)
				}).finally(() => {
					this.form_confirmation__wait = false
				})
			}
		}
	}

</script>