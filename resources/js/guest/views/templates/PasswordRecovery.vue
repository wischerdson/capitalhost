<script>
	
	import { required, email } from 'vuelidate/lib/validators'

	export default {
		template: '#template__passwordRecovery',
		data () {
			return {
				form: {
					passwordRecovery: {
						email: '',
						__wait: false,
						__error: null
					}
				},
				showTip: false
			}
		},
		validations: {
			form: {
				passwordRecovery: {
					email: {
						required, email
					}
				}
			}
		},
		methods: {
			resetPassword (e) {
				this.form.passwordRecovery.__error = null

				if (this.$v.form.passwordRecovery.$invalid) {
					this.$v.form.passwordRecovery.$touch();
					return
				}

				this.form.passwordRecovery.__wait = true
				const form = e.target
				const url = form.attributes.action.value
				const formData = new FormData(form)

				this.$axios.post(url, formData).then(({data}) => {
					if (typeof data == typeof {} && 'code' in data) {
						this.form.passwordRecovery.__error = data.code
						return
					}
					this.showTip = true
				}).catch((e) => {
					console.log(e)
				}).finally(() => {
					this.form.passwordRecovery.__wait = false
				})
			}
		}
	}

</script>