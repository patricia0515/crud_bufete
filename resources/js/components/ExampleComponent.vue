<template>
    <v-app>
        <v-app-bar app></v-app-bar>

        <!-- formularios -->
        <v-main>
            <v-container grid-list-md>
                ¡Bienvenido!
                <v-layout row wrap>
                    <v-flex xs12 sm6>
                        <v-card
                            
                        >
                            <v-img
                            src="img/clientes.jpg"
                            height="200px"
                            ></v-img>

                            <v-card-title>
                            Clientes
                            </v-card-title>

                            <v-card-subtitle>
                            1,000 miles of wonder
                            </v-card-subtitle>

                            <v-card-actions>
                                 
                                    <v-btn
                                    @click="dialog=true"
                                    color="info"
                                    elevation="3"
                                    dark
                                    text
                                    >
                                    Gestionar
                                    </v-btn>
                                     <v-btn
                                    @click="dialog4=true"
                                    color="info"
                                    elevation="3"
                                    dark
                                    text
                                    
                                    >
                                    Listar
                                    </v-btn>
                                
                            
                            </v-card-actions>
                        </v-card>

                    </v-flex>
                </v-layout>
                <!-- Formulario Cliente Nuevo -->
                    <template>
                    <div class="text-center">
                        <v-dialog
                        v-model="dialog"
                        width="500"
                        >
                       

                        <v-card>
                            <v-card-title class="text-h5 grey lighten-2">
                            Datos del Nuevo Cliente
                            </v-card-title>

                            <v-card-text>
                            
                                <v-form
                                  ref="form"
                                  v-model="valid"
                                  lazy-validation
                                >
                                    
                                  <v-row>
                                    <v-col cols="12" sm="6">
                                      <!-- Select Tipo de Documento -->
                                      <template>
                                        <v-select
                                          v-model="tipo_documento"
                                          :items="arrayDataTipoId"
                                          item-text="detalle"
                                          item-value="tipo_documento"
                                          label="Tipo de Documento"
                                          outlined
                                          :rules="tipo_doc_personaRules"
                                        ></v-select>
                                      </template>
                                      <!-- Fin Select Tipo de Documento-->
                                    </v-col>

                                    <v-col cols="12" sm="6">
                                      <v-text-field
                                        v-model.trim="num_documento"
                                        label="Número de Documento (*)"
                                        outlined
                                        :counter="10"
                                        maxlength="20"
                                        clearable
                                        @keypress="isNumber($event)"
                                        :rules= "documento_personaRules"
                                        
                                      ></v-text-field>
                                    </v-col>
                                  </v-row>
                                  <v-row>
                                    <v-col cols="12" sm="6">
                                      <v-text-field
                                        v-model.trim= "nombres"
                                        label="Nombre(s)"
                                        outlined
                                        :counter="20"
                                        :rules= "nombre_personaRules"
                                      ></v-text-field>
                                    </v-col>

                                    <v-col cols="12" sm="6">
                                      <v-text-field
                                        v-model.trim="apellidos"
                                        label="Apellido(s)"
                                        outlined
                                        :counter="20"
                                        :rules= "apellido_personaRules"
                                      ></v-text-field>
                                    </v-col>
                                  </v-row>

                                  

                                  <v-row>
                                    <v-col cols="12" sm="6">
                                      <v-text-field
                                        v-model="direccion"
                                        label="Dirección Residencia (*)"
                                        outlined
                                        :counter="50"
                                        :rules="direcc_residencia_personaRules"
                                      ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6">
                                      <v-text-field
                                        v-model.trim="celular"
                                        label="Celular"
                                        outlined
                                        :counter="10"
                                        :rules="telefono1_personaRules"
                                      ></v-text-field>
                                    </v-col>
                                  </v-row>
                                </v-form>
                              
                            </v-card-text>

                            <v-divider></v-divider>

                            <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                color="primary"
                                text
                                @click="crearCliente"
                            >
                                Guardar
                            </v-btn>
                            <v-btn @click="limpiarDatos">Cancelar</v-btn>
                            </v-card-actions>
                        </v-card>
                        </v-dialog>
                    </div>
                    </template>
                <!-- Fin Formulario Cliente Nuevo -->
                <!-- Tabla Cliente -->
                    <template>
                    <div class="text-center">
                        <v-dialog
                        v-model="dialog4"
                        width="700"
                        >
                       

                        <v-card>
                            <v-card-title class="text-h5 grey lighten-2">
                            Lista de Clientes
                            </v-card-title>

                            <v-card-text>
                            
                                <v-data-table
                                  :headers="headers"
                                  :items="clientes"
                                  :items-per-page="10"
                                  class="elevation-1"
                                >
                                </v-data-table>
                              
                            </v-card-text>

                            <v-divider></v-divider>

                            <v-card-actions>
                            <v-spacer></v-spacer>
                            
                            <v-btn @click="dialog4=false">Cerrar</v-btn>
                            </v-card-actions>
                        </v-card>
                        </v-dialog>
                    </div>
                    </template>
                <!-- Fin Tabla Cliente -->
                <v-layout row wrap>
                    <v-flex xs12 sm6>
                        <v-card
                            
                        >
                            <v-img
                            src="img/abogados.jpg"
                            height="200px"
                            ></v-img>

                            <v-card-title>
                            Abogados
                            </v-card-title>

                            <v-card-subtitle>
                            1,000 miles of wonder
                            </v-card-subtitle>

                            <v-card-actions>
                            <v-btn
                                @click="dialog2=true"
                                color="info"
                                elevation="3"
                                text
                            >
                                Gestionar
                            </v-btn>
                            <v-btn
                                @click="dialog5=true"
                                color="info"
                                elevation="3"
                                text
                            >
                                Listar
                            </v-btn>
                            </v-card-actions>
                        </v-card>
                        
                    </v-flex>
                </v-layout>
                <!-- Formulario Abogado Nuevo -->
                    <template>
                    <div class="text-center">
                        <v-dialog
                        v-model="dialog2"
                        width="500"
                        >
                       

                        <v-card>
                            <v-card-title class="text-h5 grey lighten-2">
                            Datos del Nuevo Abogado
                            </v-card-title>

                            <v-card-text>
                            
                                <v-form
                                  ref="form"
                                  v-model="valid"
                                  lazy-validation
                                >
                                    
                                  <v-row>
                                    <v-col cols="12" sm="6">
                                      <!-- Select Tipo de Documento -->
                                      <template>
                                        <v-select
                                          v-model="tipo_documento"
                                          :items="arrayDataTipoId"
                                          item-text="detalle"
                                          item-value="tipo_documento"
                                          label="Tipo de Documento"
                                          outlined
                                          :rules="tipo_doc_personaRules"
                                        ></v-select>
                                      </template>
                                      <!-- Fin Select Tipo de Documento-->
                                    </v-col>

                                    <v-col cols="12" sm="6">
                                      <v-text-field
                                        v-model.trim="num_documento"
                                        label="Número de Documento (*)"
                                        outlined
                                        :counter="10"
                                        maxlength="20"
                                        clearable
                                        @keypress="isNumber($event)"
                                        :rules= "documento_personaRules"
                                        
                                      ></v-text-field>
                                    </v-col>
                                  </v-row>
                                  <v-row>
                                      <v-col cols="12" sm="12">
                                      <v-text-field
                                        v-model.trim="num_tarjetaProfesional"
                                        label="Número de TP (*)"
                                        outlined
                                        :counter="10"
                                        maxlength="20"
                                        clearable
                                        @keypress="isNumber($event)"
                                        :rules= "TP_personaRules"
                                        
                                      ></v-text-field>
                                    </v-col>
                                  </v-row>
                                  <v-row>
                                    <v-col cols="12" sm="6">
                                      <v-text-field
                                        v-model.trim= "nombres"
                                        label="Nombre(s)"
                                        outlined
                                        :counter="20"
                                        :rules= "nombre_personaRules"
                                      ></v-text-field>
                                    </v-col>

                                    <v-col cols="12" sm="6">
                                      <v-text-field
                                        v-model.trim="apellidos"
                                        label="Apellido(s)"
                                        outlined
                                        :counter="20"
                                        :rules= "apellido_personaRules"
                                      ></v-text-field>
                                    </v-col>
                                  </v-row>

                                  

                                  <v-row>
                                    <v-col cols="12" sm="6">
                                      <v-text-field
                                        v-model="direccion"
                                        label="Dirección Residencia (*)"
                                        outlined
                                        :counter="50"
                                        :rules="direcc_residencia_personaRules"
                                      ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6">
                                      <v-text-field
                                        v-model.trim="celular"
                                        label="Celular"
                                        outlined
                                        :counter="10"
                                        :rules="telefono1_personaRules"
                                      ></v-text-field>
                                    </v-col>
                                  </v-row>
                                </v-form>
                              
                            </v-card-text>

                            <v-divider></v-divider>

                            <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                color="primary"
                                text
                                @click="crearAbogado"
                            >
                                Guardar
                            </v-btn>
                            <v-btn @click="limpiarDatos">Cancelar</v-btn>
                            </v-card-actions>
                        </v-card>
                        </v-dialog>
                    </div>
                    </template>
                <!-- Fin Formulario Abogado Nuevo -->
                <!-- Tabla Abogado -->
                    <template>
                    <div class="text-center">
                        <v-dialog
                        v-model="dialog5"
                        width="700"
                        >
                       

                        <v-card>
                            <v-card-title class="text-h5 grey lighten-2">
                            Lista de Abogados
                            </v-card-title>

                            <v-card-text>
                            
                                <v-data-table
                                  :headers="headers2"
                                  :items="abogados"
                                  :items-per-page="10"
                                  class="elevation-1"
                                >
                                </v-data-table>
                              
                            </v-card-text>

                            <v-divider></v-divider>

                            <v-card-actions>
                            <v-spacer></v-spacer>
                            
                            <v-btn @click="dialog5=false">Cerrar</v-btn>
                            </v-card-actions>
                        </v-card>
                        </v-dialog>
                    </div>
                    </template>
                <!-- Fin Tabla Abogado -->
                <v-layout row wrap>
                    <v-flex xs12 sm6>
                        <v-card
                           
                        >
                            <v-img
                            src="img/casos.jpg"
                            height="200px"
                            ></v-img>

                            <v-card-title>
                            Casos
                            </v-card-title>

                            <v-card-subtitle>
                            1,000 miles of wonder
                            </v-card-subtitle>

                            <v-card-actions>
                            <v-btn
                                @click="dialog3=true"
                                color="info"
                                elevation="3"
                                text
                            >
                                Gestionar
                            </v-btn>
                            <v-btn
                                @click="dialog6 =true"
                                color="info"
                                elevation="3"
                                text
                            >
                                Listar
                            </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-flex>
                </v-layout>
                 <!-- Formulario caso Nuevo -->
                    <template>
                    <div class="text-center">
                        <v-dialog
                        v-model="dialog3"
                        width="500"
                        >

                        <v-card>
                            <v-card-title class="text-h5 grey lighten-2">
                            Datos del Nuevo Caso
                            </v-card-title>

                            <v-card-text>
                            
                                <v-form
                                  ref="form"
                                  v-model="valid"
                                  lazy-validation
                                >
                                    
                                  <v-row>
                                    
                                    <v-col cols="12" sm="12">
                                      <v-text-field
                                        v-model="num_expediente"
                                        label="Número de Expediente (*)"
                                        outlined
                                        :counter="23"
                                        maxlength="23"
                                        :rules="numEx_personaRules"
                                        @keypress="isNumber($event)"
                                      ></v-text-field>
                                    </v-col>
                                     
                                  </v-row>
                                  <v-row align="center">
                                        <div class="text-center text-h5 grey lighten-2">
                                          <v-label >
                                            Fecha inicio del Proceso
                                          </v-label>
                                          
                                                
                                                <v-date-picker
                                                  v-model="fecha_inicio"
                                                  label="Fecha Agendamiento (*)"
                                                  placeholder="AAAA-MM-DD"
                                                  color="indigo"
                                                  full-width
                                                  elevation="15"
                                                  locale="es-co"
                                                  :landscape="true"
                                                  :rules="fecha_inicio"
                                                ></v-date-picker>
                                             
                                      </div>
                                  </v-row>
                                  
                                  <v-row>
                                    <v-col cols="12" sm="6">
                                        
                                        <v-select
                                        v-model="estado"
                                        :items="arrayEstados"
                                        label="Estado (*)"
                                        outlined
                                      ></v-select>
                                    </v-col>
                                    <v-col cols="12" sm="6">
                                        <v-select
                                            v-model="abogado"
                                            :items="abogados"
                                            item-text="nombres"
                                            item-value="id_abogado"
                                            label="Abogado (*)"
                                            outlined
                                        ></v-select>
                                    </v-col>
                                  </v-row>
                                  <v-row>
                                      <v-col cols="12" sm="12">
                                      <v-select
                                            v-model="cliente"
                                            :items="clientes"
                                            item-text="nombres"
                                            item-value="id_cliente"
                                            label="Cliente (*)"
                                            outlined
                                        ></v-select>
                                    </v-col>
                                  </v-row>
                                </v-form>
                              
                            </v-card-text>

                            <v-divider></v-divider>

                            <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                color="primary"
                                text
                                @click="crearCaso"
                            >
                                Guardar
                            </v-btn>
                            <v-btn @click="limpiarDatos">Cancelar</v-btn>
                            </v-card-actions>
                        </v-card>
                        </v-dialog>
                    </div>
                    </template>
                <!-- Fin Formulario Caso Nuevo -->
                <!-- Tabla Casos -->
                    <template>
                    <div class="text-center">
                        <v-dialog
                        v-model="dialog6"
                        width="700"
                        >
                       

                        <v-card>
                            <v-card-title class="text-h5 grey lighten-2">
                            Lista de Casos
                            </v-card-title>

                            <v-card-text>
                            
                                <v-data-table
                                  :headers="headers3"
                                  :items="casos"
                                  :items-per-page="10"
                                  class="elevation-1"
                                >
                                </v-data-table>
                              
                            </v-card-text>

                            <v-divider></v-divider>

                            <v-card-actions>
                            <v-spacer></v-spacer>
                            
                            <v-btn @click="dialog6=false">Cerrar</v-btn>
                            </v-card-actions>
                        </v-card>
                        </v-dialog>
                    </div>
                    </template>
                <!-- Fin Tabla Casos -->

             <!-- Inicio de Mensaje de Alerta   -->
            <v-snackbar 
                v-model="alert" 
                :color="colorMen" 
                right top>
                {{mensajeAlert}}
                <v-btn color="black" text @click="alert = false"> Cerrar </v-btn>
            </v-snackbar>
            <!-- Fin de Mensaje de Alerta   -->
            </v-container>
        </v-main>
        <!--fin formularios -->
    </v-app>
