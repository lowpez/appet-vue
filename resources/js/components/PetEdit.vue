import Swal from "sweetalert2";
<template>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="settings" role="tabpanel">
            <h2 class="my-5 fs-sm">Editar Mascota</h2>
            <hr class="mb-0">
            <div id="accordionOne">
                <div class="accordion-item">
                    <div class="accordion-header" id="headingOne" data-toggle="collapse-" data-target="#collapseOne" role="button" aria-expanded="false" aria-controls="collapseOne">
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
                            <form  @submit.prevent="editarPet()" enctype="multipart/form-data">
                                <div class="card mb-5"><!-- AVATAR -->
                                    <div class="card-body d-md-flex text-center justify-content-center justify-content-lg-start align-items-center">
                          <span class="avatar avatar-xxl status status-online mr-5 mb-2 mb-sm-2 bg-primary rounded-circle">
                           <img :src="cargaImagen" width="220" height="220" @click.prevent="chooseFiles()" data-toggle="modal"  data-target="#newAvatar" class="rounded-circle avatar-xxl">
                              <input type="file"  id="fileUpload" @change="setUpFileUploader" hidden>
                        </span>
                                        <div><!-- PET TYPE -->
                                            <h4 class="mb-2 fs-xxs lh-sm mr-md-5 mr-sm-2">
                                                <select class="form-control iam btn-lg mb-2 selectpicker form-control-lg" v-model="mascota.pet_type_ptrac" data-width="fit" name="pet_type_ptrac"  data-style="btn-primary" id="pet_type_ptrac">
                                                    <option value="1">Mascotas de compañía</option>
                                                    <option value="2">Animal Abandonado</option>
                                                    <option value="3">Animal Callejero</option>
                                                    <option value="4">Animal Comunitario</option>
                                                </select>
                                            </h4>
                                            <p class="lh-sm"></p>
                                        </div><!-- /PET TYPE  -->
                                    </div>
                                </div><!-- / AVATAR -->
                                <label for="name">Nombre</label>
                                <input class="form-control form-control-lg mb-5" name="name"  v-model="mascota.name" id="name" type="text" placeholder="Nombre" aria-labelledby="name">
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="pet_type">Especie</label>
                                        <select  @change="cargarRaza()" v-model="mascota.pet_type" class="form-control selectpicker form-control-lg mb-5" ref="especie" name="pet_type" data-live-search="true" id="pet_type">
                                            <option v-for="(especie , index) in especies" :key="index" :value="especie.id">{{especie.name}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="breeds">Raza</label>
                                        <select  v-model="mascota.breeds"  class="form-control selectpicker form-control-lg mb-5" ref="breeds" id="breeds" data-live-search="true" name="breeds" >
                                            <option v-for="(raza , r) in razas" :key="r" :value="raza.id">{{raza.name}}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="sexo">Sexo</label>
                                        <select class="form-control selectpicker form-control-lg mb-5" v-model="mascota.sexo" name="sexo" data-live-search="false" id="sexo">
                                            <option value="m">Macho</option>
                                            <option value="h">Hembra</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="birthday">Fecha de Nacimiento</label>
                                        <input class="form-control form-control-lg mb-5" v-model="mascota.fecha_nac" name="birthday" id="birthday" type="date" required  aria-label="Fecha de Nacimiento">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="rnm">Nº Registro Nacional Mascotas</label>
                                        <input class="form-control form-control-lg mb-5" v-model="mascota.rnm" name="rnm" id="rnm" type="text" placeholder="Nº Registro Nacional Mascotas"  aria-label="Nº Registro Nacional de Mascotas">
                                    </div>
                                </div>
                                <label for="biography">Describe a tu Mascota</label>
                                <textarea class="form-control mb-5" name="biography" id="biography"  v-model="mascota.description" rows="3" placeholder="Color, tamaño, gustos y todo lo que lo hace tan especial." aria-labelledby="biography"></textarea>

                                <label for="medical">Su Condición Médica</label>
                                <textarea class="form-control mb-5" name="medical" id="medical" v-model="mascota.condicion_medica" rows="3" placeholder="Si necesita cuidados especiales o tiene alguna condicion medica delicada, incluyela aquí." aria-labelledby="medical"></textarea>

                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="mr-auto fs-xxs lh-lg">Mascota Extravida</h4>
                                    <div class="form-check form-switch fs-sm">
                                        <input class="form-check-input" v-model="mascota.is_lost" name="is_lost" id="is_lost" type="checkbox" aria-labelledby="is_lost">
                                        <label class="sr-only" for="is_lost" aria-label="Avisa a la comunidad tu mascota se ha extraviado">Switch</label>
                                    </div>
                                </div>
                                <p class="mb-5">Si tu mascota se extravió, enviaremos una alerta a todos los amigos de Appet.</p><hr>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="mr-auto fs-xxs lh-lg">Puedo ser peligroso</h4>
                                    <div class="form-check form-switch fs-sm">
                                        <input class="form-check-input" name="is_dangerous" v-model="mascota.is_dangerous" id="is_dangerous" type="checkbox" aria-label="Mascota potencialmente peligrosa">
                                        <label class="sr-only" for="is_dangerous">Switch</label>
                                    </div>
                                </div>
                                <p class="mb-5">Toda mascota o animal de compañía que ha sido <strong><a href="faqs#soy-peligroso" aria-label="¿Por qué soy considerado peligroso?">calificado</a></strong> como tal por la autoridad sanitaria.</p>
                                <button class="btn btn-block btn-lg btn-primary" type="submit" aria-label="Guardar nueva Mascota">Editar</button>
                            </form>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

        import Croppie from "croppie";
        import Swal from 'sweetalert2';
        import alert from "./alert";
        export default {
            props:['pet'],
            components:{
                alert
            },
            data(){
                return {
                    mascota:[],
                    regiones:[],
                    cities:[],
                    especies:[],
                    razas:[],
                    imagen:'https://img3.wikia.nocookie.net/__cb20140911193903/ssbb/es/images/0/09/Sprite_del_Perro_de_Duck_Hunt.gif',
                    full:'',
                    croppie:null,
                    mensaje:false,
                    texto_mensaje:'',
                    alert:'',
                    errors:[]
                }
            },
            created() {
                this.cargarEspecie()
                this.updateSelect()
            },
            updated () {
               this.updateSelect()
            },
            mounted() {
                this.cargarState()
                this.cargarEspecie()
                this.cargaEditar()
                this.$on('imgUploaded', function (imageData) {
                    this.image = imageData
                    this.croppie.destroy()
                    this.setUpCroppie(imageData)
                })
                //this.image = this.imgUrl
                this.setUpCroppie()
                this.cargarImagen()
                this.cargarRaza()
            },
            methods:{
                updateSelect:function()
                {
                    $(this.$refs.especie).selectpicker('refresh');
                    $(this.$refs.breeds).selectpicker('refresh');
                },
                cargarImagen:function()
                {
                    console.log(this.mascota.avatar)
                    this.imagen = '/upload/pets/'+this.mascota.avatar
                },
                cargarState:function(){
                    axios.get('/state').then(res=>{
                        this.regiones = res.data
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
                cargaEditar:function(){
                 /* axios.get('/pets/'+this.id).then(res => {
                      this.mascota = res.data
                  })*/
                 this.mascota = this.pet
                },
                editarPet:function () {
                    let id = this.mascota.id
                    axios.put('/pets/'+id,this.mascota).then(res => {
                        this.mensaje = true
                        this.texto_mensaje = 'Mascota Editada Exitosamente'
                        this.alert = 'success'
                        console.log(res.data)
                    }).catch(error => {
                        this.mensaje = true
                        this.texto_mensaje = 'Error al Editar'
                        this.alert = 'danger'
                    })
                },
                chooseFiles() {
                    this.imagen = document.getElementById("fileUpload").click()
                    //this.setUpFileUploader( this.imagen)

                },
                uploadFile () {
                   this.full = this.imagen
                    this.croppie.result({
                        type: 'canvas',
                        size: 'viewport'
                    }).then((response) => {
                        this.imagen = response
                        console.log(this.imagen)
                        this.mascota.avatar = this.imagen
                        axios.put('/pet-imagen', {img: this.imagen,full:this.full,id:this.mascota.id})
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
                }

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

</style>
