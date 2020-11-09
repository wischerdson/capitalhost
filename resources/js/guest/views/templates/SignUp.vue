<script type="text/javascript">
	
	import {required, email, minLength, maxLength, sameAs} from 'vuelidate/lib/validators'

	export default {
		template: '#template__sign_up',
		data () {
			return {
				firstName: '',
				email: '',
				lastName: '',
				password: '',
				confirmPassword: '',
				companyName: '',

				unacceptable: false,
				previewLogo: false,
				logoBase64: '',

				signUpForm: {
					__error: null
				}
			}
		},
		methods: {
			sendForm (e) {
				this.$v.$touch()
				this.signUpForm.__error = null;

				if (this.$v.$invalid)
					return

				const form = e.target
				const url = form.attributes.action.value
				const formData = new FormData(form)

				this.$axios.post(url, formData).then(({data}) => {
					if (data.status === 'error') {
						this.signUpForm.__error = data.code
						return
					}
					location.href = data.redirect
				}).catch((e) => {
					console.log(e)
				}).finally((d) => {
					
				})
			},
			uploadLogo (event) {
				const input = event.target
				const files = input.files

				if (!files.length)
					return

				const file = files[0]
				const extensions = ['png', 'jpeg', 'jpg', 'webp']
				const extension = file.name.toLowerCase().split('.').pop()

				if (extensions.indexOf(extension) < 0) {
					alert('Формат ('+extension+') загружаемого файла не поддерживается. Допустимые форматы: JPEG, PNG, WebP, GIF.')
					return
				}

				const reader = new FileReader()
				reader.onload = this.logoPreview
				reader.readAsDataURL(file)
			},
			logoPreview (event) {
				this.previewLogo = true
				this.logoBase64 = event.target.result
			}
		},
		validations: {
			email: {
				required,
				email
			},
			firstName: {
				required,
				minLength: minLength(2),
				maxLength: maxLength(20)
			},
			lastName: {
				required
			},
			companyName: {
				required
			},
			password: {
				required,
				minLength: minLength(6)
			},
			confirmPassword: {
				sameAs: sameAs('password')
			}
		}
	}

</script>