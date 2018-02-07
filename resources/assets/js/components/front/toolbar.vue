<template>
  <v-toolbar fixed flat dark color="primary" class="white" :style="styleToolbar" v-scroll="onScroll">
    <v-toolbar-title>{{ 'front.toolbar.title' | translate }}</v-toolbar-title>
    <v-spacer></v-spacer>
    <v-toolbar-items>
      <!-- Menu -->
      <v-btn flat class="hidden-xs-only" v-for="item in MenuItems" :key="item.title" @click="goTo(item.link)">{{ item.title }}</v-btn>
      <!-- Translate -->
      <Lang></Lang>
      <!-- Menu Drop More -->
      <v-menu offset-y class="hidden-sm-and-up">
        <v-btn icon slot="activator"><v-icon>more_vert</v-icon></v-btn>
        <v-list>
          <v-list-tile v-for="item in MenuItems" :key="item.title" @click="goTo(item.link)">
            <v-list-tile-title>
              {{ item.title }}
            </v-list-tile-title>
          </v-list-tile>
        </v-list>
      </v-menu>
    </v-toolbar-items>
  </v-toolbar>
</template>

<script>
  import Vue from 'vue'
  import Lang from '../lang'

  export default {
    components: {
      Lang
    },
    data: () => ({
      showToolbar: false,
      styleToolbar: 'background-color:transparent!important;',
      MenuItems: [
        {
          title: Vue.i18n.translate('front.toolbar.menu.presentation'),
          link: 'list-icon'
        },
        {
          title: Vue.i18n.translate('front.toolbar.menu.features'),
          link: 'features'
        },
        {
          title: Vue.i18n.translate('front.toolbar.menu.game_mode'),
          link: 'game-mode'
        }
      ]
    }),
    computed: {
      classShow: function () {
        if(this.showToolbar){
          return ''
        }

        return 'opacity: 0.5;'
      }
    },
    methods: {
      goTo: function (link) {
        var target = document.getElementById(link);
        this.animate(
          document.scrollingElement || document.documentElement,
          "scrollTop",
          "",
          window.pageYOffset || document.documentElement.scrollTop,
          target.offsetTop - 50,
          1000,
          true
        );
        console.log(link)
      },
      animate: function animate(elem, style, unit, from, to, time, prop) {
        if (!elem) {
          return;
        }
        var start = new Date().getTime(),
          timer = setInterval(function () {
            var step = Math.min(1, (new Date().getTime() - start) / time);
            if (prop) {
              elem[style] = (from + step * (to - from))+unit;
            } else {
              elem.style[style] = (from + step * (to - from))+unit;
            }
            if (step === 1) {
              clearInterval(timer);
            }
          }, 15);
        if (prop) {
          elem[style] = from+unit;
        } else {
          elem.style[style] = from+unit;
        }
      },
      onScroll (e) {
        var offsetTop = window.pageYOffset || document.documentElement.scrollTop

        if(offsetTop > 10) {
          this.styleToolbar = ''
        } else {
          this.styleToolbar = 'background-color:transparent!important;'
        }
      }
    }
  }
</script>
