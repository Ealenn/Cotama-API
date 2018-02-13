<template>
  <v-layout row wrap>

    <v-flex xs12 align-center justify-center>
      <v-form v-model="valid" ref="form" lazy-validation>
        <v-text-field
          :label="$t('app.pages.group.title')"
          ref="name"
          v-model="name"
          :rules="[v => (v && v.length >= 4) || this.$t('validation.min.string').replace(':min', '6')]"
          :loading="loading"
          required
        > </v-text-field>
        <p class="text-xs-center">
          <v-btn
            :loading="loading"
            :disabled="!valid"
            color="primary"
            @click="submit">
            {{ 'app.pages.group.save' | translate }}
          </v-btn>
        </p>
      </v-form>
    </v-flex>

  </v-layout>
</template>

<script>
  import axios from 'axios'

  export default{
    data: () => ({
      update: false,
      loading: false,
      valid: false,
      id: null,
      name: ''
    }),
    mounted() {
      if(this.$route.params.id && this.$route.params.name) {
        this.update = true
        this.id = this.$route.params.id
        this.name = this.$route.params.name
      }
    },
    computed: {
      lang: function () {
        return document.querySelector('html').getAttribute('lang').toLowerCase()
      }
    },
    methods: {
      goTo: function (page) {
        this.$router.push(page)
      },
      submit() {
        if (this.$refs.form.validate()) {
          this.loading = true

          if(this.update) {
            // UPDATE
            axios.patch('/' + this.lang + '/api/foyer/' + this.id, {
              'name': this.name
            }).then(response => {
              this.goTo('/group')
            }).catch(error => {
              console.log(error.response)
              this.loading = false
              var errors = error.response.data.errors || {}

              for(var iError in errors) {
                var msgError = errors[iError];
                this.$refs[iError].errorMessages = msgError
              }
            });
          } else {
            // SAVE
            axios.post('/' + this.lang + '/api/foyer', {
              'name': this.name
            }).then(response => {
              this.goTo('/group')
            }).catch(error => {
              console.log(error.response)
              this.loading = false
              var errors = error.response.data.errors || {}

              for(var iError in errors) {
                var msgError = errors[iError];
                this.$refs[iError].errorMessages = msgError
              }
            });
          }
        }
      }
    }
  }
</script>
