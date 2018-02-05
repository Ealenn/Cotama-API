import Vue from 'vue'

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import "vue-material-design-icons/styles.css"
import VueAxios from 'vue-axios'
import axios from 'axios'
import Vuex from 'vuex'
import vuexI18n from 'vuex-i18n'
import translationFr from './translate/fr'
import translationEn from './translate/en'

Vue.use(Vuex)

const store = new Vuex.Store()
Vue.use(vuexI18n.plugin, store)
Vue.i18n.add('fr', translationFr)
Vue.i18n.add('en', translationEn)
Vue.i18n.set(document.querySelector('html').getAttribute('lang'))

axios.defaults.headers.common = {
  'X-Requested-With': 'XMLHttpRequest',
};
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

// axios.get('/api/users')
// .then(response => {
// console.log(response.data);
// });

Vue.use(VueAxios, axios)
Vue.use(Vuetify, { theme: {
    primary: '#1E88E5',
    secondary: '#424242',
    accent: '#82B1FF',
    error: '#FF5252',
    info: '#2196F3',
    success: '#4CAF50',
    warning: '#FFC107'
  }})

import Login from './components/auth/login'
import Register from './components/auth/register'
import Email from './components/auth/email'
import Reset from './components/auth/reset'
import Front from './components/front'

new Vue({
  el: '#app-front',
  components: { Login, Register, Email, Reset, Front }
})
