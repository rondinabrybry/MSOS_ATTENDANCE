
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
            <?php echo e(__('Students')); ?>


        </h2>
     <?php $__env->endSlot(); ?>
    
    <?php if(Auth::check() && Auth::user()->isAdmin()): ?>
    <div class="pt-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                <form action="" method="GET" class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4 w-full">
                <p class="flex items-center">Sort</p>
                    <div class="flex flex-col lg:flex-row lg:space-x-4 w-full">
                    
                        <div class="flex flex-col w-full lg:w-auto">
                            <?php
                            $uniqueCourses = $students->pluck('course')->unique();
                        ?>
                            
                            <select name="course" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                <option value="">-- Course --</option>
                                <?php $__currentLoopData = $uniqueCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($course); ?>"><?php echo e($course); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <?php
                            $uniqueSections = $students->pluck('section')->unique();
                        ?>
                        <div class="flex flex-col w-full lg:w-auto">
                            <select name="section" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                <option value="">-- Section --</option>
                                <?php $__currentLoopData = $uniqueSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($section); ?>"><?php echo e($section); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <?php
                            $uniqueSections1 = $students->pluck('section1')->unique();
                        ?>
                        <div class="flex flex-col w-full lg:w-auto">
                            <select name="section1" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                <option value="">-- Section --</option>
                                <?php $__currentLoopData = $uniqueSections1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($section1); ?>"><?php echo e($section1); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>


                        <?php
                            $uniqueTimePreferences = $students->pluck('time_preference')->unique();
                        ?>
                        <div class="flex flex-col w-full lg:w-auto">
                            <select name="time_preference" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                <option value="">-- Time Preference --</option>
                                <?php $__currentLoopData = $uniqueTimePreferences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timePreference): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($timePreference); ?>"><?php echo e($timePreference); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col w-full lg:flex-row lg:items-center lg:space-x-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full lg:w-auto">
                            Filter
                        </button>
                        <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full lg:w-auto mt-4 lg:mt-0" onclick="window.location='<?php echo e(route('students.index')); ?>'">
                            Reset
                        </button>
                    </div>
                </form>

                <div class="flex flex-col w-full lg:flex-row justify-end space-y-4 lg:space-y-0 lg:space-x-4 mt-6">
                    <button onclick="printTable()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full lg:w-auto">
                        🖨️ Print
                    
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function printTable() {
        var content = document.querySelector('.student-tables').innerHTML;
        var printWindow = window.open('', '', 'height=500, width=800');
        printWindow.document.write('<html><head><title>Print Table</title>');
        printWindow.document.write('<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">');
        printWindow.document.write('</head><body class="bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-100">');
        
        printWindow.document.write('<div class="text-center my-4">');
        printWindow.document.write('<div class="flex justify-center items-center mb-2">');
        
        printWindow.document.write('<img class="w-24" src="<?php echo e(asset('storage/logo.png')); ?>" alt="MSOS">');
        
        printWindow.document.write('<h1 class="text-4xl font-bold ml-4">M-SOS</h1>');
        printWindow.document.write('</div>');
        printWindow.document.write('<p class="text-xs font-semibold">Multi-Functional Student Organizational System</p>');
        
        printWindow.document.write('<p class="text-xl font-semibold">Student Attendance Report</p>');
        printWindow.document.write('</div>');
        
        printWindow.document.write('<div class="p-4">');
        printWindow.document.write(content);
        printWindow.document.write('</div>');

        printWindow.document.write('<br><br>');

        printWindow.document.write('<div class="text-center my-8">');
        printWindow.document.write('<hr class="border-t-1 border-gray-900 dark:border-gray-100 w-64 mx-auto my-4">');
        printWindow.document.write('<p class="text-sm font-semibold">Class Mayor Name & Signature</p>');
        printWindow.document.write('</div>');
        
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>





   
    <?php endif; ?>

    <div class="student-tables py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Course
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    In
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Out
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $student->attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">
                                            <?php echo e($student->student_id); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            <?php echo e($student->name); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            <?php echo e($student->course); ?>&nbsp;&nbsp;<?php echo e($student->section); ?><?php echo e($student->section1); ?>&nbsp;&nbsp;<?php echo e($student->time_preference); ?>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            <?php if($attendance->logged_in_at): ?>
                                                <?php echo e(\Carbon\Carbon::parse($attendance->logged_in_at)->format('M j, Y - g:i A')); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            <?php if($attendance->logged_out_at): ?>
                                                <?php echo e(\Carbon\Carbon::parse($attendance->logged_out_at)->format('M j, Y - g:i A')); ?>

                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\LARAVEL\ATTENDANCE - Copy\ATTENDANCE\resources\views/students/index.blade.php ENDPATH**/ ?>