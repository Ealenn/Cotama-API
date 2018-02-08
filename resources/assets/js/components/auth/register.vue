<template>
    <v-app id="inspire">

      <v-dialog v-model="dialog" persistent max-width="290">
        <v-card>
          <v-card-title class="headline">{{ 'auth.register.dialog.title' | translate }}</v-card-title>
          <v-card-text>{{ 'auth.register.dialog.content' | translate }}</v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="green darken-1" flat @click="finish">{{ 'auth.register.dialog.button' | translate }}</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>

      <video-bg :sources="['/img/cover/cover.mp4', '/img/cover/cover.webm']" img="/img/cover/cover.jpg"></video-bg>
      <v-content>
        <v-container fluid fill-height>
          <v-layout align-center justify-center>
            <v-flex xs12 sm8 md4 class="elevation-24">

              <v-card class="elevation-24">

                <v-toolbar flat dark color="primary" extended>
                  <v-toolbar-title class="white--text" slot="extension">{{ 'auth.register.title' | translate}}</v-toolbar-title>
                  <v-btn dark icon @click="this.history.back()">
                    <v-icon>keyboard_arrow_left</v-icon>
                  </v-btn>
                  <v-spacer></v-spacer>
                  <a :href="url_login"><v-btn outline color="white" class="mt-4">{{ 'auth.login.title' | translate}}</v-btn></a>
                </v-toolbar>

                <v-card-text>
                  <v-form v-model="valid" ref="form" lazy-validation>

                    <v-alert type="error" :value="error && error.length > 7">
                      {{ error }}
                    </v-alert>

                    <v-text-field
                      ref="pseudo"
                      prepend-icon="perm_identity"
                      id="pseudo"
                      v-model="pseudo"
                      :rules="nameRules"
                      :label="'auth.register.input.pseudo' | translate"
                      :loading="loading"
                      type="text"> </v-text-field>

                    <v-text-field
                      ref="first_name"
                      prepend-icon="mood"
                      v-model="first_name"
                      :rules="nameRules"
                      :label="'auth.register.input.first_name' | translate"
                      :loading="loading"
                      type="text"> </v-text-field>

                    <v-text-field
                      ref="last_name"
                      prepend-icon="mood"
                      v-model="last_name"
                      :rules="nameRules"
                      :label="'auth.register.input.last_name' | translate"
                      :loading="loading"
                      type="text"> </v-text-field>

                    <v-text-field
                      ref="email"
                      prepend-icon="mail_outline"
                      v-model="email"
                      :rules="emailRules"
                      :label="'auth.register.input.email' | translate"
                      :loading="loading"
                      type="text"> </v-text-field>

                    <v-text-field
                      ref="password"
                      prepend-icon="lock_outline"
                      v-model="password"
                      :rules="passwordRules"
                      :label="'auth.register.input.password' | translate"
                      :loading="loading"
                      type="password"> </v-text-field>

                    <v-text-field
                      @keyup.enter="submit"
                      prepend-icon="lock_outline"
                      v-model="password2"
                      :rules="password2Rules"
                      :label="'auth.register.input.password2' | translate"
                      :loading="loading"
                      type="password"> </v-text-field>

                  </v-form>
                </v-card-text>

                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn
                    :loading="loading"
                    :disabled="!valid"
                    color="primary"
                    @click="submit">
                    {{ 'auth.register.input.register' | translate}}
                  </v-btn>
                </v-card-actions>

              </v-card>
            </v-flex>
          </v-layout>
        </v-container>
      </v-content>
    </v-app>
</template>

<style scoped>
  .VideoBg {
    overflow: hidden;
    height: 100vh!important;
    width: 100vw!important;
    position: fixed!important;
  }
</style>

<script>
  import axios from 'axios'
  import VideoBg from 'vue-videobg'

  export default {
    components: { VideoBg },
    data: () => ({
      dialog: false,
      error: '',
      loading: false,
      showPassword: true,
      valid: true,
      pseudo: '',
      first_name: '',
      last_name: '',
      email: '',
      password: '',
      password2: '',
    }),
    props: {
      url_login: String,
      url_register: String
    },
    computed: {
      nameRules: function () {
        return [
          v => !!v || this.$t('validation.required'),
          v => (v && v.length >= 4) || this.$t('validation.min.string').replace(':min', '4')
        ]
      },
      emailRules: function () {
        return [
          v => !!v || this.$t('validation.required'),
          v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || this.$t('validation.email')
        ]
      },
      passwordRules: function () {
        return [
          v => !!v || this.$t('validation.required'),
          v => (v && v.length >= 6) || this.$t('validation.min.string').replace(':min', '6')
        ]
      },
      password2Rules: function () {
        return [
          v => !!v || this.$t('validation.required'),
          v => (v && v.length >= 6) || this.$t('validation.min.string').replace(':min', '6'),
          v => (v && v === this.password) || this.$t('validation.confirmed')
        ]
      },
      lang: function () {
        return document.querySelector('html').getAttribute('lang').toLowerCase()
      }
    },
    methods: {
      submit() {
        if (this.$refs.form.validate()) {
          this.loading = true
          var obj = {
            'pseudo': this.pseudo,
            'first_name': this.first_name,
            'last_name': this.last_name,
            'email': this.email,
            'password': this.password
          }

          axios.post('/' + this.lang + '/api/users', obj).then(response => {
            this.loading = false
            this.dialog = true
          }).catch(error => {
            this.loading = false
            var errors = error.response.data.errors || {}

            for(var iError in errors) {
              var msgError = errors[iError];
              this.$refs[iError].errorMessages = msgError
            }
          });
        }
      },
      finish: function () {
        document.location = this.url_login
      }
    }
  }
</script>
