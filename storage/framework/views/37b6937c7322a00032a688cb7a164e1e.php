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
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Time-In Attendance
                <?php if(session('timeinerror')): ?>
                            <p class="mb-5 text-lg font-normal text-red-500 dark:text-red-400"><?php echo e(session('timeinerror')); ?></p>
                            <?php endif; ?>
            </h2>
            <div class="ml-4 md:ml-0">
                <button id="logoutButton" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Close this window
                </button>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-4 flex justify-center items-center w-full bg-blue-200 dark:bg-blue-700">
        <div id="currentTime" class="text-7xl font-bold text-gray-900 dark:text-gray-100 tracking-widest"></div>
    </div>

    <div class="py-12 flex space-x-4">
        <div class="w-auto max-w-xs sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <p class="text-xl text-gray-900 dark:text-gray-200">Scan your ID to LOG-IN Attendance.</p>
                    <div class="mt-6">
                        <label for="idNumber" class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                            ID Number
                        </label>
                        <div class="mt-1">
                            <input type="number" name="idNumber" id="idNumber"
                                class="block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <div id="userDetails" class="mt-6 p-4 bg-gray-100 rounded-md hidden flex items-start">
                        <img id="userImage" class="w-96 h-96 rounded-lg object-cover" src="" alt="User Image">
                        <div id="userInfo" class="ml-4">
                            <p id="userName" class="text-8xl font-semibold text-black-900 dark:text-black-200"></p>
                            <p id="userCourse" class="text-5xl text-black-700 dark:text-black-400"></p>
                            <p id="userEmail" class="text-lg text-black-700 dark:text-black-400"></p>

                            <div
                                class="flex flex-col time_box w-full bg-blue-100 p-6 rounded-lg flex justify-center items-center h-48">
                                <p class="text-6xl text-center font-semibold text-blue-800">
                                    <?php echo e($currentDateTime->format('M d Y')); ?>

                                </p>
                                <p id="timein" class="text-8xl text-center font-semibold text-blue-800">
                                    <?php if(session('timeinerror')): ?>
                                        <p class="mb-5 text-lg font-normal text-red-500 dark:text-red-400"><?php echo e(session('timeinerror')); ?></p>
                                    <?php else: ?>
                                        <?php echo e($currentDateTime->format('h:i A')); ?>

                                    <?php endif; ?>
                                </p>
                                
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function updateTimeIn() {
            const currentTimeElement = document.getElementById('timein');
            const now = new Date();
            
            let hours = now.getHours();
            const minutes = String(now.getMinutes()).padStart(2, '0');
            
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? String(hours).padStart(2, '0') : '12';
            
            currentTimeElement.textContent = `${hours}:${minutes} ${ampm}`;
        }
        
            setInterval(updateTimeIn, 1000);
            updateTimeIn();
        
            </script>

    <script>
function updateTime() {
    const currentTimeElement = document.getElementById('currentTime');
    const now = new Date();
    
    let hours = now.getHours();
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    
    const ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? String(hours).padStart(2, '0') : '12';
    
    currentTimeElement.textContent = `${hours}:${minutes}:${seconds} ${ampm}`;
}

setInterval(updateTime, 1000);
updateTime();


function keepFocus() {
    const inputElement = document.getElementById('idNumber');
    if (inputElement) {
        inputElement.focus();
    }
}

setInterval(keepFocus, 100);
document.addEventListener('DOMContentLoaded', keepFocus);

function debounce(func, delay) {
    let timeout;
    return function(...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), delay);
    };
}

let resetTime;

const idNumberInput = document.getElementById('idNumber');
if (idNumberInput) {
    idNumberInput.addEventListener('input', debounce(function() {
        const idNumber = this.value;
        if (idNumber) {
            fetch(`/fetch-user-details/${idNumber}`)
                .then(response => response.json())
                .then(data => {
                    if (data.isLoggedIn) {
                        document.getElementById('alreadyLoggedInMessage').classList.remove('hidden');
                        document.getElementById('userDetails').classList.add('hidden');
                        document.getElementById('studentNotFound').classList.add('hidden');
                        return;
                    }

                    const userImage = data.image ? `/storage/${data.image}` :
                        (data.profile_image && data.profile_image.trim() !== '') ?
                        `/storage/${data.profile_image}` :
                        `/storage/profile_images/default.jpg`;

                    const userImageElement = document.getElementById('userImage');
                    if (userImageElement) {
                        userImageElement.src = userImage;
                        userImageElement.onerror = function() {
                            userImageElement.src = `/storage/profile_images/default.jpg`;
                        };
                    }
                    document.getElementById('userName').textContent = data.name || 'Student Not Found';
                    document.getElementById('userCourse').textContent =
                        `${data.course || ''} ${data.section || ''} ${data.section1 || ''} ${data.time_preference || ''}`;
                    document.getElementById('userEmail').textContent = data.email || 'Not Found';
                    document.getElementById('userDetails').classList.remove('hidden');

                    clearTimeout(resetTime);
                    resetTime = setTimeout(() => {
                        document.getElementById('userDetails').classList.add('hidden');
                    }, 10000);

                    fetch("<?php echo e(route('attendance.store')); ?>", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        },
                        body: JSON.stringify({
                            id: idNumber
                        })
                    });
                    document.getElementById('idNumber').value = '';
                })
                .catch(error => {
                    console.error('Error fetching user details:', error);
                    document.getElementById('userDetails').classList.add('hidden');
                    document.getElementById('studentNotFound').classList.remove('hidden');
                });
        } else {
            document.getElementById('userDetails').classList.add('hidden');
        }
    }, 600));
}


document.getElementById('logoutButton').addEventListener('click', function() {
            fetch("<?php echo e(route('unsetSession')); ?>", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({})
            }).then(() => {
                window.close();
            }).catch((error) => {
                console.error('Error unsetting session:', error);
            });
        });

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
<?php /**PATH C:\xampp\htdocs\LARAVEL\MSOS_ATTENDANCE\resources\views/session-window.blade.php ENDPATH**/ ?>