</template>
  
    

<script>


export default {
   data: () => ({
        dialog: false,
        dialog2: false,
        dialog3: false,
        dialog4: false,
        dialog5: false,
        dialog6: false,
        //Variables para el formulario
        tipo_documento:"",
        num_documento:"",
        num_tarjetaProfesional:"",
        nombres:"",
        apellidos:"",
        celular:"",
        direccion:"",
        arrayDataTipoId: ['C.C','C.E','Pasaporte'],
        num_expediente:"",
        fecha_inicio:"",
        arrayEstados:['En Trámite','Cerrado','Archivado', 'Al despacho'],
        estado:"",
        cliente:0,
        abogado:0,

        //Variables para traer los registros activos
        clientes:[],
        abogados:[],
        casos:[],

        //Variables para los mensajes de alerta
        alert: false,
        mensajeAlert: [],
        colorMen: "",


        mens:"",

        //Vamos a validar el formulario agendar 
        valid: true,

        //Registros de la tabla cliente
        headers: [
            {
                
                align: 'start',
                sortable: false,
                value: 'id',
            },

                { text: 'ID', value: 'id_cliente' },
                { text: 'Tipo Doc', value: 'tipo_documento' },
                { text: 'No. Doc', value: 'num_documento' },
                { text: 'Nombre', value: 'nombres' },
                { text: 'Apellidos', value: 'apellidos' },
               
                
            ],
            //Registros de la tabla abogados
            headers2: [
                {
                    
                    align: 'start',
                    sortable: false,
                    value: 'id',
                },

                    { text: 'ID', value: 'id_abogado' },
                    { text: 'Tipo Doc', value: 'tipo_documento' },
                    { text: 'No. TP', value: 'num_tarjetaProfesional' },
                    { text: 'Nombre', value: 'nombres' },
                    { text: 'Apellidos', value: 'apellidos' },
                  
                    
                ],
                //Registros de la tabla abogados
                headers3: [
                    {
                        
                        align: 'start',
                        sortable: false,
                        value: 'id',
                    },

                        { text: 'ID', value: 'ID' },
                        { text: 'Cliente', value: 'CLIENTE' },
                        { text: 'Abogado', value: 'ABOGADO' },
                        { text: 'N N° Expediente', value: 'N° EXPEDIENTE' },
                        { text: 'Estado', value: 'ESTADO' },
                      
                        
                    ],
        desserts: [],

        //Validaciones desde el front

        nombre_personaRules: [
        v => !!v || 'Nombre requerido',
        v => (v && v.length <= 20) || 'El nombre no debe exceder mas de 20 caracteres',
        ],
        apellido_personaRules: [
            v => !!v || 'Apellido requerido',
            v => (v && v.length <= 20) || 'El apellido no debe exceder mas de 20 caracteres',
        ],
        tipo_doc_personaRules: [
            v => !!v || 'Seleccione el tipo de documento',
        ],
        direcc_residencia_personaRules: [
            v => !!v || 'Dirección requerida',
            v => (v && v.length <= 50) || 'La dirección no debe exceder mas de 50 caracteres',
        ],
        telefono1_personaRules: [
        v => !!v || 'El celular requerido',
        v => (v && v.length <= 10) || 'El celular no debe exceder mas de 10 digitos',
      ],
      documento_personaRules: [
        v => !!v || 'Su número de documento es requerido',
        v => (v && v.length <= 10) || 'El documento no puede exceder mas de los 10 digitos',
      ],
      TP_personaRules: [
        v => !!v || 'Su número de TP es requerido',
        v => (v && v.length <= 8) || 'La TP no puede exceder mas de los 8 digitos',
      ],
      numEx_personaRules: [
        v => !!v || 'Número de Expediente es requerido',
        v => (v && v.length <= 23) || 'El expediente no puede exceder mas de los 23 digitos',
      ],


}),
  methods: {
       //Validaciones solo Números
        isNumber: function (evt) {
        evt = evt ? evt : window.event;
        var charCode = evt.which ? evt.which : evt.keyCode;
        if (
            charCode > 31 &&
            (charCode < 48 || charCode > 57) &&
            charCode !== 46
        ) {
            evt.preventDefault();
        } else {
            return true;
        }
        },
        //Listar tipificaciones
        listaClientes() {
        this.clientes = [];
        axios.get("crear-cliente").then(response => {
            this.clientes = response.data;
            console.log(this.clientes)
            })
            .catch((error) => {
            console.log("error " + error);
            });
        },
        listaAbogados() {
        this.abogados = [];
        axios.get("crear-abogado").then(response => {
            this.abogados = response.data;
            console.log(this.abogados)
            })
            .catch((error) => {
            console.log("error " + error);
            });
        },
        listaCasos() {
        this.casos = [];
        axios.get("crear-caso").then(response => {
            this.casos = response.data;
            console.log(this.casos)
            })
            .catch((error) => {
            console.log("error " + error);
            });
        },

      crearCliente() {
          
          
        //Petición para guardar el registro en la base de datos
        axios.post('crear-cliente',{

              tipo_documento: this.tipo_documento,
              num_documento: this.num_documento,
              nombres: this.nombres,
              apellidos: this.apellidos,
              celular: this.celular,
              direccion: this.direccion,
        }).then((response)=>{ 
                this.mensajeAlert =
                  "¡Cliente creado con exito! Cliente: " + this.num_documento;
                this.alert = true;
                this.colorMen = 'success';
                this.limpiarDatos();
        })
        //Fin Petición para guardar el registro en la base de datos

       
      },
      crearAbogado() {
        //Petición para guardar el registro en la base de datos
        axios.post('crear-abogado',{

              tipo_documento: this.tipo_documento,
              num_documento: this.num_documento,
              num_tarjetaProfesional: this.num_tarjetaProfesional,
              nombres: this.nombres,
              apellidos: this.apellidos,
              celular: this.celular,
              direccion: this.direccion,
        }).then((response)=>{ 
                this.mensajeAlert =
                  "¡Abogado creado con exito!  Abogado: " + this.num_documento;
                this.alert = true;
                this.colorMen = 'success';
                this.limpiarDatos();
        })
        //Fin Petición para guardar el registro en la base de datos

        
      },
      crearCaso() {
        //Petición para guardar el registro en la base de datos
        axios.post('crear-caso',{

              num_expediente: this.num_expediente,
              fecha_inicio: this.fecha_inicio,
              estado: this.estado,
              cliente: this.cliente,
              abogado: this.abogado,
        }).then((response)=>{ 
                this.mensajeAlert =
                  "¡Caso creado con exito!  Caso No. " + this.num_expediente;
                this.alert = true;
                this.colorMen = 'success';
                this.limpiarDatos();
        })
        //Fin Petición para guardar el registro en la base de datos

        
      },
      limpiarDatos(){
            //Formulario Clientes
            this.dialog = false;
            this.dialog2 = false;
            this.dialog3 = false;
            this.tipo_documento = "";
            this.num_documento = "";
            this.num_tarjetaProfesional = "";
            this.nombres = "";
            this.apellidos = "";
            this.celular = "";
            this.direccion = "";
            this.num_expediente = "";
            this.fecha_inicio = "";
            this.estado = "";
            this.cliente = 0;
            this.abogado = 0;
            

      }

  },
  //Validador del formulario Cliente
    validateAsync:function(ref) {
      return new Promise((resolve, reject) => {
          if(!this.$refs[ref].validate()){ 
            reject(this.mens)
          }else{
            resolve(true)
          }
      })
  },
  computed:{

  },
  mounted() {
    this.listaClientes();
    this.listaAbogados();
    this.listaCasos();
  },
};

</script>
