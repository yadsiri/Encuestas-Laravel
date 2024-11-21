

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-center mb-6">Listado de Encuestas</h1>
    
    <!-- Botón para crear una nueva encuesta -->
    <div class="text-center mb-4">
        <a href="<?php echo e(route('encuestas.create')); ?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Crear Nueva Encuesta</a>
    </div>

    <!-- Mostrar mensajes de éxito -->
    <?php if(session('success')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Formulario de búsqueda y filtro -->
    <form method="GET" action="<?php echo e(route('encuestas.index')); ?>" class="mb-6">
        <div class="flex flex-wrap items-center justify-center gap-4">
            <div>
                <label for="search" class="block text-sm font-medium">Buscar:</label>
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Título o descripción..." 
                    value="<?php echo e(request('search')); ?>" 
                    class="form-control w-64 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div>
                <label for="category" class="block text-sm font-medium">Categoría:</label>
                <select 
                    name="category" 
                    class="form-select w-64 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                    <option value="">Selecciona una categoría</option>
                    <option value="tecnología" <?php echo e(request('category') == 'tecnología' ? 'selected' : ''); ?>>Tecnología</option>
                    <option value="educación" <?php echo e(request('category') == 'educación' ? 'selected' : ''); ?>>Educación</option>
                    <option value="salud" <?php echo e(request('category') == 'salud' ? 'selected' : ''); ?>>Salud</option>
                </select>
            </div>
            <div>
                <button 
                    type="submit" 
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Buscar
                </button>
            </div>
        </div>
    </form>

    <!-- Tabla de encuestas -->
    <div class="overflow-x-auto">
        <table id="tabla-encuestas" class="table-auto w-full text-left border-collapse bg-white rounded-lg shadow-lg">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-4 py-2">Título</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2">Categoría</th>
                    <th class="px-4 py-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $encuestas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $encuesta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-100">
                        <td class="border px-4 py-2"><?php echo e($encuesta->titulo); ?></td>
                        <td class="border px-4 py-2"><?php echo e($encuesta->descripcion); ?></td>
                        <td class="border px-4 py-2"><?php echo e($encuesta->categoria); ?></td>
                        <td class="border px-4 py-2 text-center">
                            <a href="<?php echo e(route('encuestas.show', $encuesta->id)); ?>" class=" bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Ver</a>
                            <a href="<?php echo e(route('encuestas.edit', $encuesta->id)); ?>" class=" bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Editar</a>
                            <form action="<?php echo e(route('encuestas.destroy', $encuesta->id)); ?>" method="POST" style="display:inline;" id="delete-form-<?php echo e($encuesta->id); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button 
                                    type="button" 
                                    onclick="confirmDeletion(<?php echo e($encuesta->id); ?>)" 
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="text-center py-4">No se encontraron encuestas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-6">
        <?php echo e($encuestas->links('pagination::tailwind')); ?>

    </div>
</div>

<script>
    // Función para mostrar el cuadro de confirmación
    function confirmDeletion(encuestaId) {
        if (confirm('¿Seguro que quieres eliminar esta encuesta?')) {
            document.getElementById('delete-form-' + encuestaId).submit();
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('#tabla-encuestas').DataTable({
            responsive: true,
            language: {
                search: "Buscar:",
                lengthMenu: "Mostrar _MENU_ registros",
                info: "Mostrando _START_ a _END_ de _TOTAL_ encuestas",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: "Siguiente",
                    previous: "Anterior"
                },
                emptyTable: "No hay encuestas disponibles",
                zeroRecords: "No se encontraron coincidencias"
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Encuestas\resources\views/encuestas/index.blade.php ENDPATH**/ ?>