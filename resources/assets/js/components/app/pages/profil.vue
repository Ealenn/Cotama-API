<template>
  <div>
    <v-bottom-nav
      v-if="!error"
      fixed
      app
      shift
      dark
      color="primary"
      :active.sync="e2"
      style="left: 0;bottom: 0;margin-bottom: 60px;"
    >
      <v-btn dark key="Activity"><span>Activités</span> <v-icon>timeline</v-icon></v-btn>
      <v-btn dark key="Stats"><span>Statistiques</span> <v-icon>pie_chart</v-icon></v-btn>
      <v-btn dark key="Trophy"><span>Trophés</span> <v-icon>fa-trophy</v-icon></v-btn>
      <v-btn dark key="Preferences"><span>Préférences</span> <v-icon>favorite</v-icon></v-btn>
    </v-bottom-nav>

    <v-layout row wrap>
      <!-- --- Loading --- -->
      <v-flex xs12 v-if="loading">
        <Placeholder
          type="card"
          :photo="true"
          :title="false"
          :description="true"
          :number="1"
          :button="false"
          :head="true"> </Placeholder>
        <Placeholder
          type="table"
          :number="10"> </Placeholder>
      </v-flex>

      <!-- --- 403/404 --- -->
      <v-flex xs12 v-if="error">
        <v-alert v-model="error" type="error" :value="true">
          <!-- // Todo -->
          This is a error alert.
        </v-alert>
        <v-btn outline color="primary">Retour</v-btn>
      </v-flex>

      <!-- --- Profil --- -->
      <v-layout row wrap xs12 class="mb-0 pb-0 mt-3 pt-3 pb-3 white elevation-1" v-if="!loading && !error">
        <v-flex xs12 sm8 md6 class="text-xs-center" align-center justify-center>
          <v-avatar size="128" class="elevation-1">
            <img :src="avatar" v-if="profil.email">
            <img src="/img/loading/cloud.gif" v-else>
          </v-avatar>
          <h1 class="display-1 pt-1">{{ profil.first_name }} {{ profil.last_name }}</h1>
          <span class="headline">{{ profil.pseudo }}</span>
        </v-flex>
        <v-flex xs12 sm4 md6 color="primary">
          <v-list>
            <v-list-tile class="profil">
              <v-list-tile-content>
                <v-list-tile-title class="title" style="text-transform: uppercase">Level title</v-list-tile-title>
                <v-list-tile-title>Niveau 0</v-list-tile-title>
                <v-list-tile-sub-title>
                  <span>0 XP</span>
                </v-list-tile-sub-title>
                <v-list-tile-sub-title>
                  <v-progress-linear value="30" height="5" color="accent" style="width: 100%;"></v-progress-linear>
                </v-list-tile-sub-title>
              </v-list-tile-content>
            </v-list-tile>
            <v-list-tile class="profil">
              <v-list-tile-content>
                <v-list-tile-sub-title>Membre depuis {{ profil.created_at | moment("from", "now", true) }}</v-list-tile-sub-title>
              </v-list-tile-content>
            </v-list-tile>
          </v-list>
        </v-flex>
      </v-layout>

      <v-flex xs12 class="mb-5 mt-0 pt-0 pt-0" v-if="!loading && !error">

        <!-- --- Time line --- -->
        <div class="container" v-if="e2 === 0">
          <Timeline> </Timeline>
        </div>

        <!-- --- Stats --- -->
        <Profil_stats :active="this.e2 === 1" :style="this.e2 !== 1 ? 'display: none!important' : ''"> </Profil_stats>

      </v-flex>

    </v-layout>
  </div>
</template>

<style>
  .profil .list__tile{height: auto!important;}
  .profil {padding-top: 10px!important; padding-bottom: 10px!important;}
</style>

<script>
  import axios from 'axios'
  import md5 from 'md5'
  import Placeholder from '../components/layout/placeholder'

  import Timeline from '../components/timeline'
  import Profil_stats from '../pages/profil_stats'

  export default{
    components:{
      Timeline,
      Placeholder,
      Profil_stats
    },
    data: () => ({
      e2: 0,
      id: null,
      loading: true,
      error: false,
      profil: {}
    }),
    mounted() {
      if(this.$store.state.user.id !== undefined){
        this.updateUI()
      } else {
        axios.get('/api/users')
          .then(response => {
            this.$store.state.user = response.data
            this.updateUI()
          }).catch(response => {
            window.location = '/login'
        });
      }
    },
    computed: {
      lang: function () {
        return document.querySelector('html').getAttribute('lang').toLowerCase()
      },
      avatar: function() {
        if(this.profil.email) {
          return 'https://www.gravatar.com/avatar/' + md5(this.profil.email) + '?d=https%3A%2F%2Fcotama.herokuapp.com%2Fimg%2Fgame%2Fnophoto.gif'
        } else {
          return '/img/loading/cloud.gif'
        }
      }
    },
    methods: {
      updateUI: function () {
        this.id = this.$store.state.user.id
        if(this.$route.params.id) {
          this.id = this.$route.params.id
        }
        // Ajax
        axios.get('/' + this.lang + '/api/users/' + this.id).then(response => {
          this.loading = false
          this.profil = response.data
        }).catch(error => {
          this.loading = false
          this.error = true
          console.log(error.response)
        });
      }
    }
  }
</script>
