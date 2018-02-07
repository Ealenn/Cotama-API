import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import HomeView from '../components/app/pages/home'
import GroupView from '../components/app/pages/group'

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HomeView',
      component: HomeView
    },
    {
      path: '/group',
      name: 'GroupView',
      component: GroupView
    }
  ]
})
