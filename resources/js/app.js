require('./bootstrap');


window.vue=require('vue');


// vue.component('example-component',require('./components/ExampleComponent.vue').default);
vue.component('attribute-component',require('./components/AttributeComponent.vue').default);



const app=new vue({
    el:'#app',
    components:[
        'attribute-component'
    ]
});