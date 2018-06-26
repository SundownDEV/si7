import Vue from 'vue'
import Router from 'vue-router'

// Components

import Homepage from '@/components/Homepage'
import Login from '@/components/Login'
import Register from '@/components/Register'
import Error404 from '@/components/Error404'

import DashboardHomepage from '@/components/Dashboard/DashboardHomepage'

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
      path: '/Dashboard',
      redirect: '/Dashboard/homepage',
      name: 'Dashboard',
      component: {
        render (c) { return c('router-view') }
      },
      children: [
        {
          path: 'homepage',
          name: 'DashboardHomepage',
          component: DashboardHomepage
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
