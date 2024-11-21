<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Import Data')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    
    <div class="max-w-7xl mx-auto mt-10 bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Import CSV File</h2>

        <?php if(session('success')): ?>
            <div class="p-4 mb-4 text-green-700 bg-green-100 dark:bg-green-800 dark:text-green-200 rounded-lg" role="alert">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <form id="csvForm" action="<?php echo e(route('import.csv.upload')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="mb-4">
                <input type="file" name="file" id="fileInput" accept=".csv"
                    class="w-full p-2 border text-black dark:text-white border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:border-blue-500" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md" id="uploadButton">
                Import Data
            </button>
        </form>

        <div id="errorMessage" class="hidden p-4 mt-4 text-red-700 bg-red-100 dark:bg-red-800 dark:text-red-200 rounded-lg" role="alert">
            Only CSV files are accepted.
        </div>

        <div class="w-full mt-6" style="display: none;" id="progressContainer">
            <h3 class="text-lg font-semibold mb-3 text-gray-800 dark:text-gray-200">Import Progress</h3>
            <div class="relative pt-1">
                <div class="overflow-hidden h-4 text-xs flex rounded bg-blue-200 dark:bg-blue-700">
                    <div id="progressBar" style="width: 0%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500">0%</div>
                </div>
            </div>
            <p class="text-center mt-2 text-gray-700 dark:text-gray-300" id="progressText">Processing...</p>
        </div>

        <div id="csvTableContainer" class="hidden mt-6">
            <h3 class="text-lg font-semibold mb-3 text-gray-800 dark:text-gray-200">Data Preview</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead id="csvTableHeader" class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"></thead>
                    <tbody id="csvTableBody"></tbody>
                </table>
            </div>
        </div>
        
    </div>

    <div id="completedModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 w-1/3 shadow-lg text-center">
            <h3 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Import Completed!</h3>
            <p class="text-gray-700 dark:text-gray-300">Your CSV data has been successfully imported.</p>
            <button id="closeModalButton" class="mt-6 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Close</button>
        </div>
    </div>

    <?php if(session('show_modal')): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('completedModal').classList.remove('hidden');
        });
    </script>
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\LARAVEL\ATTENDANCE\ATTENDANCE\resources\views/import.blade.php ENDPATH**/ ?>