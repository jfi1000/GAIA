<template>
    <!-- App.vue -->

<v-app>
 <v-navigation-drawer 
  permanent
  app
  clipped
  left
  color="lime darken-4"
  class="right-bar"
  >
  <v-list nav dark>
    <v-list-item class="px-4" to="/inicio" link>
     <v-list-item-icon>
      <v-icon>
        {{mdiHome}}
      </v-icon>
     </v-list-item-icon>
      <v-list-item-title>Home</v-list-item-title>
    </v-list-item>
    <v-list-item class="px-4" to="/registro" link>
     <v-list-item-icon>
      <v-icon>
        {{mdiDeskphone}}
      </v-icon>
     </v-list-item-icon>
     <v-list-item-title>Registro</v-list-item-title>
    </v-list-item>
    <v-list-item class="px-4" to="/seguimiento" link>
     <v-list-item-icon>
      <v-icon>
        {{mdiNoteCheckOutline}}
      </v-icon>
     </v-list-item-icon>
     <v-list-item-title>Seguimiento</v-list-item-title>
    </v-list-item>
    <v-list-item class="px-4" to="/clientes" link>
     <v-list-item-icon>
      <v-icon>
        {{mdiAccount}}
      </v-icon>
     </v-list-item-icon>
     <v-list-item-title>Clientes</v-list-item-title>
    </v-list-item>
    <v-list-item class="px-4x" to="/configuracion" link>
     <v-list-item-icon>
      <v-icon>
        {{mdiCog}}
      </v-icon>
     </v-list-item-icon>
     <v-list-item-title>Configuraciones</v-list-item-title>
    </v-list-item>
  </v-list>

  </v-navigation-drawer>

  <v-app-bar 
  app
  clipped-left
  color="lime lighten-5"
  >
  <v-app-bar-nav-icon
  class="button-menu">

  </v-app-bar-nav-icon> 
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
import axios from "axios";
import {mapState} from "vuex";
import {
  mdiHome, mdiDeskphone, mdiNoteCheckOutline, mdiAccount, mdiCog }
  from "@mdi/js";
  export default {
    data: () => ({
      reveal: false,
      mdiHome: mdiHome,
      mdiDeskphone: mdiDeskphone,
      mdiNoteCheckOutline,mdiNoteCheckOutline,
      mdiAccount,mdiAccount,
      mdiCog,mdiCog,
    }),
      computed:{
        // ...mapState({
        //   drawerLeft:(state) => state.common.drawerLeft
        // }),
        
        // permanentLeft(){
        //   return this.permanent(this.drawerLeft);
        // }
      },
      methods: {
      //   permanent(draw){
      //     switch (this.$vuetify.breakpoint.name) {
      //       case "xs": 
      //         return false;
      //       case "sm": 
      //       case "md": 
      //         return draw;
      //       case "lg": 
      //       case "xl":
      //         return false;
      //   }
      // }
    },
  }
</script>

