<template>
  <v-navigation-drawer
    temporary
    v-model="drawer"
    absolute
  >
    <v-card flat>
      <!-- Top Drawer -->
      <v-card-media src="/img/game/drawer.jpg" height="auto">
        <v-layout column class="media">
          <v-card-title class="mb-0 pb-0">
            <v-spacer></v-spacer>
            <v-btn flat icon class="background-drawer-title" @click="drawer = false">
              <v-icon>chevron_left</v-icon>
            </v-btn>
          </v-card-title>

          <v-card-title class="justify-center mt-0 pt-0 mb-4 pb-0">
            <Account :size="68"></Account>
          </v-card-title>

          <v-card-title class="headline justify-center mb-0 pb-0 background-drawer-title">
            {{ user.pseudo }}
          </v-card-title>

          <v-card-title class="subheader justify-center mb-0 pb-2 background-drawer-title" style="height: auto!important">
            {{ user.first_name }} {{ user.last_name }}
          </v-card-title>

          <v-spacer></v-spacer>
        </v-layout>
      </v-card-media>

      <!-- Menu -->
      <v-list class="pt-2">

        <v-list-tile v-for="item in items" v-bind:key="item.title" @click="goToRoute(item)" class="pt-1 pb-1">
          <v-list-tile-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>{{ item.title }}</v-list-tile-title>
            <v-list-tile-sub-title>{{ item.subtitle }}</v-list-tile-sub-title>
          </v-list-tile-content>
        </v-list-tile>

      </v-list>
    </v-card>

  </v-navigation-drawer>
</template>

<style scoped>
  .background-drawer-title {
    background-color: #424242AF!important;
    color: #FFF;
  }
</style>

<script>
  import md5 from 'md5'
  import Account from '../account'

  export default{
    components: {
      Account
    },
    data: () => ({
      items: []
    }),
    created() {
      this.items = [
        {
          title: this.$t('app.layout.drawer.home.title'),
          subtitle: this.$t('app.layout.drawer.home.subtitle'),
          icon: 'home',
          link: '/'
        },
        {
          title: this.$t('app.layout.drawer.mission.title'),
          subtitle: this.$t('app.layout.drawer.mission.subtitle'),
          icon: 'event',
          link: '/mission'
        },
        {
          title: this.$t('app.layout.drawer.friends.title'),
          subtitle: this.$t('app.layout.drawer.friends.subtitle'),
          icon: 'supervisor_account',
          link: '/group'
        },
        {
          title: this.$t('app.layout.drawer.account.title'),
          subtitle: this.$t('app.layout.drawer.account.subtitle'),
          icon: 'settings',
          link: '/account'
        },
      ]
    },
    methods: {
      goToRoute: function (item) {
        this.drawer = false
        this.pageTitle = item.title
        this.$router.push(item.link)
      }
    },
    computed: {
      user: function() {
        return this.$store.state.user
      },
      avatar: function() {
        if(this.user.email) {
          return 'https://www.gravatar.com/avatar/' + md5('') + '?d=https%3A%2F%2Fcotama.herokuapp.com%2Fimg%2Fgame%2Fnophoto.gif'
        } else {
          return '/img/loading/cloud.gif'
        }
      },
      drawer: {
        get: function () {
          return this.$store.state.drawer
        },
        set: function (val) {
          this.$store.commit('setDrawer', val)
        }
      },
      pageTitle: {
        get: function () {
          return this.$store.state.pageTitle
        },
        set: function (val) {
          this.$store.commit('setPageTitle', val)
        }
      }
    },
  }
</script>
