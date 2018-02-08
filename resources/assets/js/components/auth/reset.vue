<template>
    <v-app id="inspire">
      <video-bg :sources="['/img/cover/cover.mp4', '/img/cover/cover.webm']" img="/img/cover/cover.jpg"></video-bg>
      <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4 class="elevation-24">

            <v-card class="elevation-12">
              <v-toolbar flat dark color="primary">
                <v-toolbar-title>{{ 'auth.reset.title' | translate}}</v-toolbar-title>
              </v-toolbar>
              <v-form v-model="valid" :action="url_password_email" method="post" lazy-validation>
                <v-card-text>

                  <v-alert type="error" :value="error && error.length > 3">
                    {{ error }}
                  </v-alert>

                  <v-alert type="success" :value="status && status.length > 3">
                    {{ status }}
                  </v-alert>

                  <input type="hidden" name="_token" :value="csrf">
                  <input type="hidden" name="token" :value="token">
                  <v-text-field
                    prepend-icon="mail_outline"
                    v-model="email"
                    :rules="[v => !!v || this.$t('validation.required'),v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || this.$t('validation.email')]"
                    name="email"
                    :label="'auth.reset.input.email' | translate"
                    type="email"
                    required>
                  </v-text-field>
                  <v-text-field
                    prepend-icon="lock_outline"
                    v-model="password"
                    :rules="[v => !!v || this.$t('validation.required'),v => (v && v.length >= 6) || this.$t('validation.min.string').replace(':min', '6')]"
                    name="password"
                    :label="'auth.reset.input.password' | translate"
                    id="password"
                    type="password"
                    required>
                  </v-text-field>
                  <v-text-field
                    prepend-icon="lock_outline"
                    v-model="password2"
                    :rules="[v => !!v || this.$t('validation.required'),v => (v && v === this.password) || this.$t('validation.confirmed')]"
                    name="password_confirmation"
                    :label="'auth.reset.input.password2' | translate"
                    id="password_confirmation"
                    type="password"
                    required>
                  </v-text-field>
                </v-card-text>
                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn :disabled="!valid" type="submit" color="primary">{{ 'auth.reset.input.valide' | translate}}</v-btn>
                </v-card-actions>
              </v-form>
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
  .toolbar__title {
    font-size: 1.2em;
  }
  button{
    font-size: 0.8em!important;
  }
</style>

<script>
  import VideoBg from 'vue-videobg'

  export default {
    components: { VideoBg },
    data: () => ({
      email: '',
      password: '',
      password2: '',
      valid: false,
      drawer: null,
      csrf: null
    }),
    props: {
      url_password_email: String,
      token: String,
      iemail: String,
      error: String,
      status: String
    },
    mounted() {
      this.email = this.iemail
      this.csrf = document.querySelector("meta[name='csrf-token']").getAttribute("content")
    }
  }
</script>
