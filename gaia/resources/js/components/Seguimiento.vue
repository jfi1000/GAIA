<template>
  <v-card>
    <v-tabs
      v-model="tab"
      background-color="lime darken-3"
      dark
    >
      <v-tab
        v-for="item in items"
        :key="item.tab"
      >
        {{ item.tab }}
      </v-tab>
    </v-tabs>

    <v-tabs-items v-model="tab">
      <v-tab-item
        v-for="item in items"
        :key="item.tab"
      >
        <v-card flat>
          <v-card-text>{{ item.content }}
            <template>
              <v-data-table
                v-model="selected"
                :headers="headers"
                :items="operaciones"
                :single-select="singleSelect"
                item-key="id_client"
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
              </v-data-table>
            </template>
          </v-card-text>
        </v-card>
      </v-tab-item>
    </v-tabs-items>
  </v-card>
</template>
 <script>
  export default {
    data () {
      return {
        operaciones:[],
        tab: null,
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
            value: 'id_client',
          },
          { text: 'Residuo', value: 'id_residuo' },
          { text: 'Estatus', value: 'id_status' },
          
        ],
        desserts: [
          {
            name: 'Frozen Yogurt',
            calories: 159,
            fat: 6.0,
            carbs: 24,
            protein: 4.0,
            iron: '1%',
          },
          {
            name: 'Ice cream sandwich',
            calories: 237,
            fat: 9.0,
            carbs: 37,
            protein: 4.3,
            iron: '1%',
          }]
      }
    },
    mounted(){
      this.getOperaciones();
    },
    methods: {
      getOperaciones(){
        axios
               .request({
                   url: '../api/operationall/',
                   method: 'get',
                 baseURL: localStorage.getItem('baseURL'),
                   headers: {
                       'Authorization': 'Bearer '+localStorage.getItem('access_token')
                   },
                 }).then(response => {
                   this.operaciones=response.data.data;
                   console.log(response.data.data);
                 });
      }
    }
  }
</script>