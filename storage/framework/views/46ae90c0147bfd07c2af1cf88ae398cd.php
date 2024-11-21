

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-6">Crear Nueva Encuesta</h1>

    <form action="<?php echo e(route('encuestas.store')); ?>" method="POST" class="bg-white shadow-lg rounded-lg p-6">
        <?php echo csrf_field(); ?>
        <!-- Campo de Título -->
        <div class="mb-4">
            <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">Título</label>
            <input 
                type="text" 
                id="titulo" 
                name="titulo" 
                value="<?php echo e(old('titulo')); ?>" 
                required 
                class="form-control w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" 
                placeholder="Escribe el título de la encuesta">
        </div>

        <!-- Campo de Descripción -->
        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
            <textarea 
                id="descripcion" 
                name="descripcion" 
                required 
                class="form-control w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" 
                placeholder="Describe brevemente la encuesta"><?php echo e(old('descripcion')); ?></textarea>
        </div>

        <!-- Campo de Categoría -->
        <div class="mb-4">
            <label for="categoria" class="block text-sm font-medium text-gray-700 mb-2">Categoría</label>
            <select 
                name="categoria" 
                required 
                class="form-select w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                <option value="tecnología">Tecnología</option>
                <option value="educación">Educación</option>
                <option value="salud">Salud</option>
            </select>
        </div>

        <!-- Opciones -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Opciones</label>
            <div id="opciones-container">
                <div class="flex items-center gap-2 mb-2">
                    <input 
                        type="text" 
                        name="opciones[]" 
                        placeholder="Opción 1" 
                        required 
                        class="form-control w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="flex items-center gap-2 mb-2">
                    <input 
                        type="text" 
                        name="opciones[]" 
                        placeholder="Opción 2" 
                        required 
                        class="form-control w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                </div>
            </div>
            <button 
                type="button" 
                id="add-opcion" 
                class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Añadir Opción
            </button>
        </div>

        <!-- Botón de Guardar -->
        <div class="text-center">
            <button 
                type="submit" 
                class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">
                Guardar Encuesta
            </button>
        </div>
         <!-- Botón para regresar a la lista de encuestas -->
         <div class="text-center mt-6">
             <a href="<?php echo e(route('encuestas.index')); ?>"  class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Regresar a las Encuestas</a>
        </div>
    </form>
</div>

<script>
    document.getElementById('add-opcion').addEventListener('click', function () {
        const container = document.getElementById('opciones-container');
        const newOption = document.createElement('div');
        newOption.classList.add('flex', 'items-center', 'gap-2', 'mb-2');
        newOption.innerHTML = `
            <input 
                type="text" 
                name="opciones[]" 
                placeholder="Nueva Opción" 
                required 
                class="form-control w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
        `;
        container.appendChild(newOption);
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Encuestas\resources\views/encuestas/create.blade.php ENDPATH**/ ?>