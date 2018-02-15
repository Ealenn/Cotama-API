<template>
  <canvas :id="'chart-' + id" width="400" height="400"></canvas>
</template>

<script>
  import Chart from 'chart.js';

  export default{
    mounted() {
      this.id = Math.random().toString(36).substr(2, 9)
      if (this.active) {
        this.updateUI()
      }
    },
    data: () => {
      return {
        id: null
      }
    },
    methods: {
      updateUI: function () {
        new Chart(document.getElementById("chart-" + this.id),{
          type: this.type,
          data: this.data,
          options: this.options
        });
      }
    },
    props: {
      active: {
        type: Boolean,
        default: true
      },
      type: {
        type: String,
        default: 'pie'
      },
      data: {
        type: Object,
        default: function () {
          return {}
        }
      },
      options: {
        type: Object,
        default: function () {
          return {}
        }
      }
    },
    watch: {
      active: function (val) {
        this.active = val
        if (val == true)
          this.updateUI()
      }
    }
  }
</script>
