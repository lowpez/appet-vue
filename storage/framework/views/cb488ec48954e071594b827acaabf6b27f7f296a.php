<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>A p p e t</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/base.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/appet.css')); ?>">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" integrity="sha384-AKT9MKPmIq4VMihDqOB6HeDHSsXGyf92WHPCSwHAZPIVJpD8Jv6dmfTLZeLDvV4O" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/croppie.css')); ?>">
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
   <div class="d-flex flex-column flex-lg-row" id="app">
        <?php echo $__env->make('include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <main class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
   </div>    
<?php echo $__env->make('include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldPushContent('script'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\appet2\resources\views/layouts/app.blade.php ENDPATH**/ ?>