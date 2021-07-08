let login = require('./components/Auth/Login.vue').default;
let register = require('./components/Auth/register.vue').default;
let forget = require('./components/Auth/forget.vue').default;
let home = require('./components/home.vue').default;
let logout = require('./components/logout.vue').default;

//Start Employee
let createEmp = require('./components/Employee/create.vue').default;
let index = require('./components/Employee/index.vue').default;




export const  routes = [
    {path: '/', component: login, name: '/'},
    {path: '/register', component: register, name: '/register'},
    {path: '/forget', component: forget, name: '/forget'},
    {path: '/home', component: home, name: '/home'},
    {path: '/logout', component: logout, name: '/logout'},
    {path: '/create-employee', component: createEmp, name: '/create-employee'},
    {path: '/all-employee', component: index, name: '/index'},




]
