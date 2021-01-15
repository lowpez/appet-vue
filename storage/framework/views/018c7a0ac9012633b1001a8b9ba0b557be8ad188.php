<?php $__env->startSection('content'); ?>
<main>
    <div class="py-11">
        <div class="container">

        <?php if(\App\View::getCountNotificacionindex(Auth::user()->id)>0): ?>
            <div class="mx-auto text-center" style="max-width: 468px;">
                <h2 class="mb-5 font-weight-bold">Notificaciones</h2>
                <p class="mb-11 lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
                <div class="row">
                    <?php $__currentLoopData = $notificaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 col-xl-4 mt-5"><!-- 2 COLS MD + SM -->

                            <div class="card mb-5 mb-xl-0">
                                <div class="card-body">
                                    <p><?php echo e($notification->comments); ?> </p>
                                    <hr>
                                    <div class="d-flex">
                              <span class="avatar avatar-md mr-3 border rounded-circle" v-lazy-container="{ selector: 'img' }">
                                <img data-src="<?php echo e(asset('media/uploads/pets/'.$notification->pet->avatar)); ?>" class="image-fluid avatar-md rounded-circle" alt="<?php echo e($notification->pet->name); ?>">
                              </span>
                                        <div class="mr-auto">
                                            <h3 class="fs-xxs lh-lg">
                                                <a href="#"><?php echo e($notification->pet->name); ?></a>
                                            </h3>
                                           
                                            <p>Visto <?php echo e($notification->created_at->format('d M, Y')); ?></p>
                                        </div>
                                        <a href="https://www.google.es/maps?q=<?php echo e($notification->latitud); ?>,<?php echo e($notification->longitud); ?>" aria-label="Encuentralo en Google Maps"><svg class="gi gi-github-fill fs-xxl" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g data-name="Layer 2"><g data-name="pin"><rect width="24" height="24" opacity="0"/><path d="M12 2a8 8 0 0 0-8 7.92c0 5.48 7.05 11.58 7.35 11.84a1 1 0 0 0 1.3 0C13 21.5 20 15.4 20 9.92A8 8 0 0 0 12 2zm0 17.65c-1.67-1.59-6-6-6-9.73a6 6 0 0 1 12 0c0 3.7-4.33 8.14-6 9.73z"/><path d="M12 6a3.5 3.5 0 1 0 3.5 3.5A3.5 3.5 0 0 0 12 6zm0 5a1.5 1.5 0 1 1 1.5-1.5A1.5 1.5 0 0 1 12 11z"/></g></g>
                                        </a>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                        </div><!-- / 2 COLS MD + SM -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
           <?php else: ?>
            <div class="mx-auto text-center" style="max-width: 468px;">
                <h2 class="mb-5 font-weight-bold">Notificaciones</h2>
                <p class="mb-11 lead">Hey! Bievenido! Aun sin notificaciones pero pronto estaras recibiendolas para saber donde anduvo tu peludo y tambien ayudar</p>
            </div>
            <?php endif; ?>
        </div>
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
                };
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
            },
           });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/appetcl2/appet/resources/views/notificaciones/index.blade.php ENDPATH**/ ?>