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
                            color="lime darken-3"
                            >
                            <v-icon dark>
                            {{mdiPlus}}
                            </v-icon>
                            </v-btn>
                        </template>
                        <NuevoCliente @dialog="modalclose" :datosCliente="datosCliente"></NuevoCliente>
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
             <!-- <template v-slot:item.id="{ item }">
                 <v-chip
                 :color="getColor(item.id)"
                 dark
                 >
                 {{ item.id }}
                 </v-chip>
             </template> -->
             <template v-slot:item.id="{ item }">
                <v-btn
                icon
                color="blue-grey darken-2"
                @click="editClient(item.id)"
                >
                <v-icon>{{mdiPencil}}</v-icon>
                </v-btn>
        
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
    mdiMagnify, mdiPlus, mdiPencil
    }
  from "@mdi/js";
   const axios = require('axios');
  export default {
    data () {
      return {
        datosCliente:'',
        dialog: false,
        mdiMagnify: mdiMagnify,
        mdiPencil: mdiPencil,
        mdiPlus: mdiPlus,
        search: '',
        headers: [
          {
            text: 'Nombre',
            align: 'start',
            sortable: false,
            value: 'name',
          },
          { text: 'Primer apellido', value: 'firstname' },
          { text: 'Segundo apellido', value: 'lastname' },
          { text: 'Movil', value: 'movil' },
          { text: 'Acciones', value: 'id' },
          
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
                  url: '../api/client/',
                  method: 'get',
                baseURL: localStorage.getItem('baseURL'),
                  headers: {
                      'Authorization': 'Bearer '+localStorage.getItem('access_token')
                  },
                }).then(response => {
                  console.log("response de getClientes",response.data.data)
                    this.clientes = response.data.data
                    //  this.comandancias = this.comandancias.data
                   
                });
      },
      modalclose(x){
        // this.datosCliente='0';
        this.dialog=x;
         this.getClientes();
      },
      editClient(id){
        
         axios
               .request({
                   url: '../api/client/'+ id,
                   method: 'get',
                 baseURL: localStorage.getItem('baseURL'),
                   headers: {
                       'Authorization': 'Bearer '+localStorage.getItem('access_token')
                   },
                 }).then(response => {
                   this.enviarDatos(response.data.data);
                 });
     },
       enviarDatos(res){
         console.log(res);
         console.log("response cliente");
         this.datosCliente=res;
                    if (this.datosCliente!='0') {
                        this.dialog=true;
                    }
                console.log("datoscliente :"+this.datosCliente.length);
      }
     },
  }
</script>