<template>
  <v-app light>

    <ToolBar></ToolBar>

    <v-content>
      <Hero></Hero>
      <ListIcon></ListIcon>
      <Iphone></Iphone>
      <ListIconPres></ListIconPres>
      <DivisionTask></DivisionTask>
      <PlayParty></PlayParty>
      <GameMode></GameMode>
      <Partner></Partner>
      <Footer></Footer>
    </v-content>
  </v-app>
</template>

<style>

</style>

<script>
  import ToolBar from './front/toolbar'
  import Hero from './front/hero'
  import ListIcon from './front/list-icon'
  import Iphone from './front/iphone'
  import ListIconPres from './front/list-icon-pres'
  import DivisionTask from './front/division-task'
  import PlayParty from './front/play-party'
  import GameMode from './front/game-mode'
  import Partner from './front/partner'
  import Footer from './front/footer'

  export default{
    components: {
      ToolBar, Hero, ListIcon, Iphone, ListIconPres, DivisionTask, PlayParty, GameMode, Partner, Footer
    },
    data: () => ({
      csrf: null
    }),
  }
</script>
