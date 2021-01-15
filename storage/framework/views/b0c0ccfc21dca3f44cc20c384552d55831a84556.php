<?php $__env->startSection('content'); ?>
<loader :loading="isLoading"></loader>
       <div class="tab-content">
              <div class="tab-pane fade show active" id="settings" role="tabpanel">
                  <h2 class="my-5 fs-sm">Nueva Mascota</h2>
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
                                 
                                 <?php echo $__env->make('partial.modal',['identificador'=>'add-pet'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                  <form  @submit.prevent="crearPet()" enctype="multipart/form-data">
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
                                              <input class="form-control form-control-lg mb-5" name="birthday" v-model="mascota.fecha_nac" id="birthday" type="date" required  aria-label="Fecha de Nacimiento">
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
                                      <button class="btn btn-block btn-lg btn-primary" type="submit" aria-label="Guardar nueva Mascota">Crear</button>
                                  </form>
                                  <?php echo $__env->make('partial.imagen_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
              name: 'pets',
              el: '#app',
              data: () => ({
                     mascota:{
                            tag_id:'',
                            name:'',
                            description:'',
                            sexo:'',
                            fecha_nac:null,
                            condicion_medica:'',
                            rnm:'',
                            pet_type_ptrac:'',
                            pet_type:'',
                            breeds:'',
                            country:'',
                            state:'',
                            city:'',
                            avatar:'',
                            full:'',
                            is_active:0,
                            is_lost:false,
                            is_dangerous:false
                     },
                     buscador: "",
                     pets_buscador: [],
                     isLoading:false,
                     regiones:[],
                     cities:[],
                     especies:[],
                     razas:[],
                     imagen:'/media/uploads/pets/no.jpg',
                     croppie:null,
                     mensaje:false,
                     texto_mensaje:'',
                     alert:'',
                     errors:[]
              }),
              computed:{
                     cargaImagen()
                     {
                            return this.imagen;
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
                     this.$on('imgUploaded', function (imageData) {
                            this.image = imageData
                            this.croppie.destroy()
                            this.setUpCroppie(imageData)
                     })
                     //this.image = this.imgUrl
                     this.setUpCroppie()
              },
              methods:{
                     updateSelect:function()
                     {
                            $(this.$refs.especie).selectpicker('refresh');
                            $(this.$refs.breeds).selectpicker('refresh');
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
            crearPet:function () {
                axios.post('/pets',this.mascota).then(res => {
                    this.alert= 'success'
                    this.mensaje = true
                    this.texto_mensaje = 'Mascota Agregada Exitosamente'
                    $("#confirm-add-pet").modal("show")
                   this.resetPet()
                }).catch(error=>{
                    this.alert= 'danger'
                    this.mensaje = true
                    this.texto_mensaje = 'Error al Guardar'
                    console.log(error.response.data.errors)
                    this.errors.push(error.response.data.errors);
                    console.log(this.errors.length)
                })
            },
            resetPet:function () {
                this.mascota.tag_id=''
                this.mascota.name=''
                this.mascota.description=''
                this.mascota.condicion_medica=''
                this.mascota.rnm=''
                this.mascota.pet_type=''
                this.mascota.breeds=''
                this.mascota.country=''
                this.mascota.state=''
                this.mascota.city=''
                this.mascota.avatar=''
                this.mascota.full=''
                this.mascota.is_active=0
                this.mascota.is_lost=false
                this.mascota.is_dangerous=false
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
                 this.isLoading = true
                this.mascota.full = this.imagen
                this.croppie.result({
                    type: 'canvas',
                    size: 'viewport'
                }).then((response) => {
                    this.imagen = response
                    console.log(this.image)
                    this.mascota.avatar= this.imagen
                    this.isLoading = false
                    console.log('hola me estoy aqui')
                    $("#newAvatar").modal("hide")
                   /* axios.put('/user/perfil/imagen', {img: this.image,id:this.usuario.id})
                        .then((response) => {
                            console.log(response.data)
                        })*/
                })
            },
            setUpCroppie () {
                let el = document.getElementById('croppie')
                this.croppie = new Croppie(el, {
                    viewport: { width: 320, height: 320, type: 'circle' },
                    boundary: { width: 320, height: 320 },
                    original:{width:1200,height: null},
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

                  modalConfirm(){
                      $("#confirm-add-pet").modal("hide")
                  }

              }
           });

           Vue.component('modal-component', {
               props:['activar_modal'],
               template: `
                     <?php echo $__env->make('pet.model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                `
           })
   </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\appet2\resources\views/pet/create.blade.php ENDPATH**/ ?>