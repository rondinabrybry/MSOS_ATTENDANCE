<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #333333;
        }
        .text-center {
            text-align: center;
        }
        .my-4 {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
        .my-8 {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        .w-64 {
            width: 16rem;
        }
        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }
        .border-t-1 {
            border-top-width: 1px;
        }
        .font-bold {
            font-weight: bold;
        }
        .font-semibold {
            font-weight: 600;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            font-size: 0.85em;
        }
        th {
            background-color: #f5f5f5;
            text-align: left;
        }
        tr {
            font-size: .90em;
        }
        .logo-text img {
            width: 300px;
            margin-top: -50px;
        }
    </style>
</head>
<body>
    <div class="text-center my-4">
        <div class="text-center my-4">
            <div class="flex logo-text mb-2">
                <img src="<?php echo e($image_src); ?>" alt="Logo">
            </div>
            <p class="text-xl font-semibold">Student Attendance Report</p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Time In</th>
                <th>Time Out</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $student->attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($student->student_id); ?></td>
                        <td><?php echo e($student->name); ?></td>
                        <td><?php echo e($student->course); ?> <?php echo e($student->section); ?> <?php echo e($student->time_preference); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($attendance->logged_in_at)->format('M j, Y - g:i A')); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($attendance->logged_out_at)->format('M j, Y - g:i A')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="text-center my-8">
        <hr class="border-t-1 border-gray-900 w-64 mx-auto my-4">
        <p class="text-sm font-semibold">Class Mayor Name & Signature</p>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\LARAVEL\ATTENDANCE\ATTENDANCE\resources\views/students/pdf.blade.php ENDPATH**/ ?>