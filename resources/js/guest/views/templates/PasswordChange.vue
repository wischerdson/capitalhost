<script type="text/javascript">
	
	import { required, minLength, sameAs } from 'vuelidate/lib/validators'

	export default {
		template: '#template__changePassword',
		data () {
			return {
				form: {
					changePassword: {
						password: '',
						confirmPassword: '',
						__wait: false,
						__error: null
					}
				},

			}
		},
		validations: {
			form: {
				changePassword: {
					password: {
						required,
						minLength: minLength(6)
					},
					confirmPassword: {
						sameAsPassword: sameAs('password')
					}
				}
			}
		},
		methods: {
			changePassword (e) {
				this.form.changePassword.__error = null

				if (this.$v.form.changePassword.$invalid) {
					this.$v.form.changePassword.$touch();
					return
				}

				this.form.changePassword.__wait = true
				const form = e.target
				const url = form.attributes.action.value
				const formData = new FormData(form)

				this.$axios.post(url, formData).then(({data}) => {
					if (typeof data == 'Object' && 'code' in data) {
						this.form.changePassword.__error = data.code
						return
					}
					location.href = data
				}).catch((e) => {
					console.log(e)
				}).finally(() => {
					this.form.changePassword.__wait = false
				})
			}
		}
	}

</script>