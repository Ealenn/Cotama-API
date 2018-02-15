<template>
  <v-footer>
    <v-layout row wrap align-center class="no-margin">
      <v-flex xs12 primary>
        <div class="to-top-wrap">
          <a href="#top" class="top"><i class="fa fa-angle-up"></i></a>
        </div>
        <p class="white--text px-3 py-3">
          {{ 'front.footer.dev-with' | translate }}
          <span class="fa fa-heart pulse2"></span>
          {{ 'front.footer.dev-by' | translate }}
        </p>
      </v-flex>
      <v-flex xs12 row style="z-index: 2" secondary>
        <p class="white--text px-3 py-3 pb-0 mb-0">
          {{ 'front.footer.by' | translate }}
        </p>
      </v-flex>
    </v-layout>
  </v-footer>
</template>

<style>
  .no-margin{
    margin: 0!important;
    margin-right: 0!important;
    margin-left: 0!important;
  }
  .pulse2 {
    color: #ff415c;
    font-size: 15px;
    margin: 0 2px;
    -webkit-animation-name: pulse2;
    animation-name: pulse2;
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
    -webkit-animation-timing-function: linear;
    animation-timing-function: linear;
  }

  .to-top-wrap {
    z-index: 1;
    text-align: center;
    width: 80px;
    height: 100px;
    right: 0;
    display: block;
    position: absolute;
  }

  .to-top-wrap a {
    display: block;
    width: 100%;
    height: 100%;
    color: #fff;
    background-color: rgba(0, 0, 0, 0.15);
  }

  .to-top-wrap i {
    color: #FFF;
    font-size: 30px;
    line-height: 55px;
  }

  @-webkit-keyframes pulse2 {
    0% {
      -webkit-transform: scale(1.1);
      transform: scale(1.1); }
    50% {
      -webkit-transform: scale(0.8);
      transform: scale(0.8); }
    100% {
      -webkit-transform: scale(1);
      transform: scale(1); } }

  @keyframes pulse2 {
    0% {
      -webkit-transform: scale(1.1);
      transform: scale(1.1); }
    50% {
      -webkit-transform: scale(0.8);
      transform: scale(0.8); }
    100% {
      -webkit-transform: scale(1);
      transform: scale(1); } }
</style>
