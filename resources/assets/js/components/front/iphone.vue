<template>
  <section style="background-color: #F3F4F8" class="hidden-md-and-down">
    <v-layout row class="py-5 px-5 text-xs-center">

      <v-flex sm4>
        <div :class="'py-5 px-5 ' + color1" @mouseover="mouseOver(1)" @mouseleave="mouseClear()">
          <v-icon style="font-size: 70px">fa-play-circle</v-icon>
          <p class="display-1 mt-2">Missions</p>
          <p>Maintenant vous avez vos instructions, que la guerre commence! Mécontant du résultat ? Défiez vos amis ou votre famille dans des duels sans merci !</p>
        </div>

        <div :class="'py-5 px-5 ' + color2" v-on:mouseover="mouseOver(2)" @mouseleave="mouseClear()">
          <v-icon style="font-size: 70px">fa-trophy</v-icon>
          <p class="display-1 mt-2">Trophées</p>
          <p>Chaque trophée est unique dans sa catégorie, prouvez à tout le monde que vous êtes le roi du rangement et débloquez le succès Tetris!</p>
        </div>
      </v-flex>

      <v-flex sm4>
        <img :src="'/img/' + picture"/>
      </v-flex>

      <v-flex sm4>
        <div :class="'py-5 px-5 ' + color3" v-on:mouseover="mouseOver(3)" @mouseleave="mouseClear()">
          <v-icon style="font-size: 70px">fa-home</v-icon>
          <p class="display-1 mt-2">Foyers</p>
          <p>Gérez votre foyer, changez le mode de jeu et affichez les profils de vos amis en quelques clics afin d’établir une stratégie d'attaque!</p>
        </div>

        <div :class="'py-5 px-5 ' + color4" v-on:mouseover="mouseOver(4)" @mouseleave="mouseClear()">
          <v-icon style="font-size: 70px">fa-heart</v-icon>
          <p class="display-1 mt-2">Préférences</p>
          <p>Si vous préférez faire la vaisselle plutôt que de laver les sols il faut le dire ! Chaque détail a son importance avec Cotama</p>
        </div>
      </v-flex>

    </v-layout>
  </section>
</template>

<style>
  .txt-white{
    color:white;
    cursor: pointer
  }
</style>

<script>
  export default{
    data: () => ({
      picture: "iphone_home.png",
      color_hover: "blue lighten-1 theme--dark txt-white",
      color1: null,
      color2: null,
      color3: null,
      color4: null
    }),
    methods: {
      mouseOver: function (id) {
        switch (id) {
          case 1:
            this.color1 = this.color_hover
            this.picture = "iphone_missions.png"
            break
          case 2:
            this.color2 = this.color_hover
            this.picture = "iphone_trophy.png"
            break
          case 3:
            this.color3 = this.color_hover
            this.picture = "iphone_foyer.png"
            break
          case 4:
            this.color4 = this.color_hover
            this.picture = "iphone_prefs.png"
            break
        }
      },
      mouseClear: function (id) {
        this.picture = "iphone_home.png"
        this.color1 = ""
        this.color2 = ""
        this.color3 = ""
        this.color4 = ""
      }

    }
  }
</script>
