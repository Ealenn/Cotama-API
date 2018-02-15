import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import HomeView from '../components/app/pages/home'
import ProfilView from '../components/app/pages/profil'
import GroupView from '../components/app/pages/group'
import GroupAddView from '../components/app/pages/group_add'

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HomeView',
      component: HomeView
    },
    {
      path: '/profil',
      name: 'ProfilView',
      component: ProfilView
    },
    {
      path: '/profil/:id',
      name: 'ProfilIdView',
      component: ProfilView
    },
    {
      path: '/group',
      name: 'GroupView',
      component: GroupView
    },
    {
      path: '/group/add',
      name: 'GroupAddView',
      component: GroupAddView
    }
  ]
})
