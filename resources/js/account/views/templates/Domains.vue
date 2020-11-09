<script type="text/javascript">
	
	export default {
		template: '#template__domains',
		data () {
			return {
				domain: '',
				domainAvailable: null,
				domainPrice: null,
				wait: false,
				fail: null,
				form_contactDetails__wait: false,
				confirmationModalErrorMessage: false,
				form_confirmation__wait: false,

				persons: [],
				selectedPerson: 0,
				domainCheckResult: null,
				buyingDomainResult: null,
				desireToRegister: false
			}
		},
		computed: {
			buyingDomainConfirmationModal () {
				return this.desireToRegister && this.persons.length
			},
			creationPersonModal () {
				return this.desireToRegister && !this.persons.length
			},
			person ()
			{
				if (!this.persons.length)
					return ''

				return this.persons[this.selectedPerson]
			}
		},
		methods: {
			checkDomain (e) {
				this.wait = true
				this.fail = null
				this.domainCheckResult = null

				const form = e.target
				const url = form.attributes.action.value
				const formData = new FormData(form)

				this.$axios.post(url, formData).then(({data}) => {
					this.domainCheckResult = data
				}).catch((e) => {
					console.log(e)
				}).finally(() => {
					this.wait = false
				})
			},
			createPerson (e) {
				this.form_contactDetails__wait = true
				const form = e.target
				const url = form.attributes.action.value
				const formData = new FormData(form)

				this.$axios.post(url, formData).then(({data}) => {
					this.contactDetailsModal = false
					this.buyingDomainConfirmationModal = true
					this.persons.push({
						id: data.person_id,
						full_name: formData.get('full_name')
					})
				}).catch((e) => {
					console.log(e)
				}).finally(() => {
					this.form_contactDetails__wait = false
				})
			},
			buyDomain (e) {
				this.form_confirmation__wait = true
				this.buyingDomainResult = null
				const form = e.target
				const url = form.attributes.action.value
				const formData = new FormData(form)

				this.$axios.post(url, formData).then(({data}) => {
					this.buyingDomainResult = data
					if (data.status == 'error') {
						return
					}
					location.reload()
				}).catch((e) => {
					console.log(e)
				}).finally(() => {
					this.form_confirmation__wait = false
				})
			}
		},
		mounted ()
		{
			this.persons = d.persons
		}
	}
</script>