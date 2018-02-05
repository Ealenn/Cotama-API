<template>
  <section id="list-icon">
    <v-layout
      column
      wrap
      align-center
      justify-center
      class="mb-2"
    >
      <!-- <v-flex xs12 sm4 class="my-3">
        <div class="text-xs-center">
          <h2 class="headline">Theee best way to start developing</h2>
          <span class="subheading">
                Cras facilisis mi vitae nunc
              </span>
        </div>
      </v-flex> -->
      <v-flex xs10 offset-xs1>
        <v-container grid-list-xl>
          <v-layout row wrap align-center>

            <v-flex xs12 md4 class="mt-2">
              <v-card class="elevation-0 transparent">
                <v-layout row>
                  <v-flex xs3>
                    <div class="text-xs-center">
                      <v-icon x-large class="blue--text text--lighten-2">lnr lnr-user</v-icon>
                    </div>
                  </v-flex>
                  <v-flex xs9>
                      <div class="headline">
                        Tous ensemble
                      </div>
                    <div>
                      Créez votre compte et un foyer afin d'inviter votre famille ou vos colocataires à vous rejoindre
                    </div>
                  </v-flex>
                </v-layout>
              </v-card>
            </v-flex>

            <v-flex xs12 md4 class="mt-2">
              <v-card class="elevation-0 transparent">
                <v-layout rox>
                  <v-flex xs3>
                    <div class="text-xs-center">
                      <v-icon x-large class="blue--text text--lighten-2">lnr lnr-rocket</v-icon>
                    </div>
                  </v-flex>
                  <v-flex xs9>
                      <div class="headline">
                        Missions
                      </div>
                    <div>
                      Ajoutez un ordre de mission pour une date donnée et laissez Cotama distribuer les tâches de manière équitable
                    </div>
                  </v-flex>
                </v-layout>
              </v-card>
            </v-flex>

            <v-flex xs12 md4 class="mt-2">
              <v-card class="elevation-0 transparent">
                <v-layout rox>
                  <v-flex xs3>
                    <div class="text-xs-center">
                      <v-icon x-large class="blue--text text--lighten-2">lnr lnr-gift</v-icon>
                    </div>
                  </v-flex>
                  <v-flex xs9>
                      <div class="headline">
                        Cadeaux
                      </div>
                    <div>
                      Après chaque mission, gagnez des points, des trophées et plein de surprises !
                    </div>
                  </v-flex>
                </v-layout>
              </v-card>
            </v-flex>

          </v-layout>
        </v-container>
      </v-flex>
    </v-layout>
  </section>
</template>

<style>
  .lw140{
    height: 80px;
  }
</style>

<script>
  export default {
    data: () => ({
    }),
  }
</script>
