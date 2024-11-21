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
            Past Event Attendance Records
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <p class="text-lg text-gray-900 dark:text-gray-200">Display past events attendance by date.</p>

                    





                    
                    <div class="pt-6 flex">
                        <div class="w-full mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                                    <form action="" method="GET" class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4 w-full">
                                    <p class="flex items-center">Sort</p>
                                        <div class="flex flex-col lg:flex-row lg:space-x-4 w-full">
                                        
                                            <div class="flex flex-col w-full lg:w-auto">
                                                
                                                <select name="course" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                                    <option value="">Select Course</option>
                                                    <option value="BIT COMPUTER">BIT COMPUTER</option>
                                                    <option value="BIT DRAFTING">BIT DRAFTING</option>
                                                    <option value="BIT ELECTRICAL">BIT ELECTRICAL</option>
                                                    <option value="BIT ELECTRONICS">BIT ELECTRONICS</option>
                                                    <option value="BSIT">BSIT</option>
                                                    <option value="BSMX">BSMX</option>
                                                </select>
                                            </div>
                                            <div class="flex flex-col w-full lg:w-auto">
                                                <select name="section" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                                    <option value="">Select Year</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                    
                                            <div class="flex flex-col w-full lg:w-auto">
                                                <select name="section1" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                                    <option value="">Select Section</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                    <option value="E">E</option>
                                                    <option value="F">F</option>
                                                    <option value="G">G</option>
                                                    <option value="G">H</option>
                                                    <option value="G">I</option>
                                                    <option value="G">J</option>
                                                </select>
                                            </div>
                    
                                            <div class="flex flex-col w-full lg:w-auto">
                                                <select name="time_preference" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                                    <option value="">Select Schedule</option>
                                                    <option value="Day">Day</option>
                                                    <option value="Night">Night</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="flex flex-col w-full lg:flex-row lg:items-center lg:space-x-4">
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full lg:w-auto">
                                                Filter
                                            </button>
                                            <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full lg:w-auto mt-4 lg:mt-0" onclick="window.location='<?php echo e(route('admin.history')); ?>'">
                                                Reset
                                            </button>
                                        </div>
                                    </form>
                    
                                </div>
                            </div>
                        </div>
                    </div>

                    
<br>
<?php $__currentLoopData = $attendanceHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $courseGroups): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="mb-6">
        <?php
            $formattedDate = \Carbon\Carbon::parse($date)->format('M j, Y');
        ?>
        
        <button type="button" class="collapsible w-full text-left text-white text-xl bg-gray-200 dark:bg-gray-700 p-4 rounded-lg focus:outline-none"><?php echo e($formattedDate); ?> (<?php echo e(count($courseGroups)); ?> Sections)</button>

        
        <div class="content" style="display:none;">
            <br>
            <?php $__currentLoopData = $courseGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $records): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-6">
                    
                    <button type="button" class="collapsible w-auto text-left text-white text-sm bg-gray-200 dark:bg-gray-900 p-4 rounded-lg focus:outline-none"><?php echo e($group); ?> (<?php echo e(count($records)); ?> Records)</button>
                    <div class="content" style="display:none;">
                        
                        <button onclick="printGroup('<?php echo e($formattedDate); ?>', '<?php echo e($group); ?>')" class="mt-2 mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                            Print <?php echo e($group); ?> on <?php echo e($formattedDate); ?>

                        </button>

                        
                        <div id="print-content-<?php echo e($formattedDate); ?>-<?php echo e($group); ?>" class="print-content">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 mt-2">
                                <thead class="bg-gray-300 dark:bg-gray-800">
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Student ID</th>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Course</th>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Time-In</th>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Time-Out</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200"><?php echo e($record->student_id); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200"><?php echo e($record->name); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200"><?php echo e($record->course); ?> <?php echo e($record->section); ?><?php echo e($record->section1); ?> <?php echo e($record->time_preference); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">
                                                <span style="color: <?php echo e($record->logged_in_at ? '' : 'red'); ?>">
                                                    <?php if($record->logged_in_at): ?>
                                                        <?php echo e(\Carbon\Carbon::parse($record->logged_in_at)->format('g:i A')); ?>

                                                    <?php else: ?>
                                                        No record
                                                    <?php endif; ?>
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">
                                                <span style="color: <?php echo e($record->logged_out_at ? '' : 'red'); ?>">
                                                    <?php if($record->logged_out_at): ?>
                                                        <?php echo e(\Carbon\Carbon::parse($record->logged_out_at)->format('g:i A')); ?>

                                                    <?php else: ?>
                                                        No record
                                                    <?php endif; ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>
    document.querySelectorAll('.collapsible').forEach(button => {
        button.addEventListener('click', function() {
            this.classList.toggle('active');
            let content = this.nextElementSibling;
            content.style.display = content.style.display === 'block' ? 'none' : 'block';
        });
    });
</script>

<script>
    function printGroup(formattedDate, group) {
        const elementId = `print-content-${formattedDate}-${group}`;
        const printContent = document.getElementById(elementId).innerHTML;

        const printWindow = window.open('', '', 'height=500, width=800');
        printWindow.document.write(`<html><head><title>${group}</title>`);
        printWindow.document.write('<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">');
        printWindow.document.write('</head><body class="bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-100">');

        printWindow.document.write('<div class="text-center my-4">');
        printWindow.document.write('<div class="flex justify-center items-center mb-2">');
        printWindow.document.write('<img class="w-24" src="<?php echo e(asset('storage/logo.png')); ?>" alt="MSOS">');
        printWindow.document.write('<h1 class="text-4xl font-bold ml-4">M-SOS</h1>');
        printWindow.document.write('</div>');
        printWindow.document.write('<p class="text-xs font-semibold">Multi-Functional Student Organizational System</p>');
        printWindow.document.write('<p class="text-xl font-semibold">Student Attendance Report</p>');
        printWindow.document.write(`<p class="text-sm font-semibold my-2">${group}</p>`);
        printWindow.document.write(`<p class="text-lg font-bold my-2">${formattedDate}</p>`);
        printWindow.document.write('</div>');

        printWindow.document.write('<div class="p-4">');
        printWindow.document.write(printContent);
        printWindow.document.write('</div>');

        printWindow.document.write('<div class="text-center my-8">');
        printWindow.document.write('<p class="text-sm text-gray-400">MSOS © <?php echo e(date('Y')); ?></p>');
        printWindow.document.write('</div>');

        printWindow.document.write('</body></html>');
        printWindow.document.close();

        printWindow.onload = function() {
            printWindow.print();
        };

        printWindow.addEventListener('afterprint', () => {
            printWindow.close();
        });
    }
</script>



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
<?php /**PATH C:\xampp\htdocs\LARAVEL\MSOS_ATTENDANCE\resources\views/admin/attendance_history.blade.php ENDPATH**/ ?>