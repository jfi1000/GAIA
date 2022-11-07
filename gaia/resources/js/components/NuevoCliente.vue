<template>
   

    <v-card>
        <v-card-title>
          <span class="text-h5">{{tituloModal}}</span>
        </v-card-title>
        <v-card-text>
      <v-container>
        <v-row>
          <v-col
            cols="12"
            md="4"
          >
            <v-text-field
              v-model="cliente.name"
              :rules="nameRules"
              label="Nombre"
              required
            ></v-text-field>
          </v-col>
  
          <v-col
            cols="12"
            md="4"
          >
            <v-text-field
              v-model="cliente.firstname"
              :rules="nameRules"
              label="Primer Apellido"
              required
            ></v-text-field>
          </v-col>
          <v-col
            cols="12"
            md="4"
          >
            <v-text-field
              v-model="cliente.lastname"
              :rules="nameRules"
              label="Segundo Apellido"
              required
            ></v-text-field>
          </v-col>
  
          <v-col
            cols="12"
            md="4"
          >
            <v-text-field
              v-model="cliente.email"
              :rules="emailRules"
              label="E-mail"
              required
            ></v-text-field>
          </v-col>
          <v-col
            cols="12"
            md="4"
          >
            <v-text-field
              v-model="cliente.RFC"
              label="RFC"
              required
            ></v-text-field>
          </v-col>
          <v-col
            cols="12"
            md="4"
          >
            <v-text-field
              v-model="cliente.movil"
              label="Movil"
              required
            ></v-text-field>
          </v-col>
          <v-col
            cols="12"
            md="4"
          >
            <v-text-field
              v-model="cliente.razon_social"
              label="Razon social"
              required
            ></v-text-field>
          </v-col>
          <v-col
            cols="12"
            md="4"
          >
          <v-select
            :items="type_person"
            item-text="name"
            filled
            label="Tipo de persona:"
            dense
            v-model="cliente.type"
            ></v-select>
          </v-col>
        </v-row>
      </v-container>
          <small>*indicates required field</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="blue darken-1"
            text
            @click="cerrar()"
          >
            Cerrar
          </v-btn>
          <v-btn
            color="blue darken-1"
            text
            @click="guardarCliente()"
          >
            Guardar
          </v-btn>
        </v-card-actions>
      </v-card>
  </template>
  <script>
  export default {
    data: () => ({
        tituloModal:'Registrar cliente',
      valid: false,
      type_person:[
            'PERSONA MORAL', 'PERSONA FISICA'
          ],
      cliente:{
          name: '',
          firstname: '',
          lastname: '',
          RFC: '',
          movil: '',
          email:'',
          razon_social: '',
          type:'',

      },
      edit:false,
      nameRules: [
        v => !!v || 'Name is required',
        v => v.length <= 50 || 'Name must be less than 50 characters',
      ],
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid',
      ],
    }),
    mounted(){
        this.checkEditCliente();
    },
    props:{
        datosCliente:{
            required: false
        }
    },
    methods:{
        cerrar(){
            this.$emit("dialog",false)
        },
        guardarCliente(){
            axios
              .request({
                  url: 'api/client',
                  method: 'post',
                  data: this.cliente,
                baseURL: localStorage.getItem('baseURL'),
                  headers: {
                      'Authorization': 'Bearer '+localStorage.getItem('access_token')
                  },
                }).then(response => {
                  console.log(response);
                  this.$swal('Cliente registrado exitosamente');
                  this.$emit("dialog",false)
                  this.clearDialog();
                   
                }).catch((error)=>{
                    this.$swal.fire(error.message);
                });
        },
        clearDialog(){
                 this.cliente.name="";
                 this.cliente.lastname="";
                 this.cliente.email="";
                 this.cliente.RFC="";
                 this.cliente.email="";
                 this.cliente.movil="";
                 this.cliente.firstname  ="";
                 this.cliente.razon_social="";
                 this.cliente.type="";
        },
        checkEditCliente(){

            if(this.datosCliente.length!=0){
                this.edit=true;
                console.log("watch");
                 console.log(this.datosCliente);
                 this.cliente.name=this.datosCliente.name;
                 this.cliente.lastname=this.datosCliente.lastname;
                 this.cliente.email=this.datosCliente.email;
                 this.cliente.RFC=this.datosCliente.rfc;
                 this.cliente.email=this.datosCliente.email;
                 this.cliente.movil=this.datosCliente.movil;
                 this.cliente.firstname  = this.datosCliente.firstname;
            }
        }
    },
    watch:{
         datosCliente: function(){
             if (this.datosCliente!='0') {
                 this.edit=true;
                 console.log("watch");
                 console.log(this.datosCliente);
                 this.cliente.name=this.datosCliente.name;
                 this.cliente.lastname=this.datosCliente.lastname;
                 this.cliente.email=this.datosCliente.email;
                 this.cliente.rfc=this.datosCliente.rfc;
                this.cliente.email=this.datosCliente.email;
                 this.cliente.movil=this.datosCliente.movil;
                 this.cliente.firstname  = this.datosCliente.firstname;
             }

         },
        edit: function(){
            if (this.edit==true) {
                this.tituloModal= 'Editar cliente';
            }else{
                this.tituloModal= 'Registrar cliente';
            }
        }
    }

  }
</script>