<script type="text/javascript">
	
	export default {
		template: '#template__home',
		data () {
			return {
				switchMode: 2,
				selectedPlan: {
					planId: null,
					wait: false,
					details: null,
					result: null,
					successModal: false
				}
			}
		},
		methods: {
			reloadPage () {
				location.reload()
			},
			selectPlan (url, planId) {
				this.selectedPlan.planId = planId
				this.selectedPlan.wait = true

				this.$axios.post(url).then(({data}) => {
					this.selectedPlan.result = data

					if (data.status == 'success') {
						this.selectedPlan.details = data.selected_plan
						this.selectedPlan.successModal = true
					}
				}).catch((error) => {
					console.log(error)
				}).finally(() => {
					this.selectedPlan.wait = false
				})
			}
		}
	}

</script>