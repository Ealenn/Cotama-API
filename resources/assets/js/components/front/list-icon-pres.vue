<template>
  <section class="elevation-3" id="features">
    <v-parallax src="/img/parallax.jpeg" style="height: auto!important">
      <v-layout row wrap align-center justify-center class="py-5">

        <v-flex xs12 md6 lg3 class="text-xs-center px-5 mt-2">
          <v-icon x-large class="white--text">lnr lnr-users</v-icon>
          <div class="headline">
            {{ 'front.list-icon-pres.1.title' | translate }}
          </div>
          <p>
            {{ 'front.list-icon-pres.1.content' | translate }}
          </p>
        </v-flex>

        <v-flex xs12 md6 lg3 class="text-xs-center px-5 mt-2">
          <v-icon x-large class="white--text">lnr lnr-calendar-full</v-icon>
          <div class="headline">
            {{ 'front.list-icon-pres.2.title' | translate }}
          </div>
          <p>
            {{ 'front.list-icon-pres.2.content' | translate }}
          </p>
        </v-flex>

        <v-flex xs12 md6 lg3 class="text-xs-center px-5 mt-2">
          <v-icon x-large class="white--text">lnr lnr-smile</v-icon>
          <div class="headline">
            {{ 'front.list-icon-pres.3.title' | translate }}
          </div>
          <p>
            {{ 'front.list-icon-pres.3.content' | translate }}
          </p>
        </v-flex>

        <v-flex xs12 md6 lg3 class="text-xs-center px-5 mt-2">
          <v-icon x-large class="white--text">lnr lnr-dice</v-icon>
          <div class="headline">
            {{ 'front.list-icon-pres.4.title' | translate }}
          </div>
          <p>
            {{ 'front.list-icon-pres.4.content' | translate }}
          </p>
        </v-flex>

      </v-layout>
    </v-parallax>
  </section>
</template>
