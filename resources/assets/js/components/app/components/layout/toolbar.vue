<template>
    <v-toolbar dark color="primary" tabs>
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
      }
    }
  }
</script>
