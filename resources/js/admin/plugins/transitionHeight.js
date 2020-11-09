
export default (app, inject) => {
	inject('transitionHeight', function ($element, callback) {
		let oldHeight = getComputedStyle($element).getPropertyValue('height')
		callback()

		$element.style.height = 'auto'

		let newHeight = getComputedStyle($element).getPropertyValue('height')

		$element.style.height = oldHeight

		setTimeout(function () {
			$element.style.height = newHeight
		}, 10)

		$element.addEventListener('transitionend', function () {
			$element.style.height = ''
		})
	})
}