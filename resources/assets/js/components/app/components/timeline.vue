<template>
  <div class="timeline">

    <div class="timeline-event">
      <v-card class="timeline-content">
        <v-card-title primary-title class="profil">
          <div>
            <div class="headline">
              TicTacToe : Perdu
            </div>
            <span class="grey--text">bgf gfd gdf gs gfd sgdfsg  dsf "HFJHJ DJHJD"</span>
          </div>
        </v-card-title>
        <v-card-text class="pt-0">
          <p class="subheading text-xs-right ma-0">{{ '02/15/2018 14:15' | moment("from", "now") }}</p>
        </v-card-text>
      </v-card>

      <div class="timeline-badge primary">
        <v-icon class="white--text">fa-gamepad</v-icon>
      </div>
    </div>

    <div class="timeline-event">
      <v-card class="timeline-content">
        <v-card-media
          src="http://via.placeholder.com/400x125"
          height="125px"
        > </v-card-media>
        <v-card-title primary-title class="profil">
          <div>
            <div class="headline">Title trophy</div>
            <span class="grey--text">bgf gfd gdf gs gfd sgdfsg  dsf "HFJHJ DJHJD"</span>
          </div>
        </v-card-title>
        <v-card-text class="pt-0">
          <p class="subheading text-xs-right ma-0">{{ '02/15/2018 14:15' | moment("from", "now") }}</p>
        </v-card-text>
      </v-card>

      <div class="timeline-badge green">
        <v-icon class="white--text">fa-trophy</v-icon>
      </div>
    </div>

    <div class="timeline-event">
      <v-card class="timeline-content">
        <v-card-title primary-title class="profil">
          <div>
            <div class="headline">TASK</div>
            <span class="grey--text">bgf gfd gdf gs gfd sgdfsg  dsf "HFJHJ DJHJD"</span>
          </div>
        </v-card-title>
        <v-card-text class="pt-0">
          <p class="subheading text-xs-right ma-0">{{ '02/15/2018 14:15' | moment("from", "now") }}</p>
        </v-card-text>
      </v-card>
      <div class="timeline-badge accent">
        <v-icon class="white--text">home</v-icon>
      </div>
    </div>

  </div>
</template>

<style>
  .timeline {
    position: relative;
  }

  .timeline .timeline-event {
    position: relative;
    padding-top: 5px;
    padding-bottom: 5px;
  }

  .timeline .timeline-event .timeline-content {
    position: relative;
    width: calc(50% - 50px);
  }

  .timeline .timeline-event::before {
    display: block;
    content: "";
    width: 2px;
    height: calc(50% - 30px);
    position: absolute;
    background: #d2d2d2;
    left: calc(50% - 1px);
    top: 0;
  }

  .timeline .timeline-event::after {
    display: block;
    content: "";
    width: 2px;
    height: calc(50% - 30px);
    position: absolute;
    background: #d2d2d2;
    left: calc(50% - 1px);
    top: calc(50% + 30px);
  }

  .timeline .timeline-event:first-child::before {
    display: none;
  }

  .timeline .timeline-event:last-child::after {
    display: none;
  }

  .timeline .timeline-event:nth-child(even) .timeline-content {
    margin-left: calc(50% + 50px);
  }

  .timeline .timeline-event:nth-child(odd) .timeline-content {
    margin-left: 0;
  }

  .timeline .timeline-badge {
    display: block;
    position: absolute;
    width: 40px;
    height: 40px;
    background: #d2d2d2;
    top: calc(50% - 20px);
    right: calc(50% - 20px);
    border-radius: 50%;
    text-align: center;
    cursor: default;
  }

  .timeline .timeline-badge i {
    font-size: 25px;
    line-height: 40px;
  }

  @media (max-width: 600px) {
    .timeline .timeline-event .timeline-content {
      width: calc(100% - 70px);
    }
    .timeline .timeline-event::before {
      left: 19px;
    }
    .timeline .timeline-event::after {
      left: 19px;
    }
    .timeline .timeline-event:nth-child(even) .timeline-content {
      margin-left: 70px;
    }
    .timeline .timeline-event:nth-child(odd) .timeline-content {
      margin-left: 70px;
    }
    .timeline .timeline-badge {
      left: 0;
    }
  }
</style>

<script>
  export default{
    props: {
    },
    data: () => ({
    }),
    methods: {
    },
    computed: {
    },
  }
</script>
