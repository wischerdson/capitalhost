// export default {
// 	templates: [
// 		'Home',
// 		'Pay',
// 		'Domains',
// 		'Plug',
// 		'Profile',
// 		'Settings',
// 		'Analytics',
// 		'Ssl'
// 	],
// 	sections: [
// 		'Sidebar',
// 		'Topbar',
// 		'Footer'
// 	],
// 	components: [
// 		'Laradata',
// 		{
// 			'Modal': [
// 				'Modal',
// 				'ModalBody',
// 				'ModalHeader',
// 				'ModalFooter'
// 			]
// 		}
// 	]
// }

export default (view) => {

	view.namespace('templates').group((view) => {
		view.component('Home', 'home-page')
		view.component('Pay', 'pay-page')
		view.component('Domains', 'domains-page')
		view.component('Plug', 'plug-page')
		view.component('Profile', 'profile-page')
		view.component('Settings', 'settings-page')
		view.component('Analytics', 'analytics-page')
		view.component('Ssl', 'ssl-page')
	})

	view.namespace('sections').group((view) => {
		view.component('Header', 'section-header')
		view.component('Sidebar', 'section-sidebar')
	})

	view.namespace('components/modal').group((view) => {
		view.component('Modal', 'modal')
		view.component('ModalHeader', 'modal-header')
		view.component('ModalBody', 'modal-body')
		view.component('ModalFooter', 'modal-footer')
	})

}