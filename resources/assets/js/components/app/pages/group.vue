<template>
  <v-layout row wrap>

    <v-btn fab dark
           @click="$router.push('/group/add')"
           color="indigo"
           style="position: fixed;bottom: 0;right: 0;margin: 35px;z-index: 100">
      <v-icon dark>add</v-icon>
    </v-btn>

    <!-- --- Loading --- -->
    <v-flex xs12 v-if="loading">
    <Placeholder
      type="card"
      :photo="true"
      :title="true"
      :description="true"
      :number="5"
      :button="false"
      :head="true"> </Placeholder>
    </v-flex>

    <!-- Aucun group -->
    <v-flex xs12 v-if="!loading && groups.length === 0">
      <v-card color="success" class="white--text mb-3">
        <v-container fluid grid-list-lg>
          <v-layout row>
            <v-flex xs7>
              <div>
                <div class="headline">{{ 'app.pages.group.notification.title' | translate }}</div>
                <div>{{ 'app.pages.group.notification.text' | translate }} <v-icon dark>add</v-icon></div>
              </div>
            </v-flex>
            <v-flex xs5>
              <v-card-media
                src="/img/game/stickman-lauch.png"
                height="125px"
                contain
              > </v-card-media>
            </v-flex>
          </v-layout>
        </v-container>
      </v-card>
    </v-flex>

    <!-- --- Group --- -->
    <v-flex xs12>
      <masonry
        :cols="{default: 2, 1300: 2, 950: 1, 600: 1}"
        :gutter="{default: '30px', 700: '15px'}"
      >
          <v-flex class="item" v-for="group in groups" :key="group.foyer.id">
              <v-card class="mb-3 mr-3">
              <v-toolbar flat dark color="accent">
                <v-toolbar-title class="white--text">
                  {{ group.foyer.content.name }}
                </v-toolbar-title>
                <v-spacer> </v-spacer>
                <v-menu offset-y>
                  <v-btn icon dark slot="activator">
                    <v-icon>more_vert</v-icon>
                  </v-btn>
                  <v-list>
                    <v-list-tile @click="updateGroup(group)" v-if="isAdmin(group.foyer, connectedUser)">
                      <v-list-tile-title>
                        <v-icon>edit</v-icon>
                        {{ 'app.pages.group.menu.update' | translate }}
                      </v-list-tile-title>
                    </v-list-tile>
                    <v-list-tile @click="">
                      <v-list-tile-title>
                        <v-icon>exit_to_app</v-icon>
                        {{ 'app.pages.group.menu.exit' | translate }}
                      </v-list-tile-title>
                    </v-list-tile>
                  </v-list>
                </v-menu>
              </v-toolbar>

              <v-list subheader>
                <v-list-tile avatar v-for="user in group.users" :key="user.email" @click="$router.push('/profil/' + user.id)">
                  <v-list-tile-avatar>
                    <v-avatar size="48">
                      <img :src="getAvatar(user.email)">
                    </v-avatar>
                  </v-list-tile-avatar>

                  <v-list-tile-content>
                    <v-list-tile-title>{{ user.first_name }} ({{ user.pseudo }})</v-list-tile-title>

                    <v-list-tile-sub-title v-if="isAdmin(group.foyer, user)">
                      {{ 'app.pages.group.admin' | translate }}
                    </v-list-tile-sub-title>

                    <v-list-tile-sub-title v-else>
                      {{ 'app.pages.group.member' | translate }}
                    </v-list-tile-sub-title>

                  </v-list-tile-content>

                  <v-list-tile-action v-if="isAdmin(group.foyer, connectedUser) || connectedUser.email === user.email">
                    <v-btn icon ripple @click="">
                      <v-icon color="grey lighten-1">delete</v-icon>
                    </v-btn>
                  </v-list-tile-action>
                </v-list-tile>
              </v-list>

            </v-card>
          </v-flex>
      </masonry>
    </v-flex>
  </v-layout>
</template>

<script>
  import md5 from 'md5'
  import axios from 'axios'
  import Placeholder from '../components/layout/placeholder'

  export default{
    components: {
      Placeholder
    },
    data: () => ({
      loading: true,
      groups: []
    }),
    computed: {
      connectedUser: function () {
        return this.$store.state.user
      }
    },
    methods: {
      getAvatar: function (email) {
        return 'https://www.gravatar.com/avatar/' + md5(email) + '?d=https%3A%2F%2Fcotama.herokuapp.com%2Fimg%2Fgame%2Fnophoto.gif'
      },
      goTo: function (page) {
        this.$router.push(page)
      },
      isAdmin: function (foyer, user) {
        var emailsAdmin = []
        foyer.admin.forEach((i) => {
          emailsAdmin.push(i.email)
        })
        return emailsAdmin.includes(user.email)
      },
      updateGroup: function (group) {
        this.$router.push(
          {
            name: 'GroupAddView',
            params: {
              id: group.foyer.content.id,
              name: group.foyer.content.name
            }
          }
        )
      }
    },
    mounted () {
      this.loading = true
      axios.get('/api/foyer')
        .then(response => {
          this.groups = response.data
          this.loading = false
        }).catch(response => {
          window.location = '/login'
      });
    }
  }
</script>
