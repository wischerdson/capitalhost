export default (app, inject) => {
	inject('smartEnding', function (number, forms) {
		let rest = number % 10
		number = parseInt((number + '').substring(-2, 2))
		if (rest === 1 && number != 11)
			return forms[0]
		if ([2, 3, 4].indexOf(rest) >= 0 && [12, 13, 14].indexOf(number) < 0)
			return forms[1]
		return forms[2]
	})
}