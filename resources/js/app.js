

require('./bootstrap');


window.Vue = require('vue');


// vue.component('example-component',require('./components/ExampleComponent.vue').default);
Vue.component('attribute-component', require('./components/AttributeComponent.vue').default);



const app=new Vue({
    el:'#app',

});