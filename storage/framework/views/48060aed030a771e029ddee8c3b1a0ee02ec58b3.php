<?php $__env->startSection('content'); ?>

    <?php if(Session::has('success')): ?>
        <div :class="'alert alert-dismissible mb-5 text-white font-weight-semi-bold bg-success fade show'" role="alert">
            <?php echo e(Session::get('success')); ?>

            <button class="btn close" data-dismiss="alert" type="button" aria-label="Close">
                <svg class="gi gi-close fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"/>
                </svg>
            </button>
        </div>
    <?php endif; ?>
    <main>
        <div class="py-11">
            <div class="container">
                <div class="mx-auto text-center" style="max-width: 468px;" v-if="pets.length > 0">
                    <h2 class="mb-5 font-weight-bold">Mis Mascotas</h2>
                    <p class="mb-11 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="mx-auto text-center" style="max-width: 468px;" v-else="pets.length > 0">
                    <h2 class="mb-5 font-weight-bold">Mis Mascotas</h2>
                    <p class="mb-11 lead">Hey! Vemos aun no has añadido ninguna mascota. Que tal si empezamos con la primera?</p>
                </div>
                <alert v-show="mensaje" :mensaje="mensaje" :texto_mensaje="texto_mensaje" :alert="alert"></alert>

                <div class="row">
                    <div class="col-sm-6 col-lg-3" v-for="(mascotas ,index ) in  pets" :key="index" ref="pets"><!-- ITEM -->
                        <div class="card mb-5">
                            <div class="card-body text-center">
              <span class="avatar avatar-xl mb-3 bg-neutral rounded-circle"><!-- AVATAR -->
                  <a :href="'/tags-pdf/'+mascotas.tag_id" target="_blank"><img :src="'/media/uploads/pets/'+mascotas.avatar" class="image-fluid rounded-circle avatar-xl" :alt="'Avatar de'+ mascotas.name"></a>
              </span><!-- / AVATAR -->
                                <h3 class="mb-1 fs-xxs">
                                    <a :href="'/tags-pdf/'+mascotas.tag_id" target="_blank">{{mascotas.name}}</a>
                                </h3>
                                <p class="mb-3"><small><a href="#" class="text-reset">Vistas {{mascotas.views_count}}</a></small></p>
                                <ul class="list-unstyled d-flex justify-content-center"><!-- OPTIONS -->
                                    <li class="mr-3">
                                        <a class="btn btn-sm btn-circle btn-neutral bg-g rounded-circle" :href="'/tags-pdf/'+mascotas.tag_id" target="_blank">
                                            <svg class="gi gi-twitter-fill fs-sm text-white" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.36 7H18V5a1.92 1.92 0 0 0-1.83-2H7.83A1.92 1.92 0 0 0 6 5v2H4.64A2.66 2.66 0 0 0 2 9.67v6.66A2.66 2.66 0 0 0 4.64 19h.86a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2h.86A2.66 2.66 0 0 0 22 16.33V9.67A2.66 2.66 0 0 0 19.36 7zM8 5h8v2H8zm-.5 14v-4h9v4zM20 16.33a.66.66 0 0 1-.64.67h-.86v-2a2 2 0 0 0-2-2h-9a2 2 0 0 0-2 2v2h-.86a.66.66 0 0 1-.64-.67V9.67A.66.66 0 0 1 4.64 9h14.72a.66.66 0 0 1 .64.67z"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="mr-3">
                                        <a class="btn btn-sm btn-circle btn-neutral bg-b rounded-circle" :href="'/pets/'+mascotas.id+'/edit'">
                                            <svg class="gi gi-twitter-fill fs-xs text-white" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-sm btn-circle btn-neutral bg-r rounded-circle" @click="eliminarPet(index)">
                                            <svg class="gi gi-twitter-fill fs-xs text-white" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"></path>
                                            </svg>
                                        </a>
                                    </li>
                                </ul><!-- / OPTIONS -->
                            </div>
                        </div>
                    </div><!-- / ITEM -->
                </div>
            </div>

            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-deleteLabel" aria-hidden="true"><!-- / MODAL -->
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="fs-xs" id="confirm-deleteLabel">¿Estás seguro?</h2>
                            <button class="btn btn-sm btn-circle btn-neutral align-self-start" data-dismiss="modal" type="button" aria-label="Close">
                                <svg class="gi gi-close fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="modal-body">


                            Estás a punto de eliminar a {{mascotas.nombre_mascota}}. <br />
                            Este proceso es definitivo.
                            <label for="subject">Clave</label>
                            <input class="form-control form-control-lg mb-3" v-model="mascotas.password_confirm" id="subject" type="password" placeholder="Ingresa tu clave">

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-block btn-lg btn-primary" @click="confirmDelete" >Confirmar</button>
                        </div>
                    </div>
                </div>
            </div><!-- / MODAL -->
        </div>
    </main>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
   <script>
           const app = new Vue({
              name: 'Notificaciones',
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
            data() {
                return {
                    buscador: "",
                    pets_buscador: [],
                    avatar:'perfil1581463497.png',
                mascotas:{
                    id:0,
                    nombre_mascota:'',
                    password_confirm:''
                },
                pets:[],
                mensaje:false,
                texto_mensaje:'',
                alert:''
                };
            },
            computed:{
            avatarget:function () {
                return '/upload/user/'+this.avatar;
            }
        },

        mounted() {
            this.listarPet();//carga los datos de mascota del usuario
        },
            methods: {
                buscarPorTagid: function () {
                    let buscardor = this.buscador;
                    axios
                        .get("/buscar-tag-id/" + this.buscador)
                        .then((resp) => {
                            console.log(resp.data);
                            this.pets_buscador = resp.data;
                        })
                        .catch((error) => {
                            console.log("mascota no encontrada ...");
                        });
                },

                listarPet:function(){
               axios.get('/getPet').then(res =>{
                  this.pets = res.data
               }).catch(error => {
                   console.log('error al cargar')
               })
            },
            eliminarPet:function (id) {

                this.mascotas.id = this.pets[id].id
                this.mascotas.nombre_mascota = this.pets[id].name
                $("#confirm-delete").modal("show")

            },
            confirmDelete:function () { //al presionar el confirmar y si la clave es correcta elimina en caso contrario deja un mensaje de error

                axios.post('/deletemascota',this.mascotas).then(res => {
                    console.log(res.data)

                    this.mensaje = true

                    this.texto_mensaje = 'El registro de su mascota ha sido eliminada correctamente !!'

                    this.alert ='danger'

                    this.resetMascota()

                    $("#confirm-delete").modal("hide")

                    this.listarPet()

                }).catch(error => {
                    this.mensaje = true

                    this.texto_mensaje = 'La Clave Ingresada es invalida !!'

                    this.alert ='danger'

                    this.resetMascota()

                    $("#confirm-delete").modal("hide")
                })
            },
            resetMascota:function () {
                    this.mascotas.id = '';
                    this.mascotas.nombre_mascota = '';
                    this.mascotas.password_confirm = '';
            }
            },

           });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\appet2\resources\views/pet/index.blade.php ENDPATH**/ ?>