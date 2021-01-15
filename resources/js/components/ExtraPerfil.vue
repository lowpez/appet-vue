<template>
   <!--- <div class="accordion-item" id="headingExtra">
        <div class="accordion-header" id="ptrac_toggle" data-toggle="collapse" data-target="#collapseExtra" role="button" aria-expanded="false" aria-controls="collapseFive">
            <div class="mr-auto">
                <h3 class="mb-1 fs-xxs lh-lg">Programa Tenencia Responsable</h3>
                <p>Información necesaria sobre tu Organización.</p>
            </div>
            <svg class="gi gi-arrow-ios-forward fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 19a1 1 0 0 1-.64-.23 1 1 0 0 1-.13-1.41L13.71 12 9.39 6.63a1 1 0 0 1 .15-1.41 1 1 0 0 1 1.46.15l4.83 6a1 1 0 0 1 0 1.27l-5 6A1 1 0 0 1 10 19z"></path>
            </svg>
            <svg class="gi gi-arrow-ios-downward fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 16a1 1 0 0 1-.64-.23l-6-5a1 1 0 1 1 1.28-1.54L12 13.71l5.36-4.32a1 1 0 0 1 1.41.15 1 1 0 0 1-.14 1.46l-6 4.83A1 1 0 0 1 12 16z"></path>
            </svg>
        </div>
    <div class="collapse" id="collapseExtra" data-parent="#accordionOne" aria-labelledby="headingExtra">-->
        <div class="accordion-body">
            <alert v-show="mensaje" :mensaje="mensaje" :texto_mensaje="texto_mensaje" :alert="alert"></alert>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="initiative_name">Organizacion / Comercio</label>
                        <input class="form-control form-control-lg mb-5" v-model="extra.initiative_name"  name="initiative_name" id="initiative_name" type="text" placeholder="Nombre Completo" aria-labelledby="initiative_name">
                    </div>
                    <div class="col-sm-6">
                        <label for="initiative_rut">RUT</label>
                        <ValidationProvider rules="rut" v-slot="{ errors }">
                            <input class="form-control form-control-lg mb-5" v-model="extra.initiative_rut" v-rut:live name="initiative_rut" id="initiative_rut" type="text" placeholder="Rol único Tributario" aria-labelledby="initiative_rut">
                            <span class="text-danger">{{ errors[0] }}</span>
                        </ValidationProvider>
                    </div>
                </div>
                <div class="form-group row" v-show="organizacion==2">
                    <div class="col-sm-12">
                        <label for="activities">Actividades específicas que desarrolla</label>
                        <select class="form-control selectpicker form-control-lg mb-5" ref="actividades" name="activities[]" v-model="extra.activities" data-live-search="true" id="activities" aria-label="Actividades Sociales que desarrolla" aria-labelledby="activities" multiple>
                            <option v-for="(actividad , index ) in actividades" :key="index" :value="actividad.id" >{{actividad.actividad}}</option>
                        </select>
                    </div>
                </div>
                <label for="initiative_address">Dirección</label>
                <input class="form-control form-control-lg mb-5" name="initiative_address" v-model="extra.initiative_address" id="initiative_address" type="text" placeholder="Dirección" aria-labelledby="initiative_address">
                <div class="form-group row" v-if="organizacion == 4">
                    <div class="col-sm-6">
                        <label for="dogs_quota">Cupos Perros</label>
                        <input class="form-control form-control-lg mb-5" name="dogs_quota" id="dogs_quota" v-model="extra.dogs_quota" type="email" placeholder="Número de cupos totales disponibles" aria-labelledby="dogs_quota">
                    </div>
                    <div class="col-sm-6">
                        <label for="cats_quota">Cupos Gatos</label>
                        <input type="tel" class="form-control form-control-lg mb-5" name="cats_quota" id="cats_quota" v-model="extra.cats_quota" placeholder="Número de cupos totales disponibles" aria-labelledby="cats_quota">
                    </div>
                </div>
                <label for="initiative_biography">Sobre tu proyecto</label>
                <textarea class="form-control mb-5" name="initiative_biography" id="initiative_biography" v-model="extra.initiative_biography" rows="3" placeholder="Cuentanos de ti" aria-labelledby="initiative_biography"></textarea>
                <div class="d-flex align-items-center mb-3">
                    <h4 class="mr-auto fs-xxs lh-lg">Soy el dueño / Representante legal</h4>
                    <div class="form-check form-switch fs-sm">
                        <input class="form-check-input" name="is_representantive" id="is_representantive" v-model="extra.is_representantive" type="checkbox" aria-label="Soy Dueño / Representante Legal" aria-labelledby="is_representantive">
                        <label class="sr-only" for="is_representantive">Switch</label>
                    </div>
                </div>
                <p>Marca esta casilla para usar los mismos datos de tu cuenta.</p>
                <div class="" v-if="organizacion == 3"><!-- ATTACHMENTS -->
                    <hr>
                    <div class="d-flex align-items-center mb-3">
                        <h4 class="mr-auto fs-xxs lh-lg">Informe Anual</h4>
                    </div>
                    <p class="mb-5">Obligatorio bajo la Ley 21.020. <a href="docs/#reporte-anual"><strong>descarga</strong></a>, completa y adjunta el fomulario</p>
                    <div class="card mb-3"><!-- ATTACHMENTS LIST -->
                        <div class="card-body d-flex align-items-center">
                    <span class="icon bg-neutral mr-3 ml-n3 border border rounded-circle">
                      <svg class="gi gi-file-text-fill fs-xs" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.74 7.33l-4.44-5a1 1 0 0 0-.74-.33h-8A2.53 2.53 0 0 0 4 4.5v15A2.53 2.53 0 0 0 6.56 22h10.88A2.53 2.53 0 0 0 20 19.5V8a1 1 0 0 0-.26-.67zM9 12h3a1 1 0 0 1 0 2H9a1 1 0 0 1 0-2zm6 6H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zm-.29-10a.79.79 0 0 1-.71-.85V4l3.74 4z"/>
                      </svg>
                    </span>
                            <div class="mr-auto">
                                <h3 class="mb-2 fs-xxs lh-sm">
                                    <a href="#" id="file-name">{{filename}}</a>
                                </h3>
                                <p id="file-size" class="lh-sm">{{size}}kb</p>
                            </div>
                            <div class="dropdown align-middle">
                                <label for="file-upload" class="btn btn-sm btn-circle bg-primary btn-neutral"><i class="d-none">Adjunte su Reporte Anual</i>
                                    <input class="d-none" name="file-upload" ref="file"  id="file-upload" type="file" aria-label="Adjunte su Reporte Anual" @change="onFileChange()"  accept=".xlsx, .xls, .csv" />
                                    <svg class="gi gi-attach fs-xs text-white" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.29 21a6.23 6.23 0 0 1-4.43-1.88 6 6 0 0 1-.22-8.49L12 3.2A4.11 4.11 0 0 1 15 2a4.48 4.48 0 0 1 3.19 1.35 4.36 4.36 0 0 1 .15 6.13l-7.4 7.43a2.54 2.54 0 0 1-1.81.75 2.72 2.72 0 0 1-1.95-.82 2.68 2.68 0 0 1-.08-3.77l6.83-6.86a1 1 0 0 1 1.37 1.41l-6.83 6.86a.68.68 0 0 0 .08.95.78.78 0 0 0 .53.23.56.56 0 0 0 .4-.16l7.39-7.43a2.36 2.36 0 0 0-.15-3.31 2.38 2.38 0 0 0-3.27-.15L6.06 12a4 4 0 0 0 .22 5.67 4.22 4.22 0 0 0 3 1.29 3.67 3.67 0 0 0 2.61-1.06l7.39-7.43a1 1 0 1 1 1.42 1.41l-7.39 7.43A5.65 5.65 0 0 1 9.29 21z"/></g></g>
                                    </svg>
                                </label>
                            </div>
                        </div>
                    </div><!-- / ATTACHMENTS LIST -->
                </div><!-- / ATTACHMENTS -->
                <button class="btn btn-block btn-lg btn-primary mt-5" @click.prevent="guardarOrganizacion()">Guardar cambios</button>

        </div>
   <!-- </div>

    </div>-->

