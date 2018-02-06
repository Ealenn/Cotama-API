<template>
  <section style="background-color: #FFF">
    <v-container grid-list-xl>
      <v-layout row wrap justify-center class="my-5">
        <v-flex sm12 md5 text-xs-center layout align-center justify-center>
          <img src="/img/devices2.png" width="90%" />
        </v-flex>
        <v-flex sm12 md6 offset-sm1>
          <v-card class="elevation-0 transparent">
            <v-card-title primary-title class="layout justify-center">
              <div class="headline">{{ 'front.division-task.title' | translate }}</div>
            </v-card-title>
            <v-card-text>
              {{ 'front.division-task.content' | translate }}
            </v-card-text>
            <v-list class="transparent">

              <v-list-tile>
                <v-list-tile-action>
                  <v-icon class="blue--text text--lighten-2">lnr lnr-history</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>{{ 'front.division-task.list.1.title' | translate }}</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              <p>
                {{ 'front.division-task.list.1.content' | translate }}
              </p>

              <v-list-tile>
                <v-list-tile-action>
                  <v-icon class="blue--text text--lighten-2">lnr lnr-user</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>{{ 'front.division-task.list.2.title' | translate }}</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              <p>
                {{ 'front.division-task.list.2.content' | translate }}
              </p>
              <v-list-tile>
                <v-list-tile-action>
                  <v-icon class="blue--text text--lighten-2">lnr lnr-warning</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>{{ 'front.division-task.list.3.title' | translate }}</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              <p>
                {{ 'front.division-task.list.3.content' | translate }}
              </p>
            </v-list>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </section>
</template>
