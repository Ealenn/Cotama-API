<template>
  <v-menu offset-y>
    <v-btn flat slot="activator"><v-icon v-if="showIcon">{{ flag }} mr-2</v-icon> {{ lang }}</v-btn>
    <v-list>
      <v-list-tile v-for="item in MenuLang" :key="item.title" @click="onClick(item)">
        <v-list-tile-title>
          <v-icon>{{ item.icon }}</v-icon> {{ item.title }}
        </v-list-tile-title>
      </v-list-tile>
    </v-list>
  </v-menu>
</template>

<script>
  export default {
    props: {
      showIcon: {
       type: Boolean,
       default: true
      },
      url: {
        type: String,
        default: '/'
      }
    },
    data: () => ({
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
      lang: function () {
        return document.querySelector('html').getAttribute('lang')
      },
      flag: function () {
        var l = this.lang.toLowerCase()
        if(l == 'en') {
          l = 'gb'
        }
        return 'flag-icon flag-icon-' + l
      }
    },
    methods: {
      onClick: function (item) {
        window.location.href = (
          window.location.origin + '/' + item.link + this.url
        )
      }
    }
  }
</script>
