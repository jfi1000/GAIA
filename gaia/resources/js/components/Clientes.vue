<template>
    <v-container>
        <v-row>
          <v-col cols="12" md="12">
            <v-row>
                <v-col cols="10" md="10">
                    <h3 class="titulo">Clientes</h3>
                </v-col>
                <v-col cols="2" md="2">
                    <v-dialog
                        v-model="dialog"
                        persistent
                        max-width="600px"
                        >
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn
                            dark
                            v-bind="attrs"
                            v-on="on"
                            class="mx-2"
                            fab
                            color="indigo"
                            >
                            <v-icon dark>
                            {{mdiPlus}}
                            </v-icon>
                            </v-btn>
                        </template>
                        <NuevoCliente @dialog="modalclose"></NuevoCliente>
                    </v-dialog>
                    <br>
                </v-col>
            </v-row>
        <hr>
        <br>
        </v-col>
          <v-card>
             <v-card-title>
             <v-text-field
                 v-model="search"
                 label="Buscar"
                 single-line
                 hide-details
             ></v-text-field>
             </v-card-title>
             <v-data-table
             :headers="headers"
             :items="clientes"
             class="elevation-1"
             :search="search"
             :items-per-page="10"
             >
             <template v-slot:item.id="{ item }">
                 <v-chip
                 :color="getColor(item.id)"
                 dark
                 >
                 {{ item.id }}
                 </v-chip>
             </template>
             </v-data-table>
         </v-card>
        </v-row>

    
  <v-row justify="center">
    
  </v-row>
    </v-container>
  </template>
  <script>
  import NuevoCliente from "./NuevoCliente";
  import {
    mdiMagnify, mdiPlus
    }
  from "@mdi/js";
   const axios = require('axios');
  export default {
    data () {
      return {
        dialog: false,
        mdiMagnify: mdiMagnify,
        mdiPlus: mdiPlus,
        search: '',
        headers: [
          {
            text: 'ID',
            align: 'start',
            sortable: false,
            value: 'id',
          },
          { text: 'Nombre', value: 'name' },
          { text: 'Primer apellido', value: 'firstname' },
          { text: 'Segundo apellido', value: 'lastname' },
          { text: 'Movil', value: 'movil' }
        ],  
        clientes:[]
      }
    },
    components: { 
            NuevoCliente
    },
    mounted(){
        this.getClientes();
        console.log('clientes mounted');
    },
    methods: {
      getColor (id) {
        // if (id > 400) return 'red'
        // else if (calories > 200) return 'orange'else 
         return 'green'
      },
      getClientes(){
        console.log("entra a getclientes");
         axios
              .request({
                  url: 'api/client/',
                  method: 'get',
                baseURL: localStorage.getItem('baseURL'),
                  headers: {
                      'Authorization': 'Bearer '+localStorage.getItem('access_token')
                  },
                }).then(response => {
                  console.log("response de getClientes",response)
                    this.clientes = response.data
                    //  this.comandancias = this.comandancias.data
                   
                });
      },
      modalclose(x){
        this.dialog=x;
      },
    },
  }
</script>