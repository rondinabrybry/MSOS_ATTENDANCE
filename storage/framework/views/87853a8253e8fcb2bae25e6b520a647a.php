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
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card Container -->
            <div class="bg-gray-800 text-white shadow-md rounded-lg p-8 flex flex-row sm:flex-row items-center sm:items-start">
                <!-- Profile Image -->
                <div class="flex-shrink-0 sm:mb-0 sm:mr-8">
                    <img src="<?php echo e(asset('storage/' . Auth::user()->profile_image)); ?>" 
                         alt="<?php echo e(Auth::user()->name); ?>" 
                         class="rounded-lg object-cover shadow-md" style="width: 300px;">
                </div>

                <!-- User Details -->
                <div style="line-height: 1.2;">
                    <h1 class="font-bold ml-2" style="font-size:70px;"><?php echo e(Auth::user()->name); ?></h1>
                    <p class="ml-2" style="font-size:50px;">
                        <?php echo e(Auth::user()->course); ?> <?php echo e(Auth::user()->section); ?><?php echo e(Auth::user()->section1); ?> <?php echo e(Auth::user()->time_preference); ?>

                    </p>
                    <p class="ml-2" style="font-size:20px;"><?php echo e(Auth::user()->email); ?></p>
                    <p class="ml-2" style="font-size:100px;"><?php echo e(Auth::user()->student_id); ?></p>
                </div>
            </div>

            <!-- Button Section -->
            <div class="mt-8">
                <?php if(auth()->guard()->check()): ?>
                    <?php
                        $enabledLogin = \App\Models\enable_login::first();
                    ?>

                    <?php if($enabledLogin && $enabledLogin->is_enabled == 1): ?>
                        <?php if(Auth::user()->attendances->isEmpty()): ?>
                            <form method="POST" action="<?php echo e(route('user-attendance.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" 
                                        class="bg-blue-500 w-full text-center hover:bg-blue-700 text-white font-bold text-xl py-3 px-6 rounded">
                                    Time-In
                                </button>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(Auth::user()->attendances->isNotEmpty()): ?>
                        <form method="POST" action="<?php echo e(route('user-logout-attendance.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <?php if(Auth::user()->canLogout()): ?>
                                <button type="submit"
                                        class="bg-red-600 w-full text-center hover:bg-red-700 text-white font-bold text-xl py-3 px-6 rounded">
                                    Time-Out
                                </button>
                            <?php endif; ?>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
                

                <?php
                    $incompleteFields = [];
                    if (is_null(Auth::user()->course)) {
                        $incompleteFields[] = 'Course';
                    }
                    if (is_null(Auth::user()->section)) {
                        $incompleteFields[] = 'Year';
                    }
                    if (is_null(Auth::user()->section1)) {
                        $incompleteFields[] = 'Section';
                    }
                    if (is_null(Auth::user()->time_preference)) {
                        $incompleteFields[] = 'Class Schedule (Day/Night)';
                    }
                    if (is_null(Auth::user()->student_id)) {
                        $incompleteFields[] = 'Student ID';
                    }
                ?>
                <?php if(count($incompleteFields) > 0): ?>
                    <div id="incompleteProfileModal"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-auto">
                            <h2 class="text-xl font-semibold text-gray-800">Complete Your Student Profile</h2>
                            <p class="mb-4 text-gray-600">Please complete the following fields:</p>
                            <ul class="list-disc list-inside text-gray-600 mb-4">
                                <?php $__currentLoopData = $incompleteFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($field); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <button onclick="window.location='<?php echo e(url('profile')); ?>'" id="closeModalButton"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Go to Profile
                            </button>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const incompleteModal = document.getElementById('incompleteProfileModal');
                            const time_in_btn = document.getElementById('hide_me');
                            if (incompleteModal) {
                                incompleteModal.classList.remove('hidden');
                                time_in_btn.classList.add('hidden');
                            }
                        });
                    </script>
                <?php endif; ?>
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
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\LARAVEL\MSOS_ATTENDANCE\resources\views/dashboard.blade.php ENDPATH**/ ?>