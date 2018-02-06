<template>
  <section>
    <v-container grid-list-xl>
      <v-layout row wrap justify-center>
        <v-flex sm12 md6>
          <v-card class="elevation-0 transparent">
            <v-card-title primary-title class="layout justify-center">
              <div class="headline">{{ 'front.play-party.title' | translate}}</div>
            </v-card-title>
            <v-card-text>
              <p>
                {{ 'front.play-party.1' | translate }}
              </p>

              <p>
                {{ 'front.play-party.2' | translate }}
              </p>

              <p>
                {{ 'front.play-party.3' | translate }}
              </p>
            </v-card-text>
          </v-card>
        </v-flex>
        <v-flex sm12 md4 offset-sm1>
          <img src="/img/macbook-pro.png" width="90%" />
        </v-flex>
      </v-layout>
    </v-container>
  </section>
</template>

<style>

</style>
