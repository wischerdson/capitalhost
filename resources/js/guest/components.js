// export default {
// 	templates: [
// 		'Home',
// 		'SignIn',
// 		'SignUp',
// 		'Terms',
// 		'PrivacyPolicy',
// 		'PasswordRecovery',
// 		'ChangePassword',
// 		'Vacancies',
// 		{
// 			'legal': [
// 				'&Index'
// 			]
// 		}
// 	],
// 	sections: [
// 		'Header',
// 		'Footer'
// 	],
// 	components: [
// 		'Laradata'
// 	]
// }

export default (view) => {

	view.namespace('templates').group((view) => {
		view.component('Home', 'home-page')
		view.component('SignIn', 'sign-in-page')
		view.component('SignUp', 'sign-up-page')
		view.component('PasswordRecovery', 'password-recovery-page')
		view.component('PasswordChange', 'password-change-page')
	})

	view.namespace('sections').group((view) => {
		view.component('Header', 'section-header')
	})

}