<!-- resources/views/restricted.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Phase Closed</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-md rounded-lg p-8 max-w-lg text-center">
        <!-- Main Heading -->
        <h1 class="text-2xl font-bold text-red-600 mb-4">The Registration Phase is Closed</h1>
        
        <!-- Message for Registered Students -->
        <p class="text-gray-700 mb-4">
            If you have registered, please ensure that your profile contains your <strong>real name</strong>. Incorrect or incomplete names may result in you being marked as <strong>absent</strong> and possibly sanctioned with <strong>community service</strong>.
        </p>

        <!-- Profile Update Instruction -->
        <p class="text-gray-900 text-sm italic font-semibold mb-4">
            If your name is incorrect, you can update your profile on-site by following the instructions provided.
        </p>

        <!-- Registration for Non-Registered Students -->
        <p class="text-gray-700 font-bold mb-4">
            If you did not register online, you can still register on-site at the TGO office. Please follow the provided instructions.
        </p>
        <p class="text-xs">MSOS © <?php echo e(date('Y')); ?></p>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\LARAVEL\ATTENDANCE\resources\views/restricted.blade.php ENDPATH**/ ?>