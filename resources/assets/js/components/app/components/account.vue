<template>
  <v-menu
    :offset-x="true"
    :close-on-content-click="true"
    :nudge-width="200"
    v-model="menu"
  >

    <v-btn flat fab slot="activator" :style="'height:' + size.toString() + 'px;width:' + size.toString() + 'px;'">
      <v-avatar :size="size">
        <img :src="avatar">
      </v-avatar>
    </v-btn>

    <v-card width="300">
      <v-toolbar color="secondary" dark class="elevation-0">
        <v-list style="background-color: transparent!important;">

          <v-list-tile>
            <v-list-tile-avatar>
              <img :src="avatar">
            </v-list-tile-avatar>

            <v-list-tile-content>
              <v-list-tile-title>{{ user.pseudo }}</v-list-tile-title>
              <v-list-tile-sub-title>{{ user.first_name }} {{ user.last_name }}</v-list-tile-sub-title>
            </v-list-tile-content>
          </v-list-tile>

        </v-list>
      </v-toolbar>

      <v-divider></v-divider>

      <v-list>
        <v-list-tile avatar>
          <v-list-tile-content>
            <v-list-tile-title>{{ 'app.components.account.level' | translate }} 1</v-list-tile-title>
            <v-list-tile-sub-title>
              <v-progress-linear value="10" height="5" color="success" class="mt-0"></v-progress-linear>
            </v-list-tile-sub-title>
          </v-list-tile-content>
        </v-list-tile>

        <v-list-tile @click="goTo('/profil')">
          <v-list-tile-action>
            <v-icon>account_box</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>{{ 'app.components.account.profil.title' | translate }}</v-list-tile-title>
            <v-list-tile-sub-title>{{ 'app.components.account.profil.subtitle' | translate }}</v-list-tile-sub-title>
          </v-list-tile-content>
        </v-list-tile>

        <v-list-tile @click="goTo('/account')">
          <v-list-tile-action>
            <v-icon>settings</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>{{ 'app.components.account.account.title' | translate }}</v-list-tile-title>
            <v-list-tile-sub-title>{{ 'app.components.account.account.subtitle' | translate }}</v-list-tile-sub-title>
          </v-list-tile-content>
        </v-list-tile>

        <v-list-tile @click="goTo('/logout', true)">
          <v-list-tile-action>
            <v-icon>exit_to_app</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>{{ 'app.components.account.exit.title' | translate }}</v-list-tile-title>
            <v-list-tile-sub-title>{{ 'app.components.account.exit.subtitle' | translate }}</v-list-tile-sub-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>

    </v-card>
  </v-menu>
</template>

<script>
  import md5 from 'md5'
  export default{
    props: {
      size: {
        type: Number,
        default: 40
      }
    },
    data: () => ({
      menu: false
    }),
    methods: {
      goTo: function (url, notVueRouter) {
        if(notVueRouter) {
          window.location.href = url
        } else {
          this.$router.push(url)
        }
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
      }
    },
  }
</script>
