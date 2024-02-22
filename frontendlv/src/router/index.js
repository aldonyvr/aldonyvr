import Vue from 'vue'
import Router from 'vue-router'

import Register from '@/components/Register'
import Login from '@/components/Login'
import Nav from '@/components/Nav'
import UserPage from '@/components/UserPage'
import AdminPage from '@/components/AdminPage'
import DataUser from '@/components/DataUser'
import Datauserr from '@/components/Datauserr'
import NavUser from '@/components/NavUser'
import AddUser from '@/components/AddUser'
import EditUser from '@/components/EditUser'
import Home from '@/components/HomePage.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/register',
      name: 'Register',
      component: Register,
    },
    {
      path: '/login',
      name: 'Login',
      component: Login,
    },

    {
      path: '/nav',
      name: 'Nav',
      component: Nav,
    },

    {
      path: '/user',
      name: 'UserPage',
      component: UserPage,
      meta: { requiresAuth: true }
    },

    {
      path: '/admin',
      name: 'AdminPage',
      component: AdminPage,
      meta: { requiresAuth: true }
    },

    {
      path: '/datauser',
      name: 'DataUser',
      component: DataUser,
      meta: { requiresAuth: true }
    },

    {
      path: '/datauserr',
      name: 'Datauserr',
      component: Datauserr,
      meta: { requiresAuth: true }
    },

    {
      path: '/navuser',
      name: 'NavUser',
      component: NavUser,
      meta: { requiresAuth: true }
    },

    {
      path: '/AddUser',
      name: 'AddUser',
      component: AddUser,
      meta: { requiresAuth: true }
    },

    {
      path: '/edituser/:id',
      name: 'EditUser',
      component: EditUser,
      meta: { requiresAuth: true }
    },

    {
      path: '/',
      name: 'Home',
      component: Home,
    }
  ]
});





