<?php $__env->startSection('content'); ?> 
 <?php $__env->slot('header', null, []); ?> 
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <?php echo e(__('Dashboard')); ?>

    </h2>
 <?php $__env->endSlot(); ?>

<div class="py-12 bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- Tarjeta de bienvenida -->
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
            <h3 class="text-2xl font-bold text-gray-900">¡Bienvenido a encuestas para todos!</h3>
            <p class="mt-2 text-gray-600">
                Administra tus encuestas de forma eficiente con las herramientas a continuación.
            </p>
        </div>

        <!-- Botones de navegación -->
        <div class="bg-white shadow-lg rounded-lg p-6 flex justify-center gap-6">
            <a href="<?php echo e(route('encuestas.index')); ?>" 
               class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-300 shadow">
                Ver Encuestas
            </a>
            <a href="<?php echo e(route('encuestas.create')); ?>" 
               class="px-6 py-3 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition duration-300 shadow">
                Crear Encuesta
            </a>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Encuestas\resources\views/dashboard.blade.php ENDPATH**/ ?>