<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>A p p e t</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/base.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/appet.css')); ?>">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" integrity="sha384-AKT9MKPmIq4VMihDqOB6HeDHSsXGyf92WHPCSwHAZPIVJpD8Jv6dmfTLZeLDvV4O" crossorigin="anonymous">
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
<?php echo $__env->make('front.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid py-5 px-lg-5">
<?php echo $__env->yieldContent('content'); ?>
</div>
<?php echo $__env->make('front.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\Laragon\www\appet\resources\views/front/layout/app.blade.php ENDPATH**/ ?>