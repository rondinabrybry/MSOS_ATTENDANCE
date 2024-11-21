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
            Admin
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <p class="text-lg text-gray-900 dark:text-gray-200">Log-out Button Master Switch.</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Allows the student to Log-out after the event.</p>
                    <form method="POST" action="<?php echo e(route('admin.toggleLoggedIn')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit"
                        class="<?php echo e($setting->is_logged_in ? 'bg-blue-500 hover:bg-blue-700' : 'bg-red-600 hover:bg-red-700'); ?> text-white font-bold py-2 px-4 rounded mt-4">
                        <?php echo e($setting->is_logged_in ? 'Time-out DISPLAYED 🔓' : 'Time-out HIDDEN 🔒'); ?>

                    </button>
                    
                    </form>
                    <form action="<?php echo e(route('update.boolean', $timein->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" 
                        class="<?php echo e($timein->is_enabled ? 'bg-blue-500 hover:bg-blue-700' : 'bg-red-600 hover:bg-red-700'); ?> text-white font-bold py-2 px-4 rounded mt-4">
                            <?php echo e($timein->is_enabled ? 'Time-IN DISPLAYED 🔓' : 'Time-IN HIDDEN 🔒'); ?>

                        </button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>


    <div class="pt-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <p class="text-lg text-gray-900 dark:text-gray-200">Barcode Scanning Attendance</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Scan barcode from ID to Log-in or Log-out.</p>

                    <div class="flex">
                        <div class="mt-4 mr-4">
                            <button id="openQRButton" type="button" data-route="<?php echo e(route('createSession')); ?>" data-csrf="<?php echo e(csrf_token()); ?>"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Open Barcode Scan Login
                            </button>
                        </div>

                        <div class="mt-4">
                            <button id="openQRLogout" type="button" data-route="<?php echo e(route('createSessionLogout')); ?>" data-csrf="<?php echo e(csrf_token()); ?>"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Open Barcode Scan Logout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\LARAVEL\ATTENDANCE\ATTENDANCE\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>