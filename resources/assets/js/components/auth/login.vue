<template>
  <video-bg :sources="['/img/cover/cover.mp4', '/img/cover/cover.webm']" img="/img/cover/cover.jpg" transition="fade" class="fade">
    <v-app id="inspire" style="background-color: transparent!important" transition="slide-y-transition">
      <v-content>
        <v-container fluid fill-height>
          <v-layout align-center justify-center>
            <v-flex xs12 sm8 md4 class="elevation-24">

              <v-card class="elevation-24">
                <v-toolbar flat dark color="primary">
                  <v-btn dark icon @click="this.history.back()">
                    <v-icon>keyboard_arrow_left</v-icon>
                  </v-btn>
                  <v-toolbar-title>{{ 'auth.login.title' | translate}}</v-toolbar-title>
                  <v-spacer></v-spacer>
                  <a :href="url_register"><v-btn outline color="white">{{ 'auth.login.input.register' | translate}}</v-btn></a>
                </v-toolbar>
                  <v-form :action="url_login" method="post">
                    <v-card-text>

                      <v-alert type="error" :value="error && error.length > 3">
                        {{ error }}
                      </v-alert>

                      <input type="hidden" name="_token" :value="csrf">
                      <v-text-field prepend-icon="mail_outline" v-model="email" name="email" :label="'auth.login.input.email' | translate" type="text"></v-text-field>
                      <v-text-field prepend-icon="lock_outline" name="password" :label="'auth.login.input.password' | translate" id="password" type="password"></v-text-field>

                      <p><a :href="url_reset">{{ 'auth.login.link.reset_password' | translate}}</a></p>
                    </v-card-text>
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn type="submit" color="primary">{{ 'auth.login.input.login' | translate}}</v-btn>
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
      url_login: String,
      url_reset: String,
      url_register: String,
      email: String,
      error: String
    },
    mounted() {
      this.csrf = document.querySelector("meta[name='csrf-token']").getAttribute("content")
    }
  }
</script>
