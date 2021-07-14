let login = require('./components/Auth/Login.vue').default;
let register = require('./components/Auth/register.vue').default;
let forget = require('./components/Auth/forget.vue').default;
let home = require('./components/home.vue').default;
let logout = require('./components/logout.vue').default;

//Start Employee
let createEmp = require('./components/Employee/create.vue').default;
let index = require('./components/Employee/index.vue').default;
let edit = require('./components/Employee/edit.vue').default;
//End Employee

//Start Supplier
let createSup = require('./components/Supplier/create.vue').default;
let indexSup = require('./components/Supplier/index.vue').default;
let editSup = require('./components/Supplier/edit.vue').default;
//End Supplier




export const  routes = [
    {path: '/', component: login, name: '/'},
    {path: '/register', component: register, name: '/register'},
    {path: '/forget', component: forget, name: '/forget'},
    {path: '/home', component: home, name: '/home'},
    {path: '/logout', component: logout, name: '/logout'},

    //Employee
    {path: '/create-employee', component: createEmp, name: '/create-employee'},
    {path: '/all-employee', component: index, name: '/all-employee'},
    {path: '/edit-employee/:id', component: edit, name: '/edit-employee'},

    //supplier
    {path: '/create-supplier', component: createSup, name: '/create-supplier'},
    {path: '/all-supplier', component: indexSup, name: '/all-supplier'},
    {path: '/edit-supplier/:id', component: editSup, name: '/edit-supplier'},

]
