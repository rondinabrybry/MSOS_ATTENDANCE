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
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <?php if(session('success')): ?>
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <div class="bg-red-500 text-white p-4 rounded mb-4">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="flex flex-col items-center mb-8">
                        <img src="<?php echo e(asset('storage/' . Auth::user()->profile_image)); ?>" alt="<?php echo e(Auth::user()->name); ?>"
                             class="w-48 h-48 sm:w-48 sm:h-48 rounded-full object-cover mb-4">
                        
                        <div class="text-center">
                            <div class="font-bold text-5xl sm:text-5xl mb-2">
                                <?php echo e(Auth::user()->name); ?>

                            </div>

                            <div class="font-bold text-3xl sm:text-3xl mb-2">
                                <?php echo e(Auth::user()->course); ?> <?php echo e(Auth::user()->section); ?><?php echo e(Auth::user()->section1); ?> <?php echo e(Auth::user()->time_preference); ?>

                            </div>
                            
                            <div class="text-base sm:text-xl">
                                <?php echo e(Auth::user()->email); ?>

                            </div>
                            
                            <div class="text-sm sm:text-lg">
                                <?php echo e(Auth::user()->student_id); ?>

                            </div>
                        </div>
                    </div>

                    

                </div>

                <div class="p-6">
                    <?php if(auth()->guard()->check()): ?>
                        <?php
                            $enabledLogin = \App\Models\enable_login::first();
                        ?>
                
                        <?php if($enabledLogin && $enabledLogin->is_enabled == 1): ?>
                            <?php if(Auth::user()->attendances->isEmpty()): ?>
                                <form id="hide_me" method="POST" action="<?php echo e(route('user-attendance.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="bg-blue-500 w-full text-center hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Time-In
                                    </button>
                                </form>
                            <?php endif; ?>
                        <?php endif; ?>
                
                        <?php if(Auth::user()->attendances->isNotEmpty()): ?>
                            <form id="logoutForm" method="POST" action="<?php echo e(route('user-logout-attendance.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <?php if(Auth::user()->canLogout()): ?>
                                    <button type="submit"
                                        class="bg-red-600 w-full text-center hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Time-out
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
<?php /**PATH C:\xampp\htdocs\LARAVEL\ATTENDANCE - Copy\ATTENDANCE\resources\views/dashboard.blade.php ENDPATH**/ ?>