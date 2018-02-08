<template>
    <v-app id="inspire">
      <video-bg :sources="['/img/cover/cover.mp4', '/img/cover/cover.webm']" img="/img/cover/cover.jpg"></video-bg>
      <v-content>
        <v-container fluid fill-height>
          <v-layout align-center justify-center>
            <v-flex xs12 sm8 md4 class="elevation-24">
              <v-card class="elevation-24">

                <v-toolbar flat dark color="primary" extended>
                  <v-toolbar-title class="white--text" slot="extension">{{ 'auth.login.title' | translate}}</v-toolbar-title>
                  <v-btn dark icon @click="this.history.back()">
                    <v-icon>keyboard_arrow_left</v-icon>
                  </v-btn>
                  <v-spacer></v-spacer>
                  <a :href="url_register"><v-btn outline color="white" class="mt-4">{{ 'auth.login.input.register' | translate}}</v-btn></a>
                </v-toolbar>

                <v-card-text>
                  <v-form v-model="valid" ref="form" lazy-validation>

                    <v-alert type="error" :value="error && error.length > 3">
                      {{ error }}
                    </v-alert>

                    <v-text-field
                      v-model="email"
                      :rules="emailRules"
                      :label="'auth.login.input.email' | translate"
                      prepend-icon="mail_outline"
                      type="email"
                      :loading="loading"
                      required> </v-text-field>

                    <v-text-field
                      @keyup.enter="submit"
                      v-model="password"
                      :rules="passwordRules"
                      :append-icon="showPassword ? 'visibility' : 'visibility_off'"
                      :append-icon-cb="() => (showPassword = !showPassword)"
                      :type="showPassword ? 'password' : 'text'"
                      prepend-icon="lock_outline"
                      :label="'auth.login.input.password' | translate"
                      :loading="loading"
                      required> </v-text-field>

                    <p>
                      <a :href="url_reset">{{ 'auth.login.link.reset_password' | translate}}</a>
                    </p>
                  </v-form>
                </v-card-text>

                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn
                    :loading="loading"
                    color="primary"
                    @click="submit"
                    :disabled="!valid">
                    {{ 'auth.login.input.login' | translate}}
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
      error: '',
      loading: false,
      showPassword: true,
      valid: false,
      email: '',
      password: ''
    }),
    props: {
      url_login: String,
      url_reset: String,
      url_register: String,
    },
    computed: {
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
      csrf: function () {
        return document.querySelector("meta[name='csrf-token']").getAttribute("content")
      }
    },
    methods: {
      submit() {
        if (this.$refs.form.validate()) {
          this.loading = true
          var obj = {
            'email': this.email,
            'password': this.password,
            '_token': this.csrf
          }

          axios.post(this.url_login, obj).then(response => {
            this.loading = false
            document.location.reload(false);
          }).catch(error => {
            this.loading = false
            this.password = ''
            this.error = this.$t('auth.login.error')
          });
        }
      }
    }
  }
</script>
