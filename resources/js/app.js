require('./bootstrap');

window.Vue = require('vue');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Items', require('./components/ItemsComponent.vue').default);
Vue.component('Item', require('./components/ItemComponent.vue').default);

const app = new Vue({
    el: '#app',
});
