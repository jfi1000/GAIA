<template>
  <v-card>
    <v-tabs
      v-model="tabs"
      background-color="lime darken-3"
      dark
    >
      <v-tab
            v-for="n in 3"
            :key="n"
      >
       Estatus {{ n }}
      </v-tab>
    </v-tabs>
    <v-tabs-items v-model="tabs">
      <v-tab-item>
        <template>
              <v-data-table
                v-model="selected"
                :headers="headers"
                :items="operaciones"
                :single-select="singleSelect"
                item-key="id"
                show-select
                class="elevation-1"
              >
                <template v-slot:top>
                  <v-switch
                    v-model="singleSelect"
                    label="Single select"
                    class="pa-3"
                  ></v-switch>
                </template>
                <template>
                  <div class="text-center">
                    <v-btn
                      class="mx-2"
                      fab
                      dark
                      small
                      color="primary"
                    >
                      <v-icon dark>
                        mdi-minus
                      </v-icon>
                    </v-btn>
                    </div>
                  </template>
              </v-data-table>
        </template>
      </v-tab-item>
      <v-tab-item>
        <template>
              <v-data-table
                v-model="selected"
                :headers="headers"
                :items="operaciones"
                :single-select="singleSelect"
                item-key="id"
                show-select
                class="elevation-1"
              >
                <template v-slot:top>
                  <v-switch
                    v-model="singleSelect"
                    label="Single select"
                    class="pa-3"
                  ></v-switch>
                </template>
                <template>
                  <div class="text-center">
                    <v-btn
                      class="mx-2"
                      fab
                      dark
                      small
                      color="primary"
                    >
                      <v-icon dark>
                        mdi-minus
                      </v-icon>
                    </v-btn>
                    </div>
                  </template>
              </v-data-table>
            </template>
      </v-tab-item>
      <v-tab-item>
        <template>
              <v-data-table
                v-model="selected"
                :headers="headers"
                :items="operaciones"
                :single-select="singleSelect"
                item-key="id"
                show-select
                class="elevation-1"
              >
                <template v-slot:top>
                  <v-switch
                    v-model="singleSelect"
                    label="Single select"
                    class="pa-3"
                  ></v-switch>
                </template>
                <template>
                  <div class="text-center">
                    <v-btn
                      class="mx-2"
                      fab
                      dark
                      small
                      color="primary"
                    >
                      <v-icon dark>
                        mdi-minus
                      </v-icon>
                    </v-btn>
                    </div>
                  </template>
              </v-data-table>
            </template>
      </v-tab-item>
    </v-tabs-items>
  </v-card>
</template>
 <script>
  export default {
    data () {
      return {
        operaciones1:[],
        operaciones2:[],
        operaciones3:[],
        tabs: null,
        items: [
          { tab: 'Registrados', content: 'Tab 1 Content' },
          { tab: 'estatus 1', content: 'Tab 2 Content' },
          { tab: 'estatus 2', content: 'Tab 3 Content' }
        ],
        singleSelect: false,
        selected: [],
        headers: [
          {
            text: 'Cliente',
            align: 'start',
            sortable: false,
            value: 'client.name',
          },
          { text: 'Residuo', value: 'residuo_tipo.description' },
          //{ text: 'Estatus', value: 'id_status' },
          
        ],
        
      }
    },
    mounted(){
      this.getOperaciones();
    },
    methods: {
      getOperaciones(){
        axios
               .request({
                   url: '../api/operationallp',
                   method: 'get',
                 baseURL: localStorage.getItem('baseURL'),
                   headers: {
                       'Authorization': 'Bearer '+localStorage.getItem('access_token')
                   },
                 }).then(response => {
                   this.operaciones=response.data;
                   console.log(response.data);
                 });
      }
    }
  }
</script>