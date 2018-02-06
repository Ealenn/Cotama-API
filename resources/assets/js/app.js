import Vue from 'vue'

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import "vue-material-design-icons/styles.css"
import VueAxios from 'vue-axios'
import axios from 'axios'
import Vuex from 'vuex'
import vuexI18n from 'vuex-i18n'
import router from './router/'

Vue.use(Vuex)

const store = new Vuex.Store()
Vue.use(vuexI18n.plugin, store)

// Translate
let lang = document.querySelector('html').getAttribute('lang')
Vue.i18n.add(lang, require('./translate/' + lang).default)
Vue.i18n.set(lang)

// Axios
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
    primary: '#ee44aa',
    secondary: '#424242',
    accent: '#82B1FF',
    error: '#FF5252',
    info: '#2196F3',
    success: '#4CAF50',
    warning: '#FFC107'
  }})

import App from './components/app/app.vue'

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
