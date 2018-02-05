<template>
  <section id="game-mode" class="primary">
    <v-layout
      column
      wrap
      class="my-1 px-5 py-5"
      align-center
      justify-center
    >
      <v-flex xs12 class="my-3 white--text">
        <div class="text-xs-center">
          <h2 class="headline">Mode de jeu</h2>
          <span class="subheading">
                Les modes de jeu sont les différentes manières parmi lesquelles l'utilisateur peut choisir de jouer
          </span>
          <blockquote>
            Je déteste faire le ménage. Vous faites le lit, la vaisselle et six mois après, tout est à refaire!
          </blockquote>
        </div>
      </v-flex>

      <v-flex xs10 offset-xs1>
        <v-container grid-list-xl>
          <v-layout row wrap align-center>

            <v-flex xs12 md6>
              <v-card class="elevation-0 transparent white--text">
                <v-card-title primary-title>
                  <h3 class="headline mb-0">
                    <v-icon x-large class="blue--text text--lighten-2">lnr lnr-mustache</v-icon>
                    Colocataires
                  </h3>

                  <div class="mt-4">
                    La meilleure façon de jouer ! Ce mode de jeu très décontracté vous permet de lancer des défis aléatoires lorsque les tâches ménagères ne sont pas effectuées correctement. L'interface est complète et les mini-jeux déjanté mettent de l'ambiance lors de vos missions.                  </div>
                </v-card-title>
              </v-card>
            </v-flex>

            <v-flex xs12 md6>
              <v-card class="elevation-0 transparent white--text">
                <v-card-title primary-title>
                  <h3 class="headline mb-0">
                    <v-icon x-large class="blue--text text--lighten-2">lnr lnr-dinner</v-icon>
                    Famille
                  </h3>

                  <div class="mt-4">
                    Ce mode de jeu est destiné à une famille. Beaucoup plus sérieux mais toujours aussi drôle, ce mode permet de répartir les tâches équitablement sous forme de jeu avec des défis et mini-jeuxƒ réalisables de 6 à 200 ans. L'interface est quant à elle plus simple et intuitive.
                  </div>
                </v-card-title>
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
