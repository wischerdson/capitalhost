<script>
	
export default {
	template: '#snippet_userDetails_task',
	props: ['task'],
	data () {
		return {
			months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
			scheduler: null,
			hiddenFront: false,
			editableTask: null
		}
	},
	computed: {
		user () {
			return this.$store.getters.user
		}
	},
	methods: {
		quickEdit () {
			this.hiddenFront = true
			this.enableEditableMode()
			setTimeout(() => {
				this.$refs.taskNameInput.focus()
				this.$refs.taskNameInput.select()

			}, 10)
		},
		addZeroToDateIfItNecessary (n) {
			n = parseInt(n)
			return n <= 9 ? `0${n}` : `${n}`
		},
		showScheduler () {
			const now = new Date();
			now.setTime(this.task.notify_at*1000 || now)

			this.scheduler = {
				hour: now.getHours(),
				minute: now.getMinutes(),
				day: now.getDate(),
				month: now.getMonth(),
				year: now.getFullYear()
			}
			this.formatSchedulerData()
			this.hiddenFront = true
		},
		hideScheduler () {
			this.hiddenFront = false
			setTimeout(() => {
				this.scheduler = null
			}, 500)
		},
		formatSchedulerData () {
			for (let key in this.scheduler) {
				if (key == 'month')
					continue
				this.scheduler[key] = this.addZeroToDateIfItNecessary(this.scheduler[key])
			}
		},
		saveSchedule () {
			this.formatSchedulerData()

			const dateString = `${this.scheduler.year}-${this.scheduler.month + 1}-${this.scheduler.day}T${this.scheduler.hour}:${this.scheduler.minute}:00`
			const notifyAt = new Date(dateString)

			this.update({
				notify_at: Math.floor(notifyAt/1000)
			})
			this.hideScheduler();
		},
		clearSchedule () {
			this.update({notify_at: null})
			this.hideScheduler();
		},
		updateStatus () {
			const oldStatus = parseInt(this.task.status)
			this.task.status = `${oldStatus >= 2 ? 0 : oldStatus + 1}`

			this.update()
		},
		enableEditableMode () {
			this.scheduler = null
			this.editableTask = this.clone(this.task)
		},
		disableEditableMode () {
			this.editableTask = null
		},
		saveChanges () {
			this.update(this.editableTask)
			this.disableEditableMode()
			this.hiddenFront = false
		},
		update (data) {
			if (data) {
				Object.assign(this.task, data)
			}

			this.send('update')
		},
		_delete () {
			if (!confirm('Точно удалить?'))
				return

			let adminTasksUpdated = this.user.admin_tasks.filter(item => item.id != this.task.id)
			adminTasksUpdated = this.refreshSteps(adminTasksUpdated)

			this.send('delete', () => {
				this.$on('wait', () => {
					this.$store.state.user.admin_tasks = adminTasksUpdated
				})
			})
		},
		refreshSteps (tasks) {
			tasks = tasks || this.user.admin_tasks
			let step = 1

			return tasks.map((item) => {
				item.step = step
				step++
				return item
			})
		},
		clone (object) {
			return JSON.parse(JSON.stringify(object))
		},
		send (method, successCallback) {
			successCallback = successCallback || (() => {})

			this.$emit('wait', true)

			this.$axios.post(`/tasks/${method}`, {
				secret: 255655,
				task: this.task
			}).then(successCallback).finally(() => {
				this.$emit('wait', false)
			})
		}
	}
}

</script>