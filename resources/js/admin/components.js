
export default (view) => {
	view.namespace('templates').group((view) => {
		view.component('Home', 'home-page')
	})

	view.namespace('sections').group((view) => {
		view.component('Sidebar', 'section-sidebar')
		view.component('UserDetails', 'section-user-details')
	})

	view.namespace('snippets').group((view) => {
		view.component('UserDetailsTask', 'snippet-user-details-task')
		view.component('UserInfoCard', 'snippet-user-info-card')
	})

	view.namespace('components').group((view) => {
		view.component('Pagination', 'component-pagination')
	})
}