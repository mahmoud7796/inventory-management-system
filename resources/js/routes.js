let login = require('./components/Auth/Login.vue').default;
let register = require('./components/Auth/register.vue').default;
let forget = require('./components/Auth/forget.vue').default;

export const  routes = [
    {path: '/', component: login, name: '/'},
    {path: '/register', component: register, name: '/register'},
    {path: '/forget', component: forget, name: '/forget'},
]
