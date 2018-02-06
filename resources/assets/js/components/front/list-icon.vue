<template>
  <section id="list-icon">
    <v-layout
      column
      wrap
      align-center
      justify-center
      class="mb-2"
    >

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
                        {{ 'front.list-icon.1.title' | translate }}
                      </div>
                    <div>
                      {{ 'front.list-icon.1.content' | translate }}
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
                        {{ 'front.list-icon.2.title' | translate }}
                      </div>
                    <div>
                      {{ 'front.list-icon.2.content' | translate }}
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
                        {{ 'front.list-icon.3.title' | translate }}
                      </div>
                    <div>
                      {{ 'front.list-icon.3.content' | translate }}
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
