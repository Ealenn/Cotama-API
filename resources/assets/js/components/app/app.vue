<template>
  <v-app>
    <ToolBar></ToolBar>
    <Drawer></Drawer>

    <v-container fluid>
      <transition name="fade">
        <router-view></router-view>
      </transition>
    </v-container>

  </v-app>
</template>

<style>
  .fade-enter-active {
    transition: opacity 2s
  }
  .fade-leave-active {
    transition: opacity .5s
  }
  .fade-enter, .fade-leave-active {
    opacity: 0
  }
</style>

<script>
  import axios from 'axios'
  import ToolBar from './components/layout/toolbar'
  import Drawer from './components/layout/drawer'

  export default{
    components: {
      ToolBar,
      Drawer
    },
    created() {
      // Get User
      axios.get('/api/users')
        .then(response => {
          // console.log(response.data);
          this.$store.state.user = response.data
        });
    },
    data: () => ({
    }),
  }
</script>
