<template>
    <v-container>
        <v-row>
           
            <v-col cols="12" md="12">
                <h3 class="titulo">Registro</h3>
                <hr>
                <br>
            </v-col>
            
                <v-col cols="12" md="12">
                    <v-row align="center">
                        <v-col class="d-flex" cols="12" sm="6">
                        <v-select
                        :items="cat_clientes"
                        item-text="name"
                        item-value="id"
                        filled
                        label="Cliente"
                        dense
                        ></v-select>
                    </v-col>
                    <v-col class="d-flex" cols="12" sm="6">
                        <v-select
                        :items="cat_tipo_residuos"
                        item-text="type"
                        item-value="id"
                        filled
                        label="Tipo de residuo"
                        dense
                        ></v-select>
                    </v-col>
                    <v-col class="d-flex" cols="12" sm="6">
                        <v-text-field
                            v-model="residuo.weight"
                            :rules="weightRules"
                            :counter="10"
                            label="Peso"
                            required
                            filled
                            value="float"
                        ></v-text-field>
                    </v-col>
                    <v-col class="d-flex" cols="12" sm="6">
                        <v-dialog
            ref="dialog"
            v-model="modal"
            :return-value.sync="date"
            persistent
            width="290px"
          >
            <template v-slot:activator="{ on, attrs }">
              <v-text-field
                v-model="date"
                label="Fecha de operacion"
                prepend-icon="mdi-calendar"
                readonly
                filled
                v-bind="attrs"
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker
              v-model="date"
              scrollable
            >
              <v-spacer></v-spacer>
              <v-btn
                text
                color="primary"
                @click="modal = false"
              >
                Cancel
              </v-btn>
              <v-btn
                text
                color="primary"
                @click="$refs.dialog.save(date)"
              >
                OK
              </v-btn>
            </v-date-picker>
          </v-dialog>
                    </v-col>
                    </v-row>
                </v-col>
            
        </v-row>
    </v-container>
</template>
<script>
import {
    mdiMagnify, mdiPlus, mdiPencil
    }
  from "@mdi/js";
   const axios = require('axios');
  export default {
    data () {
        return {
        cat_tipo_residuos:[],
        cat_clientes:[],
        date: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
        modal: false,
        residuo:{
            id_residuo:'',
            id_client:'',
            id_status:'',
            weight:'',
            date_operation:'',

        },
        weightRules: [
        v => !!v || 'Peso es requerido',
        v => v.length <= 50 || 'Name must be less than 50 characters',
      ],
    
        }
    },
    mounted(){
        this.getClientes();
        this.getCatTipoResiduos();
    },
    methods: {
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
                  console.log("response de getClientes",response.data.data)
                    this.cat_clientes = response.data.data
                   
                   
                });
        },
        getCatTipoResiduos(){
         axios
              .request({
                  url: 'api/residuoTipo/',
                  method: 'get',
                baseURL: localStorage.getItem('baseURL'),
                  headers: {
                      'Authorization': 'Bearer '+localStorage.getItem('access_token')
                  },
                }).then(response => {
                  console.log("response de residuoTipo",response.data.data)
                    this.cat_tipo_residuos = response.data
                    
                   
                });
        },
    }
    }
</script>