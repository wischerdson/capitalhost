(window.webpackJsonp=window.webpackJsonp||[]).push([[4],{2:function(t,e,n){t.exports=n("Awo/")},"8oxB":function(t,e){var n,i,r=t.exports={};function o(){throw new Error("setTimeout has not been defined")}function s(){throw new Error("clearTimeout has not been defined")}function a(t){if(n===setTimeout)return setTimeout(t,0);if((n===o||!n)&&setTimeout)return n=setTimeout,setTimeout(t,0);try{return n(t,0)}catch(e){try{return n.call(null,t,0)}catch(e){return n.call(this,t,0)}}}!function(){try{n="function"==typeof setTimeout?setTimeout:o}catch(t){n=o}try{i="function"==typeof clearTimeout?clearTimeout:s}catch(t){i=s}}();var u,c=[],l=!1,d=-1;function f(){l&&u&&(l=!1,u.length?c=u.concat(c):d=-1,c.length&&h())}function h(){if(!l){var t=a(f);l=!0;for(var e=c.length;e;){for(u=c,c=[];++d<e;)u&&u[d].run();d=-1,e=c.length}u=null,l=!1,function(t){if(i===clearTimeout)return clearTimeout(t);if((i===s||!i)&&clearTimeout)return i=clearTimeout,clearTimeout(t);try{i(t)}catch(e){try{return i.call(null,t)}catch(e){return i.call(this,t)}}}(t)}}function p(t,e){this.fun=t,this.array=e}function m(){}r.nextTick=function(t){var e=new Array(arguments.length-1);if(arguments.length>1)for(var n=1;n<arguments.length;n++)e[n-1]=arguments[n];c.push(new p(t,e)),1!==c.length||l||a(h)},p.prototype.run=function(){this.fun.apply(null,this.array)},r.title="browser",r.browser=!0,r.env={},r.argv=[],r.version="",r.versions={},r.on=m,r.addListener=m,r.once=m,r.off=m,r.removeListener=m,r.removeAllListeners=m,r.emit=m,r.prependListener=m,r.prependOnceListener=m,r.listeners=function(t){return[]},r.binding=function(t){throw new Error("process.binding is not supported")},r.cwd=function(){return"/"},r.chdir=function(t){throw new Error("process.chdir is not supported")},r.umask=function(){return 0}},"9BDi":function(t,e,n){"use strict";n.r(e);var i=n("9a8T"),r=n.n(i);e.default=function(t,e){e("aos",r.a)}},"Awo/":function(t,e,n){"use strict";n.r(e);var i=n("XuX8"),r=n.n(i),o=n("ique"),s=n("L2JU");r.a.use(s.default);var a=new s.default.Store({modules:{},state:{user:null,users:null},getters:{user:function(t){return t.user}},mutations:{user:function(t,e){t.user=e},users:function(t,e){t.users=e.map((function(t){return t.balance=+(+t.balance).toFixed(2),t}))}}});function u(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}var c,l,d,f=function(){function t(e){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),e=e||".",this.componentPath=e+"/"}var e,i,o;return e=t,(i=[{key:"namespace",value:function(e){var n=this.componentPath+e;return new t(n)}},{key:"component",value:function(t,e){var i=this.componentPath+t[0].toUpperCase()+t.substring(1);r.a.component(e,n("LV1Z")("".concat(i,".vue")).default)}},{key:"group",value:function(t){t(this)}}])&&u(e.prototype,i),o&&u(e,o),t}(),h={render:function(t){return t(o.default)},store:a};c=h,r.a,l=function(t,e){var n="$".concat(t);c[n]=e,c.store[n]=e,"__construct"in e&&e.__construct(),r.a.use((function(){r.a.prototype.hasOwnProperty(n)||Object.defineProperty(r.a.prototype,n,{get:function(){return this.$root.$options[n]}})}))},n("MH+P").default(c,l),n("9BDi").default(c,l),n("S/tw").default(c,l),n("aqoO").default(c,l),(d=new f).namespace("templates").group((function(t){t.component("Home","home-page")})),d.namespace("sections").group((function(t){t.component("Sidebar","section-sidebar"),t.component("UserDetails","section-user-details")})),d.namespace("snippets").group((function(t){t.component("UserDetailsTask","snippet-user-details-task"),t.component("UserInfoCard","snippet-user-info-card")})),d.namespace("components").group((function(t){t.component("Pagination","component-pagination")})),new r.a(h).$mount("#app")},Bl4t:function(t,e,n){"use strict";n.r(e);var i={template:"#snippet_userInfoCard",props:["user"],data:function(){return{reloading:!1}},computed:{selectedUser:function(){return this.$store.getters.user},hColor:function(){return this.user.freeze_in>168?"green":this.user.freeze_in<=0?"red":"yellow"},dColor:function(){return this.user.domains.length?"green":"red"},sColor:function(){return this.user.purchased_ssl.length?"green":"red"},unresolvedTasksCount:function(){return this.user.admin_tasks.reduce((function(t,e){return 2!=e.status?t+1:t}),0)}},methods:{selectUser:function(){this.$store.state.user=this.user},reloadSite:function(){var t=this,e="https://".concat(this.user.domains[0].name,"/reload.php?secretKey=").concat(d.tildaSecret);this.reloading=!0,this.$axios.post(e,null,{transformRequest:[function(t,e){return delete e.common["X-CSRF-TOKEN"],t}]}).finally((function(){t.reloading=!1}))}}},r=n("KHd+"),o=Object(r.a)(i,void 0,void 0,!1,null,null,null);e.default=o.exports},"KHd+":function(t,e,n){"use strict";function i(t,e,n,i,r,o,s,a){var u,c="function"==typeof t?t.options:t;if(e&&(c.render=e,c.staticRenderFns=n,c._compiled=!0),i&&(c.functional=!0),o&&(c._scopeId="data-v-"+o),s?(u=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),r&&r.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(s)},c._ssrRegister=u):r&&(u=a?function(){r.call(this,(c.functional?this.parent:this).$root.$options.shadowRoot)}:r),u)if(c.functional){c._injectStyles=u;var l=c.render;c.render=function(t,e){return u.call(e),l(t,e)}}else{var d=c.beforeCreate;c.beforeCreate=d?[].concat(d,u):[u]}return{exports:t,options:c}}n.d(e,"a",(function(){return i}))},LV1Z:function(t,e,n){var i={"./App.vue":"ique","./components/Pagination.vue":"yO1z","./sections/Sidebar.vue":"Xju3","./sections/UserDetails.vue":"RXR7","./snippets/UserDetailsTask.vue":"ch0S","./snippets/UserInfoCard.vue":"Bl4t","./templates/Home.vue":"UrGV"};function r(t){var e=o(t);return n(e)}function o(t){if(!n.o(i,t)){var e=new Error("Cannot find module '"+t+"'");throw e.code="MODULE_NOT_FOUND",e}return i[t]}r.keys=function(){return Object.keys(i)},r.resolve=o,t.exports=r,r.id="LV1Z"},"MH+P":function(t,e,n){"use strict";n.r(e);var i=n("vDqi"),r=n.n(i);e.default=function(t,e){r.a.defaults.baseURL=document.querySelector('meta[name="base-url"]').getAttribute("content"),r.a.defaults.headers.common["X-CSRF-TOKEN"]=document.querySelector('meta[name="csrf-token"]').getAttribute("content"),r.a.defaults.headers.common.Accept="application/json",r.a.defaults.headers.post["Content-Type"]="application/json",e("axios",r.a)}},RXR7:function(t,e,n){"use strict";n.r(e);var i={template:"#template_section_userDetails",data:function(){return{wait:!1,editableTask:null,scheduler:null}},computed:{createdAt:function(){var t=new Date(this.user.created_at);return t.getDate()+" "+["января","февраля","марта","апреля","мая","июня","июля","августа","сентября","октября","ноября","декабря"][t.getMonth()]+" "+t.getFullYear()},statusColor:function(){return this.user.freeze_in>168?"green":this.user.freeze_in<168&&this.user.freeze_in>0?"yellow":"red"},user:function(){return this.$store.getters.user},discountTimeRemaining:function(){var t=Date.now()/1e3,e=(this.user.discount_expire_at-t)/60/60/24;return Math.floor(e)},freezeIn:function(){var t=this.user.freeze_in;if(t<=0)return 0;var e=Math.floor(t/24);return e>0?e+" дн.":t+" ч."},isOpen:function(){return!!this.user}},methods:{setWait:function(t){this.wait=t},createTask:function(){var t=this,e=this.user.admin_tasks.reduce((function(t,e){return e.step>=t?e.step+1:t}),1),n={user_id:this.user.id,name:"Новая задача",step:e,status:"0"};this.send("tasks/create",{task:n},(function(e){var n=e.data;t.user.admin_tasks.push(n.task)}))},send:function(t,e,n){var i=this;n=n||function(){},this.wait=!0,e.secret="255655",this.$axios.post("/".concat(t),e).then(n).finally((function(){i.wait=!1}))},copyToClipboard:function(t,e){navigator.clipboard.writeText(t);var n=e.target.closest(".copy-to-clipboard"),i=n.querySelector(".copy"),r=n.querySelector(".tick");i.style.display="none",r.style.display="",setTimeout((function(){i.style.display="",r.style.display="none"}),2e3)}}},r=n("KHd+"),o=Object(r.a)(i,void 0,void 0,!1,null,null,null);e.default=o.exports},"S/tw":function(t,e,n){"use strict";n.r(e);var i=n("Hc5T"),r=n.n(i),o=n("XuX8"),s=n.n(o);e.default=function(t,e){s.a.use(r.a)}},URgk:function(t,e,n){(function(t){var i=void 0!==t&&t||"undefined"!=typeof self&&self||window,r=Function.prototype.apply;function o(t,e){this._id=t,this._clearFn=e}e.setTimeout=function(){return new o(r.call(setTimeout,i,arguments),clearTimeout)},e.setInterval=function(){return new o(r.call(setInterval,i,arguments),clearInterval)},e.clearTimeout=e.clearInterval=function(t){t&&t.close()},o.prototype.unref=o.prototype.ref=function(){},o.prototype.close=function(){this._clearFn.call(i,this._id)},e.enroll=function(t,e){clearTimeout(t._idleTimeoutId),t._idleTimeout=e},e.unenroll=function(t){clearTimeout(t._idleTimeoutId),t._idleTimeout=-1},e._unrefActive=e.active=function(t){clearTimeout(t._idleTimeoutId);var e=t._idleTimeout;e>=0&&(t._idleTimeoutId=setTimeout((function(){t._onTimeout&&t._onTimeout()}),e))},n("YBdB"),e.setImmediate="undefined"!=typeof self&&self.setImmediate||void 0!==t&&t.setImmediate||this&&this.setImmediate,e.clearImmediate="undefined"!=typeof self&&self.clearImmediate||void 0!==t&&t.clearImmediate||this&&this.clearImmediate}).call(this,n("yLpj"))},UrGV:function(t,e,n){"use strict";n.r(e);var i={template:"#template__home",data:function(){return{wait:!1,pagination:{currentPage:null,total:null,totalPages:null,perPage:null},timeout:null,search:""}},watch:{search:function(){var t=this;clearTimeout(this.timeout),this.timeout=setTimeout((function(){t.pagination.currentPage=1,t.refreshUsers()}),700)}},computed:{user:function(){return this.$store.getters.user},users:function(){return this.$store.state.users}},methods:{selectUser:function(t){var e=this.users.find((function(e){return e.id===t}));this.$store.commit("user",e)},refreshUsers:function(){var t=this;this.wait=!0;var e="/users/".concat(this.search?"search":"get");this.$axios.post(e,{secret:255655,page:this.pagination.currentPage,search:this.search}).then((function(e){var n=e.data;t.$store.commit("users",n.data),t.pagination.currentPage=n.current_page,t.pagination.total=n.total,t.pagination.perPage=n.per_page,t.pagination.totalPages=Math.ceil(t.pagination.total/t.pagination.perPage)})).finally((function(){t.wait=!1}))},pageChanged:function(t){this.pagination.currentPage=t,this.refreshUsers()}},mounted:function(){var t=new URLSearchParams(document.location.search);this.pagination.currentPage=+ +t.get("page")||1,this.refreshUsers()}},r=n("KHd+"),o=Object(r.a)(i,void 0,void 0,!1,null,null,null);e.default=o.exports},Xju3:function(t,e,n){"use strict";n.r(e);var i={template:"#template_section_sidebar"},r=n("KHd+"),o=Object(r.a)(i,void 0,void 0,!1,null,null,null);e.default=o.exports},YBdB:function(t,e,n){(function(t,e){!function(t,n){"use strict";if(!t.setImmediate){var i,r,o,s,a,u=1,c={},l=!1,d=t.document,f=Object.getPrototypeOf&&Object.getPrototypeOf(t);f=f&&f.setTimeout?f:t,"[object process]"==={}.toString.call(t.process)?i=function(t){e.nextTick((function(){p(t)}))}:!function(){if(t.postMessage&&!t.importScripts){var e=!0,n=t.onmessage;return t.onmessage=function(){e=!1},t.postMessage("","*"),t.onmessage=n,e}}()?t.MessageChannel?((o=new MessageChannel).port1.onmessage=function(t){p(t.data)},i=function(t){o.port2.postMessage(t)}):d&&"onreadystatechange"in d.createElement("script")?(r=d.documentElement,i=function(t){var e=d.createElement("script");e.onreadystatechange=function(){p(t),e.onreadystatechange=null,r.removeChild(e),e=null},r.appendChild(e)}):i=function(t){setTimeout(p,0,t)}:(s="setImmediate$"+Math.random()+"$",a=function(e){e.source===t&&"string"==typeof e.data&&0===e.data.indexOf(s)&&p(+e.data.slice(s.length))},t.addEventListener?t.addEventListener("message",a,!1):t.attachEvent("onmessage",a),i=function(e){t.postMessage(s+e,"*")}),f.setImmediate=function(t){"function"!=typeof t&&(t=new Function(""+t));for(var e=new Array(arguments.length-1),n=0;n<e.length;n++)e[n]=arguments[n+1];var r={callback:t,args:e};return c[u]=r,i(u),u++},f.clearImmediate=h}function h(t){delete c[t]}function p(t){if(l)setTimeout(p,0,t);else{var e=c[t];if(e){l=!0;try{!function(t){var e=t.callback,n=t.args;switch(n.length){case 0:e();break;case 1:e(n[0]);break;case 2:e(n[0],n[1]);break;case 3:e(n[0],n[1],n[2]);break;default:e.apply(void 0,n)}}(e)}finally{h(t),l=!1}}}}}("undefined"==typeof self?void 0===t?this:t:self)}).call(this,n("yLpj"),n("8oxB"))},aqoO:function(t,e,n){"use strict";n.r(e),e.default=function(t,e){e("transitionHeight",(function(t,e){var n=getComputedStyle(t).getPropertyValue("height");e(),t.style.height="auto";var i=getComputedStyle(t).getPropertyValue("height");t.style.height=n,setTimeout((function(){t.style.height=i}),10),t.addEventListener("transitionend",(function(){t.style.height=""}))}))}},ch0S:function(t,e,n){"use strict";n.r(e);var i={template:"#snippet_userDetails_task",props:["task"],data:function(){return{months:["January","February","March","April","May","June","July","August","September","October","November","December"],scheduler:null,hiddenFront:!1,editableTask:null}},computed:{user:function(){return this.$store.getters.user}},methods:{quickEdit:function(){var t=this;this.hiddenFront=!0,this.enableEditableMode(),setTimeout((function(){t.$refs.taskNameInput.focus(),t.$refs.taskNameInput.select()}),10)},addZeroToDateIfItNecessary:function(t){return(t=parseInt(t))<=9?"0".concat(t):"".concat(t)},showScheduler:function(){var t=new Date;t.setTime(1e3*this.task.notify_at||t),this.scheduler={hour:t.getHours(),minute:t.getMinutes(),day:t.getDate(),month:t.getMonth(),year:t.getFullYear()},this.formatSchedulerData(),this.hiddenFront=!0},hideScheduler:function(){var t=this;this.hiddenFront=!1,setTimeout((function(){t.scheduler=null}),500)},formatSchedulerData:function(){for(var t in this.scheduler)"month"!=t&&(this.scheduler[t]=this.addZeroToDateIfItNecessary(this.scheduler[t]))},saveSchedule:function(){this.formatSchedulerData();var t="".concat(this.scheduler.year,"-").concat(this.scheduler.month+1,"-").concat(this.scheduler.day,"T").concat(this.scheduler.hour,":").concat(this.scheduler.minute,":00"),e=new Date(t);this.update({notify_at:Math.floor(e/1e3)}),this.hideScheduler()},clearSchedule:function(){this.update({notify_at:null}),this.hideScheduler()},updateStatus:function(){var t=parseInt(this.task.status);this.task.status="".concat(t>=2?0:t+1),this.update()},enableEditableMode:function(){this.scheduler=null,this.editableTask=this.clone(this.task)},disableEditableMode:function(){this.editableTask=null},saveChanges:function(){this.update(this.editableTask),this.disableEditableMode(),this.hiddenFront=!1},update:function(t){t&&Object.assign(this.task,t),this.send("update")},_delete:function(){var t=this;if(confirm("Точно удалить?")){var e=this.user.admin_tasks.filter((function(e){return e.id!=t.task.id}));e=this.refreshSteps(e),this.send("delete",(function(){t.$on("wait",(function(){t.$store.state.user.admin_tasks=e}))}))}},refreshSteps:function(t){t=t||this.user.admin_tasks;var e=1;return t.map((function(t){return t.step=e,e++,t}))},clone:function(t){return JSON.parse(JSON.stringify(t))},send:function(t,e){var n=this;e=e||function(){},this.$emit("wait",!0),this.$axios.post("/tasks/".concat(t),{secret:255655,task:this.task}).then(e).finally((function(){n.$emit("wait",!1)}))}}},r=n("KHd+"),o=Object(r.a)(i,void 0,void 0,!1,null,null,null);e.default=o.exports},ique:function(t,e,n){"use strict";n.r(e);var i={template:"#app"},r=n("KHd+"),o=Object(r.a)(i,void 0,void 0,!1,null,null,null);e.default=o.exports},yLpj:function(t,e){var n;n=function(){return this}();try{n=n||new Function("return this")()}catch(t){"object"==typeof window&&(n=window)}t.exports=n},yO1z:function(t,e,n){"use strict";n.r(e);var i={template:"#component_pagination",props:["totalPages","currentPage"],data:function(){return{timeout:null}},watch:{currentPage:function(){var t=document.location.search,e=new URLSearchParams(t);e.set("page",this.currentPage);var n=e.toString();history.pushState(null,null,"".concat(document.location.pathname,"?").concat(n))}},computed:{paginationOffset:function(){var t=this.currentPage-2-1;return 35*-(t=(t=t+2+1>this.totalPages-2?this.totalPages-4-1:t)<=0?0:t)},setPage:function(t){var e=this;clearTimeout(this.timeout),this.timeout=setTimeout((function(){e.$emit("change",t)}),700)}},mounted:function(){}},r=n("KHd+"),o=Object(r.a)(i,void 0,void 0,!1,null,null,null);e.default=o.exports}},[[2,0,1]]]);