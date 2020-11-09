<script type="text/javascript">
	
	export default {
		template: '#template__home',
		data () {
			return {
				switchMode: 1
			}
		},
		methods: {
			playVideo ($elements) {
				for (const $el of $elements) {
					if ($el.dataset.playing === '1') {
						continue
					}

					const rect = $el.getBoundingClientRect()
					const windowHeight = window.innerHeight

					if (rect.top - windowHeight < 0) {
						$el.currentTime = 0
						$el.play()
						$el.dataset.playing = 1
					}
				}
			}
		},
		mounted () {
			const video = document.querySelectorAll('.delayed-play')

			for (const $el of video) {
				const $source = document.createElement('source')
				const src = $el.dataset.src

				$el.muted = true
				$el.loop = false
				$el.controls = false
				$el.defaultMuted = true
				$el.setAttribute('playsinline', '')
				$el.removeAttribute('data-src')
				$el.dataset.playing = 0

				$source.src = src
				$el.append($source)
				$el.play()
			}

			window.addEventListener('scroll', () => {
				this.playVideo(video)
			})
		}
	}

</script>