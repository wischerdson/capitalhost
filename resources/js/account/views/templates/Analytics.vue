<script type="text/javascript">
	
	import Chart from 'chart.js'

	export default {
		template: '#template__analytics',
		mounted () {
			let ctx = this.$refs.chart_users.getContext('2d')
			let myChart = new Chart(ctx, {
				type: 'line',
				options: {
					legend: {
						display: false
					},
					tooltips: {
						enabled: false
					},
					showLine: false
				},
				data: [
					{
						x: 10,
						y: 20
					}, {
						x: 15,
						y: 10
					}
				]
			})
		}
	}

</script>