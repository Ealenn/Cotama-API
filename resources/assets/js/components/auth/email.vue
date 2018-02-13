<template>
    <v-app id="inspire">
      <video-bg :sources="['/img/cover/cover.mp4', '/img/cover/cover.webm']" img="/img/cover/cover.jpg"></video-bg>
      <v-content>
        <v-container fluid fill-height>
          <v-layout align-center justify-center>
            <v-flex xs12 sm8 md4 class="elevation-24">

              <v-card class="elevation-24">

                <v-toolbar flat dark color="primary" extended>
                  <v-toolbar-title class="white--text" slot="extension">{{ 'auth.email.title' | translate}}</v-toolbar-title>
                  <v-btn dark icon @click="this.history.back()">
                    <v-icon>keyboard_arrow_left</v-icon>
                  </v-btn>
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
                      <v-text-field
                        v-model="email"
                        :rules="[v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || this.$t('validation.email')]"
                        prepend-icon="mail_outline"
                        name="email"
                        :label="'auth.email.input.email' | translate"
                        type="email">
                      </v-text-field>
                  </v-card-text>
                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn :disabled="!valid" type="submit" color="primary">{{ 'auth.email.input.send' | translate}}</v-btn>
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
    font-size: 1.4em;
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
      valid: false,
      email: '',
      drawer: null,
      csrf: null
    }),
    props: {
      url_password_email: String,
      error: String,
      status: String
    },
    mounted() {
      this.csrf = document.querySelector("meta[name='csrf-token']").getAttribute("content")
    }
  }
</script>
