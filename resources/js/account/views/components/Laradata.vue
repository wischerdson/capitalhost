<template>
	<div class="laradata"></div>
</template>

<script>

	export default {
		props: ['name', 'json'],
		methods: {
			delete () {
				this.$el.remove()
			}
		},
		mounted () {
			let value = this.$slots.default[0].text

			if (this.json !== undefined)
				value = JSON.parse(value)

			this.$store.commit('laradata_add', {
				key: this.name,
				value
			})

			this.delete()
		}
	}

</script>