<template>
  <v-layout row wrap class="mt-4 elevation-0" >

    <v-flex xs12 sm6>
      <Stats :active="active" :data="graphTask"> </Stats>
    </v-flex>

    <v-flex xs12 sm6>
      <v-data-table
        :headers="headersGraph"
        :items="items"
        :search="search"
        :pagination.sync="pagination"
        hide-actions
        class="elevation-1 mt-3"
      >
        <template slot="items" slot-scope="props">
          <td>{{ props.item.name }}</td>
          <td class="text-xs-right">{{ props.item.number }}</td>
          <td class="text-xs-right">{{ props.item.last | moment("from", "now") }}</td>
        </template>
      </v-data-table>
    </v-flex>

  </v-layout>
</template>

<style>
  .profil .list__tile{height: auto!important;}
  .profil {padding-top: 10px!important; padding-bottom: 10px!important;}
</style>

<script>
  import axios from 'axios'
  import Placeholder from '../components/layout/placeholder'
  import Stats from '../components/stats'

  export default{
    components:{
      Stats,
      Placeholder
    },
    props: ['active'],
    data: () => ({
      items: [
        {
          name: 'trtr',
          color: '#420',
          number: 5,
          last: '02/15/2018 15:20'
        },
        {
          name: 'hgds gter',
          color: '#090',
          number: 1,
          last: '01/10/2018 15:20'
        }
      ],
      search: '',
      pagination: {
        sortBy: 'number desc'
      },
    }),
    mounted() {
    },
    computed: {
      lang: function () {
        return document.querySelector('html').getAttribute('lang').toLowerCase()
      },
      headersGraph: function () {
        return [
          {
            text: '',
            align: 'left',
            sortable: false,
            value: 'name'
          },
          { text: 'Repetition', value: 'number' },
          { text: 'Date', value: 'last' }
        ]
      },
      graphTask: function () {
        var data = [1]
        var color = ['#000']
        var label = ['Task']

        // Todo

        // Return
        return {
          datasets: [{
            data: data,
            backgroundColor: color
          }],
          labels: label
        }
      }
    },
    methods: {
    }
  }
</script>
