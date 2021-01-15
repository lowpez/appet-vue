<template>
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
                                        <ValidationProvider rules="rut" v-slot="{ errors }">
                                        <input class="form-control form-control-lg mb-5" name="rut" v-model="usuario.rut"  id="rut" v-rut:live type="text"  placeholder="Cédula de identidad" aria-labelledby="rut" maxlength="12" required>
                                            <span class="text-danger">{{ errors[0] }}</span>
                                        </ValidationProvider>
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
                        <ExtraPerfil :user_id="usuario.id" :organizacion="usuario.pet_type_ptrac" ></ExtraPerfil>
                    </div>
                </div>


            </div>
        </div>
    </div>

</template>

<script>
import ModelComponent from "./ModelComponent";
import ExtraPerfil from "./ExtraPerfil";
import Croppie from 'croppie'
import { ValidationProvider, extend } from "vee-validate";
import { rutValidator ,rutInputDirective } from "vue-dni";
Vue.directive('rut', rutInputDirective);
import alert from "./alert";


    export default {
        components:{
            ModelComponent,
            ExtraPerfil,
            ValidationProvider,
            alert
        },
        props:['user'],
        data:function(){
            return {
                usuario:[],
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
                alert:''
            }
        },
        created() {
            this.cargarUsuario()
            this.cargarState()
            this.updateSelect()
            this.cargarEspecie()
            this.abrirForm()
            extend("rut", rutValidator);
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
            console.log(this.usuario)
        },
        updated () {
           this.updateSelect()
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

        },
        computed:{
            cargaImagen()
            {
                return this.imagen;
            }
        }

    }
</script>

<style scoped>
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
