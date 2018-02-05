<template>
  <section>

    <v-dialog v-model="dialog" width="600px">
      <v-card>

        <v-toolbar card dark color="primary">
          <v-toolbar-title>Cotama n'est pas encore disponible.</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-menu bottom right offset-y>
            <v-btn slot="activator" dark icon @click="dialog = false">
              <v-icon>close</v-icon>
            </v-btn>
          </v-menu>
        </v-toolbar>

        <v-card-text class="text-xs-center">
          Pour être tenu informé de l'évolution et des mises à jours à venir, abonnez vous à notre newsletter. Entrez votre adresse mail dans le champ ci-dessous :
          <v-form action="https://cotama.us13.list-manage.com/subscribe/post?u=72c8a8b0fc6ccbb1984b573e8&id=2b0776d6a6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">

              <v-text-field prepend-icon="email" type="email" name="EMAIL" class="email" id="mce-EMAIL" placeholder="mail" required></v-text-field>
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_72c8a8b0fc6ccbb1984b573e8_2b0776d6a6" tabindex="-1" value=""></div>
              <v-btn type="submit" color="primary" @click="dialog = false">OK</v-btn>
            </div>
          </v-form>
        </v-card-text>
      </v-card>
    </v-dialog>

    <v-parallax src="/img/hero.jpg" height="700">
      <v-layout
        column
        align-center
        justify-center
        class="white--text"
      >

        <h1 class="white--text mb-2 display-1 text-xs-center">
          Cotama c'est {{ aWord }}
        </h1>

        <div class="subheading mb-3 text-xs-center">
          Qui a dit que le ménage devait être une corvée ?<br />
          Transformer les tâches ménagères en jeu amusant et ludique tout en répartissant les tâches de manière équitable, juste et de façon non répétitive !
        </div>

        <div class="mt-5">
          <v-icon x-large color="teal lighten-5" class="mr-5">fa-android</v-icon>

          <v-icon x-large color="teal lighten-5" class="mr-5">fa-apple</v-icon>

          <v-icon x-large color="teal lighten-5">fa-chrome</v-icon>
        </div>

        <v-btn
          class="blue lighten-1 mt-4"
          dark
          large
          @click="dialog = true"
        >
          Jouer Gratuitement
        </v-btn>

      </v-layout>
    </v-parallax>
  </section>
</template>

<style>

</style>

<script>
  export default {
    data: () => ({
      dialog: false,
      intervalId: null,
      actualId: 0,
      word: []
    }),
    mounted : function(){
      this.animateWord()
      this.word = this.$t('home.head.rotating').split(',')
    },
    beforeDestroy () {
      clearInterval(this.intervalId)
    },
    computed: {
      aWord: function () {
        return this.word[this.actualId]
      }
    },
    methods : {
      animateWord : function(){
        let self = this
        this.intervalId = setTimeout(function () {
          self.actualId += 1
          if(self.actualId >= self.word.length) {
            self.actualId = 0
          }
          self.animateWord()
        }, 2000)
      }
    },
  }
</script>
