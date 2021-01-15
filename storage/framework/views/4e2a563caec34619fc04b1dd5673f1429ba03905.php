<?php $__env->startPush('styles'); ?>
    <style>
        #busqueda{
            display: none;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<main>
    <div class="d-flex align-items-center min-vh-100 py-11 mx-auto" style="max-width: 468px;">
        <div class="container">
            <div class="card">
                <div class="card-body p-sm-9">
                    <form  method="post" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                      
                        <object data="<?php echo e(asset('logo.svg')); ?>" class="w-50  mx-auto mb-5 d-block" type="image/svg+xml">
                            <!-- Imagen alternativa si el SVG no puede cargarse -->
                            <img src="gráficoalternativo.png" alt="Imagen PNG alternativa">
                        </object>
                        <label class="sr-only" for="username">Usuario</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <svg class="gi gi-person-fill fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4z"></path>
                                    <path d="M18 21a1 1 0 0 0 1-1 7 7 0 0 0-14 0 1 1 0 0 0 1 1z"></path>
                                </svg>
                            </div>
                            <input class="form-control form-control-lg" name="email" id="email" type="text" placeholder="Email" required="">
                        </div>
                        <label class="sr-only" for="password">Password</label>
                        <div class="input-group mb-5">
                            <div class="input-group-prepend">
                                <svg class="gi gi-lock-fill fs-sm" width="1em" height="1em" viewbox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="15" r="1"></circle>
                                    <path d="M17 8h-1V6.11a4 4 0 1 0-8 0V8H7a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-8a3 3 0 0 0-3-3zm-7-1.89A2.06 2.06 0 0 1 12 4a2.06 2.06 0 0 1 2 2.11V8h-4zM12 18a3 3 0 1 1 3-3 3 3 0 0 1-3 3z"></path>
                                </svg>
                            </div>
                            <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password" required="">
                        </div>
                        <!--<a class="link-primary" href="#">Olvidó su clave?</a>-->
                        <button class="btn btn-block btn-lg btn-primary mt-3" type="submit">Aceptar</button>
                        <p class="mt-5 text-center">No tiene una cuenta? <a class="link-primary" href="<?php echo e(route('register')); ?>">Registrese</a>.</p>

                        <a class="btn btn-block btn-lg btn-primary mt-3" href="<?php echo e(route('social.auth', 'facebook')); ?>">
                            Facebook
                        </a>


                        <a class="btn btn-block btn-lg btn-primary mt-3" href="<?php echo e(route('social.auth', 'twitter')); ?>">
                            Twitter
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laragon\www\appet\resources\views/auth/login.blade.php ENDPATH**/ ?>