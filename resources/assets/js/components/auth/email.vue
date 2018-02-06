<template>
  <video-bg :sources="['/img/cover/cover.mp4', '/img/cover/cover.webm']" img="/img/cover/cover.jpg">
    <v-app id="inspire" style="background-color: transparent!important">
      <v-content>
        <v-container fluid fill-height>
          <v-layout align-center justify-center>
            <v-flex xs12 sm8 md4 class="elevation-24">

              <v-card class="elevation-24">
                <v-toolbar flat dark color="primary">
                  <v-btn dark icon @click="this.history.back()">
                    <v-icon>keyboard_arrow_left</v-icon>
                  </v-btn>
                  <v-toolbar-title>{{ 'auth.email.title' | translate}}</v-toolbar-title>
                </v-toolbar>
                  <v-form :action="url_password_email" method="post">
                    <v-card-text>

                      <v-alert type="error" :value="error && error.length > 3">
                        {{ error }}
                      </v-alert>

                      <v-alert type="success" :value="status && status.length > 3">
                        {{ status }}
                      </v-alert>

                        <input type="hidden" name="_token" :value="csrf">
                        <v-text-field prepend-icon="mail_outline" name="email" :label="'auth.email.input.email' | translate" type="text"></v-text-field>
                    </v-card-text>
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn type="submit" color="primary">{{ 'auth.email.input.send' | translate}}</v-btn>
                    </v-card-actions>
                  </v-form>
              </v-card>
            </v-flex>
          </v-layout>
        </v-container>
      </v-content>
    </v-app>
  </video-bg>
</template>

<script>
  import VideoBg from 'vue-videobg'

  export default {
    components: { VideoBg },
    data: () => ({
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
