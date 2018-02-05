<template>
  <v-app id="inspire">
    <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>

            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
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
                        <v-text-field prepend-icon="fa-at" v-model="email" name="email" :label="'auth.login.input.email' | translate" type="text"></v-text-field>
                        <v-text-field prepend-icon="fa-key" name="password" :label="'auth.login.input.password' | translate" id="password" type="password"></v-text-field>

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
</template>

<script>
  export default {
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
