import Vue from 'vue'

export default class View
{
	constructor (namespace)
	{
		namespace = namespace || '.'
		this.componentPath = namespace + '/'
	}

	namespace (name)
	{
		const namespace = this.componentPath + name
		const instance = new View(namespace)
		return instance
	}

	component (component, element)
	{
		const path = this.componentPath + component[0].toUpperCase() + component.substring(1)
		Vue.component(element, require(`${path}.vue`).default)
	}
	
	group (closure)
	{
		closure(this)
	}
}