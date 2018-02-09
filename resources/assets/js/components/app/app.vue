<template>
  <v-app>
    <div class="hidden-sm-and-down" style="height: 100%;">
      <v-card flat style="height: 100%;">
        <v-toolbar dark color="primary" flat extended></v-toolbar>
        <Drawer></Drawer>
        <v-layout row pb-2 style="margin-top: -40px;">
          <v-flex xs8 offset-xs2>
            <v-card class="card--flex-toolbar">
              <ToolBar dark></ToolBar>
              <v-divider></v-divider>
              <v-card-text class="pb-5">
                <v-container fluid>
                  <transition name="fade">
                    <router-view> </router-view>
                  </transition>
                </v-container>
              </v-card-text>
            </v-card>
          </v-flex>
        </v-layout>
      </v-card>
    </div>

    <div class="hidden-md-and-up">
      <ToolBar></ToolBar>
      <Drawer></Drawer>

      <v-container fluid>
        <transition name="fade">
          <router-view></router-view>
        </transition>
      </v-container>
    </div>
  </v-app>
</template>

<style>
  .fade-enter-active {
    transition: opacity 1s
  }
  .fade-leave-active {
    transition: opacity 0s
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
      truc: ''
    })
  }
</script>
