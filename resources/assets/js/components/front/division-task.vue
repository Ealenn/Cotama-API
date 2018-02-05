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
              <div class="headline">La répartition des taches ménagères</div>
            </v-card-title>
            <v-card-text>
              Cotama vous demande vos goûts en matière de tâches ménagères. Si vous préférez passer l’aspirateur plutôt que de faire la vaisselle par exemple. Ces données permettent d’équilibrer les tâches selon vos goûts, mais ce n’est pas tout ! Vous n’aurez plus jamais de dispute avec cette phrase récurrente : « Encore moi ? Je l’ai fait il y a peu de temps ! »
            </v-card-text>
            <v-list class="transparent">

              <v-list-tile>
                <v-list-tile-action>
                  <v-icon class="blue--text text--lighten-2">lnr lnr-history</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>NON RÉPÉTITIVE</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              <p>
                Cotama prend en compte votre historique de mission afin d'équilibrer la distribution des tâches ménagère
              </p>

              <v-list-tile>
                <v-list-tile-action>
                  <v-icon class="blue--text text--lighten-2">lnr lnr-user</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>PROPRE À CHACUN</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              <p>
                Cotama examine vos goûts et ceux de votre foyer afin de satisfaire le plus grand nombre, le plus souvent possible. Si ce n'est pas le cas défiez vos ennemis à travers de mini-jeux afin d'éviter votre funeste destin!
              </p>
              <v-list-tile>
                <v-list-tile-action>
                  <v-icon class="blue--text text--lighten-2">lnr lnr-warning</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>DEFIS</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              <p>
                En cas de désistement, ou d'une partie perdue, vous aurez un défi a réaliser !
              </p>
            </v-list>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </section>
</template>

<style>

</style>
