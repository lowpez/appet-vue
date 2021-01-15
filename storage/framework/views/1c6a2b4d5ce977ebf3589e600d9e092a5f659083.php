<?php $__env->startPush('styles'); ?>
    <style>
        #user_cat+.dropdown-toggle  {
        background-color: #2990FF !important;
    }
    .opt, #ptrac, .ups{
        display: none;
    }
    .opt, #ptrac{
        display: none;
    }
    .bg-g{background-color: #00E35C;}
    .bg-b{background-color: #FFC617;}
    .bg-r{background-color:#FF6868;}
    .btn-neutral:hover{background-color:#000;}
    .rut-error{
        color: #fff;
        font-weight: bold;
        background-color: red;
        padding: 3px 10px;
        display: inline-block;
        margin-left: 10px;
    }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
        <div class="tab-content">
                <div class="tab-pane fade show active" id="settings" role="tabpanel">
                    <h2 class="my-5 fs-sm">Ajustes</h2>
                    <hr class="mb-0">
                    <div id="accordionOne">
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne"  role="button" aria-expanded="false" aria-controls="collapseOne">
                                <div class="mr-auto">
                                    <h3 class="mb-1 fs-xxs lh-lg">Mi Cuenta</h3>
                                    <p>Configura tus preferencias.</p>
                                </div>
                                <svg class="gi gi-arrow-ios-forward fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 19a1 1 0 0 1-.64-.23 1 1 0 0 1-.13-1.41L13.71 12 9.39 6.63a1 1 0 0 1 .15-1.41 1 1 0 0 1 1.46.15l4.83 6a1 1 0 0 1 0 1.27l-5 6A1 1 0 0 1 10 19z"></path>
                                </svg>
                                <svg class="gi gi-arrow-ios-downward fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 16a1 1 0 0 1-.64-.23l-6-5a1 1 0 1 1 1.28-1.54L12 13.71l5.36-4.32a1 1 0 0 1 1.41.15 1 1 0 0 1-.14 1.46l-6 4.83A1 1 0 0 1 12 16z"></path>
                                </svg>
                            </div>
                            <div class="collapse show" id="collapseOne" data-parent="#accordionOne" aria-labelledby="headingOne">
                                <div class="accordion-body">
                                    <alert v-show="mensaje" :mensaje="mensaje" :texto_mensaje="texto_mensaje" :alert="alert"></alert>
                                    <form  @submit.prevent="editar_perfil()" enctype="multipart/form-data">
                                        <div class="card mb-5"><!-- AVATAR -->
                                            <div class="card-body d-md-flex text-center justify-content-center justify-content-lg-start align-items-center">
                                                <span class="avatar avatar-xxl status status-online mr-5 mb-2 mb-sm-2 bg-primary rounded-circle">
                                                  <img :src="cargaImagen" width="220" height="220" @click.prevent="chooseFiles()" data-toggle="modal"  data-target="#newAvatar" class="rounded-circle avatar-xxl">
                                                    <input type="file"  id="fileUpload" @change="setUpFileUploader" hidden>
        
                                                </span>
                                                <div  class="modal fade" id="newAvatar" tabindex="-1" role="dialog" aria-labelledby="newAvatarLabel" aria-hidden="true"><!-- / MODAL -->
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="fs-xs" id="newAvatarLabel"></h2>
                                                                <button class="btn btn-sm btn-circle btn-neutral align-self-start" data-dismiss="modal" type="button" aria-label="Close">
                                                                    <svg class="gi gi-close fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="croppie"></div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-block btn-lg btn-primary" @click.prevent="uploadFile">Listo</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- / MODAL -->
                                                <div><!-- PET TYPE -->
                                                    <h4 class="mb-2 fs-xxs lh-sm mr-md-5 mr-sm-2">
                                                        <select class="form-control iam btn-lg mb-2 selectpicker form-control-lg" @change="abrirForm"  v-model="usuario.pet_type_ptrac" data-width="fit" name="user_type_ptrac" data-style="btn-primary" id="user_type_ptrac" aria-label="Selecciona tu tipo de Usuario">
                                                            <option  value="1" >Dueño de Mascotas</option>
                                                            <option value="2">Personas Jurídicas sin Fines de Lucro</option>
                                                            <option  value="3">Criadores y Vendedores de Mascotas</option>
                                                            <option  value="4">Centros de Mantención Temporal</option>
                                                        </select></h4>
                                                    <p class="lh-sm"></p>
                                                </div><!-- /PET TYPE  -->
                                            </div>
                                        </div><!-- / AVATAR -->
                                        <div class="alert alert-warning mb-5 ups alert-dismissible fade show" role="alert"><!-- RUT VALIDATOR -->
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div><!-- / RUT VALIDATOR -->
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="name">Nombre Completo</label>
                                                <input class="form-control form-control-lg mb-5" name="name" id="name" v-model="usuario.name" type="text" placeholder="Nombre y Apellido" aria-labelledby="name" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="rut">RUT</label>
                                                <validation-provider rules="rut" v-slot="{ errors }">
                                                <input class="form-control form-control-lg mb-5" name="rut" v-model="usuario.rut"  id="rut" v-rut:live type="text"  placeholder="Cédula de identidad" aria-labelledby="rut" maxlength="12" required>
                                                    <span class="text-danger">{{ errors[0] }}</span>
                                                </validation-provider>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="email">Email</label>
                                                <input class="form-control form-control-lg mb-5" name="email" v-model="usuario.email" id="email" type="email" placeholder="Email Address" aria-labelledby="email" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="phone">Telefono</label>
                                                <input type="tel" class="form-control form-control-lg mb-5" name="phone" v-model="usuario.phone" id="phone" placeholder="Telefono" aria-labelledby="phone" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="currentPassword">Password Actual</label>
                                                <input class="form-control form-control-lg mb-5" v-model="usuario.old_password" name="currentPassword" id="currentPassword" type="password" placeholder="Password Actual"  aria-labelledby="currentPassword">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="newPassword">Nuevo Password</label>
                                                <input class="form-control form-control-lg mb-5" v-model="usuario.nuevo_password" name="newpassword" id="newPassword" type="password" placeholder="Nuevo Password" aria-labelledby="newPassword">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="state">Region</label>
                                                <select class="form-control selectpicker form-control-lg mb-5" v-model="usuario.state" @change="cargarCities" ref="ref" name="state" id="state" data-live-search="true" aria-labelledby="state" required>
        
                                                    <option v-for="(region , k) in state" :key="k" :value="region.id" >{{region.name}}</option>
        
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="city">Ciudad</label>
                                                <select class="form-control selectpicker form-control-lg mb-5" v-model="usuario.city" name="city" id="city" data-live-search="true" ref="ref2" aria-labelledby="city" required>
                                                    <option v-for="(ciudad , i) in cities" :key="i" :value="ciudad.id">{{ciudad.name}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <label for="address">Dirección</label>
                                        <input class="form-control form-control-lg mb-5" v-model="usuario.address" name="address" id="address" type="text" placeholder="Dirección" aria-labelledby="address" required>
                                        <label for="description">Sobre Mi</label>
                                        <textarea class="form-control mb-5" name="description" id="description" v-model="usuario.description" rows="3" placeholder="Cuentanos de ti" aria-labelledby="description"></textarea>
                                        <button class="btn btn-block btn-lg btn-primary">Guardar cambios</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" id="headingExtra" v-show="formulario"><!-- PTRACK EXTRAS -->
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
                            <div class="collapse" id="collapseExtra" data-parent="#accordionOne" aria-labelledby="headingExtra">
                               

                                <div class="accordion-body">
                                    <alert v-show="mensaje" :mensaje="mensaje" :texto_mensaje="texto_mensaje" :alert="alert"></alert>
                        
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="initiative_name">Organizacion / Comercio</label>
                                                <input class="form-control form-control-lg mb-5" v-model="extra.initiative_name"  name="initiative_name" id="initiative_name" type="text" placeholder="Nombre Completo" aria-labelledby="initiative_name">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="initiative_rut">RUT</label>
                                                <validation-provider rules="rut" v-slot="{ errors }">
                                                    <input class="form-control form-control-lg mb-5" v-model="extra.initiative_rut" v-rut:live name="initiative_rut" id="initiative_rut" type="text" placeholder="Rol único Tributario" aria-labelledby="initiative_rut">
                                                    <span class="text-danger">{{ errors[0] }}</span>
                                                </validation-provider>
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
                            </div>
                        </div>
        
        
                    </div>
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
   <script>
           const app = new Vue({
                el: '#app',
                props: {
                        mensaje_success: {
                        type:  String,
                        default: ""
                        },
                        mensaje_error: {
                        type:  String,
                        default: ""
                        },
                        boton: {
                        type:  String,
                        default: ""
                        }
                },
                data: () => ({
                        usuario:[],
                        user_id: <?php echo json_encode($user->id, 15, 512) ?>,
                        organizacion: <?php echo json_encode($user->pet_type_ptrac, 15, 512) ?>,
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
                        state:[],
                        cities:[],
                        imagen:'https://img3.wikia.nocookie.net/__cb20140911193903/ssbb/es/images/0/09/Sprite_del_Perro_de_Duck_Hunt.gif',
                        modalVisible: false,
                        croppie: null,
                        formulario:false,
                        especies:[],
                        razas:[],
                        avatar:'',
                        mensaje:false,
                        texto_mensaje:'',
                        buscador: "",
                            pets_buscador: [],
                        alert:'',
                            domain: "<?php echo e(url("/")); ?>",
                            user: <?php echo json_encode($user, 15, 512) ?>,
                }),

                created() {
            this.cargarUsuario()
            this.cargarState()
            this.updateSelect()
            this.cargarEspecie()
            this.abrirForm()
            $(this.$refs.actividades).selectpicker('refresh');
        },
        mounted() {

                this.$on('imgUploaded', function (imageData) {
                this.image = imageData
                this.croppie.destroy()
                this.setUpCroppie(imageData)
                
            })
            //this.image = this.imgUrl
            this.setUpCroppie()
            this.cargarImagen()
            this.cargarCities()
            this.getOrganizacion()
            this.representive_active_disable();
            this.getActividades()
            console.log(this.usuario)
        },
        updated () {
           this.updateSelect()
           $(this.$refs.actividades).selectpicker('refresh');
        },
        methods:{
           updateSelect:function()
            {
                $(this.$refs.ref).selectpicker('refresh');
                $(this.$refs.ref2).selectpicker('refresh');
            },
            cargarImagen:function()
            {

                this.imagen = '/upload/user/perfil/'+this.user.avatar
            },
            cargarState:function(){
                axios.get('/state').then(res=>{
                    this.state = res.data
                })
            },
            cargarCities:function(){
                let id = this.usuario.state
                axios.get('/cities/'+id).then(res=>{
                    this.cities = res.data
                })
            },
            cargarEspecie:function(){
                axios.get('/especies').then(res=>{
                    this.especies = res.data
                })
            },
            cargarRaza:function(){
                let id = this.mascota.pet_type
                axios.get('/raza/'+id).then(res=>{
                    this.razas = res.data
                })
            },

            cargarUsuario:function () {

               /* axios.get('/cargarPerfil').then(res=>{
                    this.usuario = res.data
                }).catch(error=>{
                    console.log(error)
                })*/
               this.usuario = this.user
                this.$set(this.usuario, 'old_password', '')
                this.$set(this.usuario, 'nuevo_password', '')
            },
            editar_perfil:function () {
                let id = this.usuario.id
                //console.log(this.usuario)
                axios.put('/user/perfil/edit/'+id,this.usuario).then(res => {
                    this.alert= 'success'
                    this.mensaje = true
                    this.texto_mensaje = 'Usuario Editado Exitosamente'
                }).catch(error =>{
                    this.alert= 'danger'
                    this.mensaje = true
                    this.texto_mensaje = 'Error al Editar Usuario'
                })
            },
            chooseFiles() {
               this.imagen = document.getElementById("fileUpload").click()
                //this.setUpFileUploader( this.imagen)

            },
            uploadFile () {
               /* this.canUpload = false
                this.button = {
                    name: 'Uploading...',
                    class: 'fa-refresh fa-spin'
                }*/
                this.croppie.result({
                    type: 'canvas',
                    size: 'viewport'
                }).then((response) => {
                    this.imagen = response
                    console.log(this.imagen)
                    axios.put('/user/perfil/imagen', {img: this.imagen,id:this.usuario.id})
                        .then((response) => {
                           console.log(response.data)
                        })
                })
            },
            setUpCroppie () {
                let el = document.getElementById('croppie')
                this.croppie = new Croppie(el, {
                    viewport: { width: 320, height: 320, type: 'circle' },
                    boundary: { width: 320, height: 320 },
                    original:{width:1000,height: null},
                    showZoomer: true,
                    enableOrientation: true
                })
                this.croppie.bind({
                    url: this.imagen
                })
            },
            setUpFileUploader (e) {
                let files = e.target.files[0]

                //this.imagen =  files
                //console.log(this.imagen)
               this.createImage(files)
            },
            createImage (file) {
                let image = new Image()
                let reader = new FileReader()
                let vm = this

                reader.onload = (e) => {
                    vm.imagen = e.target.result
                    vm.$emit('imgUploaded', e.target.result)
                }
                reader.readAsDataURL(file)
                this.modalVisible = true
            },
            abrirForm:function () {
                if(this.usuario.pet_type_ptrac > 1){
                    this.formulario = true

                    $('#collapseExtra').collapse('dispose');

                    $('#collapseExtra').collapse({
                        toggle: true
                    });
                }
                else{
                    this.formulario = false
                    $('#collapseExtra').collapse({
                        toggle: false
                    })
                }
            },

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

        },
        computed:{
            cargaImagen()
            {
                return this.imagen;
            }
        }
           });
   </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\appet2\resources\views/auth/perfil.blade.php ENDPATH**/ ?>