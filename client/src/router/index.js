import Vue from 'vue'
import Router from 'vue-router'

// Components

import Homepage from '@/components/Homepage'
import Login from '@/components/Login'
import Register from '@/components/Register'
import Error404 from '@/components/Error404'

import AdminHomepage from '@/components/admin/AdminHomepage'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Homepage',
      component: Homepage
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/register',
      name: 'Register',
      component: Register
    },
    {
      path: '/admin',
      redirect: '/admin/homepage',
      name: 'Admin',
      component: {
        render (c) { return c('router-view') }
      },
      children: [
        {
          path: 'homepage',
          name: 'AdminHomepage',
          component: AdminHomepage
        }
      ]
    },
    {
      path: '*',
      name: 'Error404',
      component: Error404
    }
  ]
})
