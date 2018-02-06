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
                  <v-toolbar-title>{{ 'auth.register.title' | translate}}</v-toolbar-title>
                  <v-spacer></v-spacer>
                  <a :href="url_login"><v-btn outline color="white">{{ 'auth.login.title' | translate}}</v-btn></a>
                </v-toolbar>
                  <v-form :action="url_register" method="post">
                    <v-card-text>

                      <v-alert type="error" :value="error && error.length > 7">
                        {{ error }}
                      </v-alert>

                      <input type="hidden" name="_token" :value="csrf">
                      <v-text-field prepend-icon="perm_identity" v-model="pseudo" name="pseudo" :label="'auth.register.input.pseudo' | translate" id="pseudo" type="text"></v-text-field>
                      <v-text-field prepend-icon="mood" v-model="firstName" name="first_name" :label="'auth.register.input.first_name' | translate" id="first_name" type="text"></v-text-field>
                      <v-text-field prepend-icon="mood" v-model="lastName" name="last_name" :label="'auth.register.input.last_name' | translate" id="last_name" type="text"></v-text-field>
                      <v-text-field prepend-icon="mail_outline" v-model="email" name="email" :label="'auth.register.input.email' | translate" type="text"></v-text-field>
                      <v-text-field prepend-icon="lock_outline" name="password" :label="'auth.register.input.password' | translate" id="password" type="password"></v-text-field>
                      <v-text-field prepend-icon="lock_outline" name="password_confirmation" :label="'auth.register.input.password2' | translate" id="password_confirmation" type="password"></v-text-field>

                    </v-card-text>
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn type="submit" color="primary">{{ 'auth.register.input.register' | translate}}</v-btn>
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
      url_register: String,
      email: String,
      firstName: String,
      lastName: String,
      pseudo: String,
      error: String
    },
    mounted() {
      this.csrf = document.querySelector("meta[name='csrf-token']").getAttribute("content")
    }
  }
</script>
