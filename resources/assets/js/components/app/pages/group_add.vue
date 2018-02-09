<template>
  <v-layout row wrap>

    <v-btn fab dark
           @click="goTo('/group/add')"
           color="indigo"
           style="position: absolute;bottom: 0;right: 0;margin: 30px;">
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

      <v-card color="success" class="white--text">
        <v-container fluid grid-list-lg>
          <v-layout row>
            <v-flex xs7>
              <div>
                <div class="headline">Vous n'avez pas encore d'allier !</div>
                <div>Vous pouvez créer un foyer en cliquant sur le logo <v-icon dark>add</v-icon> en bas de l'ecran.</div>
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
        :cols="{default: 4, 1300: 3, 950: 2, 600: 1}"
        :gutter="{default: '30px', 700: '15px'}"
      >
          <v-flex class="item" v-for="group in groups">

            <v-card class="mb-3 mr-3">

              <v-toolbar flat dark color="accent">
                <v-toolbar-title class="white--text">
                  {{ group.foyer.content.name }}
                </v-toolbar-title>
                <v-spacer> </v-spacer>
                <v-btn icon>
                  <v-icon>more_vert</v-icon>
                </v-btn>
              </v-toolbar>

              <v-list subheader>
                <v-list-tile avatar v-for="user in group.users" @click="">
                  <v-list-tile-avatar>
                    <v-avatar size="48">
                      <img :src="getAvatar(user.email)">
                    </v-avatar>
                  </v-list-tile-avatar>

                  <v-list-tile-content>
                    <v-list-tile-title>{{ user.first_name }} ({{ user.pseudo }})</v-list-tile-title>

                    <v-list-tile-sub-title v-if="user.email === group.foyer.admin[0].email">
                      Administrateur
                    </v-list-tile-sub-title>

                    <v-list-tile-sub-title v-else>
                      Membre
                    </v-list-tile-sub-title>

                  </v-list-tile-content>

                  <v-list-tile-action>
                    <v-btn icon ripple>
                      <v-icon color="grey lighten-1">info</v-icon>
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
    methods: {
      getAvatar: function (email) {
        return 'https://www.gravatar.com/avatar/' + md5(email) + '?d=https%3A%2F%2Fcotama.herokuapp.com%2Fimg%2Fgame%2Fnophoto.gif'
      },
      goTo: function (page) {
        this.$router.push(page)
      }
    },
    mounted () {
      this.loading = true
      axios.get('/api/foyer')
        .then(response => {
          this.groups = response.data
          this.loading = false
        });
    }
  }
</script>
