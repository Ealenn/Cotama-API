<template>
  <v-toolbar fixed flat dark color="primary" class="white" :style="styleToolbar" v-scroll="onScroll">
    <v-toolbar-title>Cotama</v-toolbar-title>
    <v-spacer></v-spacer>
    <v-toolbar-items>
      <!-- Menu -->
      <v-btn flat class="hidden-xs-only" v-for="item in MenuItems" :key="item.title" @click="goTo(item.link)">{{ item.title }}</v-btn>
      <!-- Translate -->
      <v-menu offset-y>
        <v-btn icon slot="activator"><v-icon>fa fa-language</v-icon></v-btn>
        <v-list>
          <v-list-tile v-for="item in MenuLang" :key="item.title" @click="this.window.location.href = ('/' + item.link)">
            <v-list-tile-title>
              <v-icon>{{ item.icon }}</v-icon> {{ item.title }}
            </v-list-tile-title>
          </v-list-tile>
        </v-list>
      </v-menu>
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
  export default {
    data: () => ({
      showToolbar: false,
      styleToolbar: 'opacity: 0;',
      MenuItems: [
        {
          title: 'Présentation',
          link: 'list-icon'
        },
        {
          title: 'Fonctionnalités',
          link: 'features'
        },
        {
          title: 'Mode de jeu',
          link: 'game-mode'
        }
      ],
      MenuLang: [
        {
          title: 'Français',
          icon: 'flag-icon flag-icon-fr',
          link: 'fr'
        },
        {
          title: 'English',
          icon: 'flag-icon flag-icon-gb',
          link: 'en'
        },
        {
          title: 'Deutsch',
          icon: 'flag-icon flag-icon-de',
          link: 'de'
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
        this.styleToolbar = 'opacity:' + (offsetTop/2)/100 + ';'
        if(offsetTop > 100) {
          this.showToolbar = true
        } else {
          this.showToolbar = false
        }
      }
    }
  }
</script>
