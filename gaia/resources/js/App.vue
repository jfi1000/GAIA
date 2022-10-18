<template>
    <!-- App.vue -->

<v-app>
  <v-navigation-drawer 
  app
  clipped
  left
  color="lime darken-4"
  class="right-bar"
  >

  </v-navigation-drawer>

  <v-app-bar 
  app
  clipped-left
  color="lime lighten-5"
  >
    <!-- -->
  </v-app-bar>

  <!-- Sizes your content based upon application components -->
  <v-main>

    <!-- Provides the application the proper gutter -->
    <v-container fluid
    color="grey lighten-1">

      <!-- If using vue-router -->
      <router-view></router-view>
    </v-container>
  </v-main>

  <v-footer 
  app
  color="white"
  >
    <!-- -->
  </v-footer>
</v-app>
  </template>

<script>
  export default {
    data: () => ({
      reveal: false,
    }),
  }
</script>

