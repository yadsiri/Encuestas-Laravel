

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-6 text-gray-800"><?php echo e($encuesta->titulo); ?></h1>
    <p class="text-gray-600 text-center mb-4"><?php echo e($encuesta->descripcion); ?></p>

    <h3 class="text-2xl font-semibold mb-6 text-center text-gray-800">Opciones:</h3>

    <form action="<?php echo e(route('encuestas.votar', $encuesta->id)); ?>" method="POST" class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
        <?php echo csrf_field(); ?>
        <?php $__currentLoopData = $encuesta->opciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mb-4 flex items-center gap-3">
                <input 
                    type="radio" 
                    name="opcion_id" 
                    value="<?php echo e($opcion->id); ?>" 
                    id="opcion-<?php echo e($opcion->id); ?>" 
                    class="form-radio h-5 w-5 text-blue-600">
                <label for="opcion-<?php echo e($opcion->id); ?>" class="text-gray-700">
                    <?php echo e($opcion->opcion); ?> 
                    <span class="text-sm text-gray-500">(<?php echo e($opcion->votos); ?> votos)</span>
                </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- Botón de votar -->
        <div class="text-center mt-6">
            <button 
                type="submit" 
                class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300 transition">
                Votar
            </button>
        </div>
        <!-- Botón para regresar a la lista de encuestas -->
        <div class="text-center mt-6">
            <a href="<?php echo e(route('encuestas.index')); ?>"  class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Regresar a las Encuestas</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Encuestas\resources\views/encuestas/show.blade.php ENDPATH**/ ?>