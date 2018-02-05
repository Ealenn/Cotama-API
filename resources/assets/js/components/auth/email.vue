<template>
  <v-app id="inspire">
    <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>

            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
                <v-toolbar-title>{{ 'auth.reset.title' | translate}}</v-toolbar-title>
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
                      <v-text-field prepend-icon="fa-at" name="email" :label="'auth.login.input.email' | translate" type="text"></v-text-field>
                  </v-card-text>
                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn type="submit" color="primary">{{ 'auth.reset.input.send' | translate}}</v-btn>
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
      url_password_email: String,
      error: String,
      status: String
    },
    mounted() {
      this.csrf = document.querySelector("meta[name='csrf-token']").getAttribute("content")
    }
  }
</script>
