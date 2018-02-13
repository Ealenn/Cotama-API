<template>
    <v-toolbar :dark="!dark" :flat="dark" :color="color" tabs>
      <v-toolbar-side-icon @click="openDrawer()"></v-toolbar-side-icon>
      <v-toolbar-title>{{ pageTitle }}</v-toolbar-title>
      <v-spacer></v-spacer>
      <Lang :showIcon="false" url="/game"></Lang>
      <Account></Account>
    </v-toolbar>
</template>

<script>
  import Lang from '../../../lang'
  import Account from '../account'

  export default{
    components: {
      Lang,
      Account
    },
    props: {
      dark: {
        type: Boolean,
        default: false
      }
    },
    data: () => ({
      tabs: null,
    }),
    methods: {
      openDrawer: function () {
        this.$store.commit('toggleDrawer')
      }
    },
    computed: {
      pageTitle: function () {
        return this.$store.state.pageTitle
      },
      color: function () {
        if (this.dark) {
          return 'white'
        } else {
          return 'primary'
        }
      }
    }
  }
</script>
