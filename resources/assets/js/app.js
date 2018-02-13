import Vue from 'vue'

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import 'vue-material-design-icons/styles.css'
import 'vue2-animate/dist/vue2-animate.min.css'

import VueAxios from 'vue-axios'
import axios from 'axios'
import Vuex from 'vuex'
import vuexI18n from 'vuex-i18n'
import router from './router/'
import VueMasonry from 'vue-masonry-css'

Vue.use(VueMasonry)
Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    drawer: false,
    pageTitle: 'Accueil',
    snackbar: false,
    snackbarText: '',
    user: {}
  },
  mutations: {
    setDrawer: (state, newDrawer) => {
      state.drawer = newDrawer
    },
    toggleDrawer: state => {
      state.drawer = !state.drawer
    },
    setPageTitle: (state, title) => {
      state.pageTitle = title
      state.drawer = title === 'Home'
    }
  }
})
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


// Vue
Vue.use(VueAxios, axios)
Vue.use(Vuetify, { theme: {
    primary: "#03A9F4",
    secondary: "#2196F3",
    accent: "#1976D2",
    error: '#FF5252',
    info: '#2196F3',
    success: '#4CAF50',
    warning: '#FFC107'
  }})

import App from './components/app/app.vue'

/* eslint-disable no-new */
new Vue({
  el: '#app',
  store,
  router,
  components: { App },
  template: '<App/>'
})
