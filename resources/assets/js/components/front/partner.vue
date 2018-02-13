<template>
  <section id="partner">
    <v-layout
      column
      wrap
      class="my-5 px-5 py-2"
      align-center
      justify-center
    >

      <div class="headline">Nos partenaires</div>

      <carousel-3d
        :space="280"
        :width="256"
        :height="128"
        :border="0"
        :inverseScaling="0"
        :display="3"
        :disable3d="true"
        :loop="true"
        :animationSpeed="1000"
        :perspective="50"
        :autoplay="true"
        :autoplay-timeout="3000"
        :controlsVisible="true">
        <slide :index="0">
          <img src="/img/slider/insset.png" />
        </slide>
        <slide :index="1">
          <img src="/img/slider/saintquentin.png" />
        </slide>
        <slide :index="2">
          <img src="/img/slider/upjv.png" />
        </slide>
      </carousel-3d>

    </v-layout>
  </section>

</template>

<style>
  .carousel-3d-slide {
    background-color: transparent !important;
  }
</style>

<script>
  import { Carousel3d, Slide } from 'vue-carousel-3d';

  export default {
    components: {
      Carousel3d,
      Slide
    },
    data: () => ({
    }),
    methods: {
    },
  }
</script>
