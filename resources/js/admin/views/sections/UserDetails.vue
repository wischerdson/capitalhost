<script>
	
	export default {
		template: '#template_section_userDetails',
		data () {
			return {
				wait: false,
				editableTask: null,
				scheduler: null
			}
		},
		computed: {
			createdAt () {
				const date = new Date(this.user.created_at)
				const monthes = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

				return `${monthes[date.getMonth()]} ${date.getDate()}, ${date.getFullYear()}`
			},
			statusColor () {
				if (this.user.freeze_in > 7*24)
					return 'green'
				
				if (this.user.freeze_in < 7*24 && this.user.freeze_in > 0)
					return 'yellow'

				return 'red'
			},
			user () {
				return this.$store.getters.user
			},
			discountTimeRemaining () {
				const now = Date.now()/1000
				const remaining = (this.user.discount_expire_at - now)/60/60/24

				return Math.floor(remaining)
			},
			freezeIn () {
				const freezeIn = this.user.freeze_in
				
				if (freezeIn <= 0)
					return 0

				const freezeInDays = Math.floor(freezeIn/24)
				if (freezeInDays > 0)
					return freezeInDays + ' дн.'

				return freezeIn + ' ч.'
			},
			isOpen () {
				return !!this.user
			}
		},
		methods: {
			setWait (value) {
				this.wait = value
			},
			createTask ()
			{
				const step = this.user.admin_tasks.reduce((previousValue, item) => {
					return item.step >= previousValue ? item.step + 1 : previousValue
				}, 1)

				const task = {
					user_id: this.user.id,
					name: 'Новая задача',
					step,
					status: '0'
				}
				this.send('tasks/create', {task}, ({data}) => {
					this.user.admin_tasks.push(data.task)
				})
			},
			send (method, data, successCallback)
			{
				successCallback = successCallback || (() => {})
				this.wait = true

				data.secret = '255655'

				this.$axios.post(`/${method}`, data).then(successCallback).finally(() => {
					this.wait = false
				})
			},
			copyToClipboard (text, event)
			{
				navigator.clipboard.writeText(text)

				const $button = event.target.closest('.copy-to-clipboard')
				const $copy = $button.querySelector('.copy')
				const $tick = $button.querySelector('.tick')
				$copy.style.display = 'none'
				$tick.style.display = ''

				setTimeout(() => {
					$copy.style.display = ''
					$tick.style.display = 'none'
				}, 2000)
			}
		}
	}

</script>