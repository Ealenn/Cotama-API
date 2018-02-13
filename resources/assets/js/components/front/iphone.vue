<template>
  <section style="background-color: #F3F4F8" class="hidden-md-and-down">
    <v-layout row class="py-5 px-5 text-xs-center">

      <v-flex sm4>
        <div :class="'py-5 px-5 ' + color1" @mouseover="mouseOver(1)" @mouseleave="mouseClear()">
          <v-icon style="font-size: 70px">fa-play-circle</v-icon>
          <p class="display-1 mt-2">{{ 'front.iphone.1.title' | translate }}</p>
          <p>{{ 'front.iphone.1.content' | translate }}</p>
        </div>

        <div :class="'py-5 px-5 ' + color2" v-on:mouseover="mouseOver(2)" @mouseleave="mouseClear()">
          <v-icon style="font-size: 70px">fa-trophy</v-icon>
          <p class="display-1 mt-2">{{ 'front.iphone.2.title' | translate }}</p>
          <p>{{ 'front.iphone.2.content' | translate }}</p>
        </div>
      </v-flex>

      <v-flex sm4>
        <transition name="fade">
          <img :src="'/img/' + picture"
               :key="picture">
        </transition>
      </v-flex>

      <v-flex sm4>
        <div :class="' py-5 px-5 ' + color3" v-on:mouseover="mouseOver(3)" @mouseleave="mouseClear()">
          <v-icon style="font-size: 70px">fa-home</v-icon>
          <p class="display-1 mt-2">{{ 'front.iphone.3.title' | translate }}</p>
          <p>{{ 'front.iphone.3.content' | translate }}</p>
        </div>

        <div :class="'py-5 px-5 ' + color4" v-on:mouseover="mouseOver(4)" @mouseleave="mouseClear()">
          <v-icon style="font-size: 70px">fa-heart</v-icon>
          <p class="display-1 mt-2">{{ 'front.iphone.4.title' | translate }}</p>
          <p>{{ 'front.iphone.4.content' | translate }}</p>
        </div>
      </v-flex>

    </v-layout>
  </section>
</template>

<style scoped>
  .application .theme--light.icon, .theme--light .icon {
    color: inherit;
  }
  .txt-white{
    color:white!important;
    cursor: pointer
  }
  .fade-leave-active{
    position: absolute;
  }
</style>

<script>
  export default{
    data: () => ({
      picture: "iphone_home.png",
      color_hover: "blue lighten-1 theme--dark txt-white",
      color_normal: 'secondary--text',
      color1: null,
      color2: null,
      color3: null,
      color4: null
    }),
    mounted() {
      this.mouseClear()
    },
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
      mouseClear: function () {
        this.picture = "iphone_home.png"
        this.color1 = this.color_normal
        this.color2 = this.color_normal
        this.color3 = this.color_normal
        this.color4 = this.color_normal
      }

    }
  }
</script>