</template>

<script>
    import { ValidationProvider, extend } from "vee-validate";
    import { rutValidator ,rutInputDirective } from "vue-dni";
    Vue.directive('rut', rutInputDirective);
    import alert from "./alert";
    export default {
        name: "ExtraPerfil",
        props:['user_id','organizacion'],
        components:{
            ValidationProvider,
            alert
        },
        data(){
            return {
                extra:{
                    initiative_name:'',
                    initiative_rut:'',
                    activities:[],
                    initiative_address:'',
                    dogs_quota:null,
                    cats_quota:null,
                    initiative_biography:'',
                    is_representantive:false,
                    file_upload:null
                },
                actividades:[],

                mensaje:false,
                texto_mensaje:'',
                alert:'',
                filename:'Reporte.xlsx',
                size:0,
                file:'',
            }
        },
        created() {
            extend("rut", rutValidator);
            $(this.$refs.actividades).selectpicker('refresh');
            //this.toggleShow()
        },
        mounted() {
            //this.toggleShow()
            this.getOrganizacion()
            this.representive_active_disable();
            this.getActividades()
        },
        updated() {
            $(this.$refs.actividades).selectpicker('refresh');
        },
        methods:{
            toggleShow:function(){
                $('#collapseExtra').collapse({
                    toggle: true
                })
            },
            getActividades:function(){
              axios.get('/actividades').then(res=>{
                  this.actividades = res.data
              }).catch(error=>{
                  console.log(error.response)
              })
            },
            onFileChange() {
                //console.log(e.target.files[0]);
                this.filename =   this.$refs.file.files[0].name;
                this.size =  this.file = this.$refs.file.files[0].size;
                this.file = this.$refs.file.files[0];
            },
            getOrganizacion:function () {
                axios.get('/obtenerOrganizacion').then(res => {
                    this.extra = res.data
                }).catch(error => {
                    console.log(error.response.data)
                })
            },
            representive_active_disable:function(){
                console.log('hola como estas')
               if(this.extra.is_representantive === "Y")
               {
                   this.extra.is_representantive = true
               }
               else
               {
                   this.extra.is_representantive = false
               }
            },
            guardarOrganizacion:function (e) {
                //formulario
                let formData = new FormData();
                /*
                    Add the form data we need to submit
                */
                formData.append('file', this.file);
                formData.append('initiative_name', this.extra.initiative_name);
                formData.append('initiative_rut', this.extra.initiative_rut);
                formData.append('activities', this.extra.activities);
                formData.append('initiative_address', this.extra.initiative_address);
                formData.append('dogs_quota', this.extra.dogs_quota);
                formData.append('cats_quota', this.extra.cats_quota);
                formData.append('initiative_biography', this.extra.initiative_biography);
                formData.append('is_representantive', this.extra.is_representantive);
                formData.append('user_id', this.user_id);
                formData.append('organizacion',this.organizacion)

                axios.post('/organizacion',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                    ).then(res =>{

                    console.log(res.data)

                    this.mensaje=true

                    this.texto_mensaje = 'Cambios Guardados'

                    this.alert = 'success'

                }).catch(error => {
                    this.mensaje=true

                    this.texto_mensaje = 'Error al guardar los cambios'

                    this.alert = 'danger'
                })
            }
        }
    }
</script>

<style scoped>

</style>
