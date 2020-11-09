<script type="text/javascript">
	
	export default {
		template: '#template__pay',
		data () {
			return {
				step: 1,
				paymentMethod: null,
				paymentPeriod: null,
				amount: '0 ₽',
				amountInt: 0,
				animation: 'normal',
				amountInputFocused: false,
				dontShowSaleNotificationModal: false,
				saleNotificationModal: false
			}
		},
		watch: {
			step (value, oldValue) {
				switch (value + '') {
					case '1':
						this.paymentMethod = null
					break
				}

				this.animation = oldValue >= value ? 'reverse' : 'normal'
			},
			paymentMethod (value) {
				if (value)
					this.step++
			},
			paymentPeriod (value) {
				if (value)
					this.setAmount(value.price)
			}
		},
		computed: {
			planAmount () {
				return d.planAmount
			},
			allowDiscounts () {
				return !!d.allowDiscounts
			},
			periods () {
				const result = []
				const periods = [
					{period: 0, discount: 0},
					{period: 7, discount: 0},
					{period: 30, discount: 5},
					{period: 60, discount: 10},
					{period: 180, discount: 20},
					{period: 365, discount: 30},
				]

				for (const period of periods) {
					const amount = this.planAmount*period.period
					const discount = this.allowDiscounts ? period.discount : 0

					result.push({
						period: period.period,
						discount: discount,
						price: Math.ceil(amount - discount*amount/100),
						compareAtPrice: amount
					})
				}

				return result;
			},
			discount () {
				return this.findPeriod().discount
			},
			discountPeriod () {
				return this.findPeriod().period
			},
			registerPaymentUrl () {
				return d.createPaymentURI
			},
			saving () {
				return Math.floor(this.amountInt/(1 - this.discount/100)) - this.amountInt
			},
			planAmountWithDiscount () {
				return this.planAmount*(1 - this.discount/100)
			},
			term () {
				// Cумма, которая уйдет к концу срока действия скидки
				const a = this.planAmountWithDiscount*this.discountPeriod

				// Сколько денег останется после истечения срока действия скидки
				const b = this.amountInt - a

				// Сколько останется дней после истечения срока действия скидки
				const c = b/this.planAmount

				return Math.floor(c + this.discountPeriod)
			}
		},
		methods: {
			showModal () {
				if (this.allowDiscounts && !this.dontShowSaleNotificationModal && this.term < 180) {
					this.saleNotificationModal = true
					this.dontShowSaleNotificationModal = true
				} else {
					this.step++
				}
			},
			findPeriod () {
				const periods = this.periods

				for (let i = periods.length; i--; i>=0) {
					const period = periods[i]

					if (period.price <= this.amountInt) {
						return period
					}
				}
			},
			focusListener_amountInput (e) {
				this.amount = this.amountInt
				this.amountInputFocused = true
			},
			blurListener_amountInput (e) {
				this.setAmount(this.amount)
				this.amountInputFocused = false
			},
			setAmount (int) {
				int = parseInt(int)
				const r = (int != 0 && !int) ? 0 : int
				this.amountInt = r
				this.amount = r + ' ₽'
			},
			registerPayment () {
				this.$axios.post(this.registerPaymentUrl, {
					payment_method: this.paymentMethod.split('_')[0],
					amount: this.amountInt
				}).then(({data}) => {
					if (data.status == 'success')
						location.href = data.redirect
				}).catch((e) => {
					console.log(e)
				})
			}
		}
	}
// ln -s /home/capitalup/domains/capitalhost.ru/public /home/capitalup/domains/capitalhost.ru/public_html
</script>
