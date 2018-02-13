<template>
  <section id="game-mode" class="secondary">
    <v-parallax src="/img/shape-bg-small.png" style="height: auto!important">
    <v-layout
      column
      wrap
      class="my-1 px-5 py-5"
      align-center
      justify-center
    >
      <v-flex
        xs12 class="my-3 white--text">
        <div class="text-xs-center">
          <h2 class="headline">{{ 'front.game-mode.title' | translate }}</h2>
          <span class="subheading">
            {{ 'front.game-mode.subtitle' | translate }}
          </span>
          <blockquote>
            {{ 'front.game-mode.quote' | translate }}
          </blockquote>
        </div>
      </v-flex>

      <v-flex
        xs11 offset-xs1>
        <v-container grid-list-xl style="padding: 0!important;">
          <v-layout row wrap align-center style="padding: 0!important;">

            <v-flex
              v-scroll-reveal.reset v-scroll-reveal="{ delay: 1000 }"
              xs12 md6>
              <v-card class="elevation-0 transparent white--text">
                <v-card-title primary-title>
                  <h3 class="headline mb-0">
                    <v-icon x-large class="blue--text text--lighten-2">lnr lnr-mustache</v-icon>
                    {{ 'front.game-mode.roommates.title' | translate }}
                  </h3>

                  <div class="mt-4">
                    {{ 'front.game-mode.roommates.content' | translate }}
                  </div>
                </v-card-title>
              </v-card>
            </v-flex>
            <v-flex
              v-scroll-reveal.reset v-scroll-reveal="{ delay: 1500 }"
              xs12 md6>
              <v-card class="elevation-0 transparent white--text">
                <v-card-title primary-title>
                  <h3 class="headline mb-0">
                    <v-icon x-large class="blue--text text--lighten-2">lnr lnr-dinner</v-icon>
                    {{ 'front.game-mode.family.title' | translate }}
                  </h3>

                  <div class="mt-4">
                    {{ 'front.game-mode.family.content' | translate }}
                  </div>
                </v-card-title>
              </v-card>
            </v-flex>

          </v-layout>
        </v-container>
      </v-flex>
    </v-layout>
    </v-parallax>
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
