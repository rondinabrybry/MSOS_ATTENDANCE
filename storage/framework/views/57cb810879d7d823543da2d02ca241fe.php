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
            Users
        </h2>
     <?php $__env->endSlot(); ?>
    <style>
        .manual-attendance-button {
            position: fixed;
            bottom: 20px;
            /* Adjusts the distance from the bottom */
            right: 20px;
            /* Adjusts the distance from the right */
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 0.5rem 1rem;
            /* Adjusts padding */
            border-radius: 0.375rem;
            /* Matches Tailwind's rounded-md */
            background-color: #3B82F6;
            /* Tailwind's blue-600 */
            color: white;
            /* Text color */
            font-size: 1rem;
            /* Base font size */
            font-weight: 500;
            /* Font weight */
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            /* Shadow effect */
            transition: background-color 0.2s;
            /* Transition for hover effect */
        }

        .manual-attendance-button:hover {
            background-color: #2563EB;
            /* Tailwind's blue-700 */
        }

        .manual-attendance-button a {
            text-decoration: none;
            /* Removes underline from the link */
            color: inherit;
            /* Inherit text color from the button */
        }
    </style>
    <button type="button" class="manual-attendance-button">
        <a href="<?php echo e(url('/admin/manual')); ?>" class="btn btn-xs btn-info">Manual Attendance</a>
    </button>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <p class="text-lg text-gray-900 dark:text-gray-200 mb-4">Users Pages</p>


                    <form action="" method="GET"
                        class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4 w-full mb-6">
                        <p class="flex items-center text-white">Sort</p>
                        <div class="flex flex-col lg:flex-row lg:space-x-4 w-full">
                            <input type="text" name="student_id" placeholder="ID"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">

                            <div class="flex flex-col w-full lg:w-auto">
                                <select name="course"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                    <option value="">Course</option>
                                    <option value="BIT COMPUTER">BIT COMPUTER</option>
                                    <option value="BIT DRAFTING">BIT DRAFTING</option>
                                    <option value="BIT ELECTRICAL">BIT ELECTRICAL</option>
                                    <option value="BIT ELECTRONICS">BIT ELECTRONICS</option>
                                    <option value="BSIT">BSIT</option>
                                    <option value="BSMX">BSMX</option>
                                </select>
                            </div>

                            <div class="flex flex-col w-full lg:w-auto">
                                <select name="section"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                    <option value="">Year</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>

                            <div class="flex flex-col w-full lg:w-auto">
                                <select name="section1"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                    <option value="">Section</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                    <option value="I">I</option>
                                    <option value="J">J</option>
                                </select>
                            </div>

                            <div class="flex flex-col w-full lg:w-auto">
                                <select name="time_preference"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                    <option value="">Schedule</option>
                                    <option value="Day">Day</option>
                                    <option value="Night">Night</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-col w-full lg:flex-row lg:items-center lg:space-x-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full lg:w-auto">
                                Filter
                            </button>
                            <button type="button"
                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded w-full lg:w-auto mt-4 lg:mt-0"
                                onclick="window.location='<?php echo e(route('admin.users')); ?>'">
                                Reset
                            </button>
                        </div>

                        <button type="button"
                            class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full lg:w-full mt-4 lg:mt-0"
                            onclick="openNewStudentModal()">
                            New Student
                        </button>
                    </form>

                    <div class="overflow-x-auto">
                        <div class="mb-4">
                            <?php echo e($users->links()); ?>

                        </div>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Course & Section
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        User type
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900">
                                        <td class="w-4 p-4">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold text-black dark:text-white">
                                                    <?php echo e($user->student_id); ?></div>
                                                <div class="font-normal text-gray-500"><?php echo e($user->rf_id); ?></div>
                                            </div>
                                        </td>
                                        <th scope="row"
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="w-10 h-10 rounded-full"
                                                src="<?php echo e(asset('storage/' . $user->profile_image)); ?>"
                                                alt="<?php echo e($user->name); ?>">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold"><?php echo e($user->name); ?></div>
                                                <div class="font-normal text-gray-500"><?php echo e($user->email); ?></div>
                                            </div>
                                        </th>
                                        <td class="px-6 py-4">
                                            <?php echo e($user->course); ?> <?php echo e($user->section); ?><?php echo e($user->section1); ?>

                                            <?php echo e($user->time_preference); ?>

                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center uppercase">
                                                <div
                                                    class="h-2.5 w-2.5 rounded-full me-2 
                                                            <?php echo e($user->usertype === 'student' ? 'bg-gray-500' : ''); ?>

                                                            <?php echo e($user->usertype === 'admin' ? 'bg-green-500' : ''); ?>

                                                            <?php echo e($user->usertype === 'super' ? 'bg-yellow-500' : ''); ?>">
                                                </div>
                                                <?php echo e($user->usertype); ?>

                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <button onclick="openModal(<?php echo e($user->id); ?>)"
                                                class="text-white bg-blue-600 rounded-lg px-3 py-1 text-xs dark:hover:text-white">Edit</button>
                                                <?php if(Auth::user()->usertype === 'super'): ?>
                                                    &nbsp;&nbsp;&nbsp;|
                                                    <button onclick="openPromoteModal(<?php echo e($user->id); ?>)" class="text-white bg-green-500 rounded-lg px-3 py-1 text-xs dark:hover:text-white ml-2">Promote</button>
                                                    &nbsp;&nbsp;&nbsp;|
                                                    <button onclick="openDeleteModal(<?php echo e($user->id); ?>)" class="text-white bg-red-600 rounded-lg px-3 py-1 text-xs dark:hover:text-white ml-2">Delete</button>
                                                <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <div class="mt-4">
                            <?php echo e($users->links()); ?>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

    <?php if(Auth::user()->usertype === 'super'): ?>
<!-- Delete Modal -->
        <div id="deleteModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen">
                <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>

                <div class="inline-block align-middle bg-white dark:bg-gray-800 rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <form id="DeleteForm" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200 mb-6" id="modal-title">
                                Delete this user?</h3>
                        </div>
                        <div class="flex mt-5 p-2 gap-2 sm:mt-6">
                            <button type="submit"
                                class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:text-sm">Delete</button>
                            <button type="button" onclick="closeDeleteModal()"
                                class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-700 focus:outline-none sm:text-sm">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endif; ?>



    <!-- edit modal -->
    <div id="editModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen">
            <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>

            <div
                class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="editForm" method="POST" action="<?php echo e(route('users.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="user_id" id="user_id">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200 mb-6 text-center"
                        id="modal-title">Edit User</h3>

                    <div class="flex items-center mb-4">
                        <div class="w-24 h-24 overflow-hidden rounded-full mr-4">
                            <img class="w-full h-full object-cover" src="" id="profile_image"
                                alt="">
                        </div>
                        <div class="flex-1">
                            <label
                                class="block uppercase tracking-wide text-black dark:text-white text-xs font-bold mb-2"
                                for="name">
                                Name
                            </label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Empty" required>
                        </div>
                    </div>


                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full md:w-1/2 px-3">
                            <label
                                class="block uppercase tracking-wide text-black dark:text-white text-xs font-bold mb-2"
                                for="student_id">
                                Student ID
                            </label>
                            <input type="text" name="student_id" id="student_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Enter Student ID"
                                value="<?php echo e(old('student_id', $editUser->student_id ?? '')); ?>" required>


                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label
                                class="block uppercase tracking-wide text-black dark:text-white text-xs font-bold mb-2"
                                for="grid-last-name">
                                RFID
                            </label>
                            <input type="text" name="rf_id" id="rf_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                id="grid-last-name" type="text" placeholder="Empty" required>
                        </div>
                    </div>



                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-2">
                            <label
                                class="block uppercase tracking-wide text-black dark:text-white text-xs font-bold mb-2"
                                for="grid-state">
                                Course
                            </label>
                            <div class="relative">
                                <select name="course" id="course"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    id="grid-state" required>
                                    <option value="">Select Course</option>
                                    <option value="BIT COMPUTER">BIT COMPUTER</option>
                                    <option value="BIT DRAFTING">BIT DRAFTING</option>
                                    <option value="BIT ELECTRICAL">BIT ELECTRICAL</option>
                                    <option value="BIT ELECTRONICS">BIT ELECTRONICS</option>
                                    <option value="BSIT">BSIT</option>
                                    <option value="BSMX">BSMX</option>
                                </select>
                            </div>
                        </div>

                        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-2">
                            <label
                                class="block uppercase tracking-wide text-black dark:text-white text-xs font-bold mb-2"
                                for="grid-state">
                                Year
                            </label>
                            <div class="relative">
                                <select name="section" id="section"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    id="grid-state" required>
                                    <option value="">Select Year</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>

                        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-2">
                            <label
                                class="block uppercase tracking-wide text-black dark:text-white text-xs font-bold mb-2"
                                for="grid-state">
                                Section
                            </label>
                            <div class="relative">
                                <select name="section1" id="section1"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    id="grid-state" required>
                                    <option value="">Select Section</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                    <option value="I">I</option>
                                    <option value="J">J</option>
                                </select>
                            </div>
                        </div>

                        <div class="w-full md:w-full px-3 mb-6 md:mb-2">
                            <label
                                class="block uppercase tracking-wide text-black dark:text-white text-xs font-bold mb-2"
                                for="grid-state">
                                Class Schedule
                            </label>
                            <div class="relative">
                                <select name="time_preference" id="time_preference"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    id="grid-state" required>
                                    <option value="">Select Schedule</option>
                                    <option value="Day">Day</option>
                                    <option value="Night">Night</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="mt-5 sm:mt-6">
                        <button type="submit"
                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:text-sm">Save</button>
                        <button type="button" onclick="closeModal()"
                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-700 focus:outline-none sm:text-sm mt-2">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php if(Auth::user()->usertype === 'super'): ?>
    <!-- promote modal -->
    <div id="promoteModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen">
            <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>

            <div
                class="inline-block align-middle bg-white dark:bg-gray-800 rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="promoteForm" method="POST" action="<?php echo e(route('users.promote')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="user_id" id="promote_user_id">

                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200 mb-6"
                            id="modal-title">
                            Promote User</h3>

                        <select name="usertype" id="usertype"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="admin">Admin</option>
                            <option value="student">Student</option>
                            <option value="super">Super</option>
                        </select>
                    </div>

                    <div class="mt-5 sm:mt-6">
                        <button type="submit"
                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:text-sm">Save</button>
                        <button type="button" onclick="closePromoteModal()"
                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-700 focus:outline-none sm:text-sm mt-2">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- error student id modal -->

    <?php if($errors->has('student_id')): ?>
        <div id="error-modal" tabindex="-1"
            class="overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center">
            <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>

            <div class="relative p-4 w-full max-w-md max-h-full z-10">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button onclick="closeErrorModal()" type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-red-500 dark:text-red-400">
                            <?php echo e($errors->first('student_id')); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <!-- success modal -->
    <?php if(session('success')): ?>
        <div id="error-modal" tabindex="-1"
            class="overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center">
            <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>

            <div class="relative p-4 w-full max-w-md max-h-full z-10">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button onclick="closeErrorModal()" type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-green-500 dark:text-green-400">
                            <?php echo e(session('success')); ?>

                        </h3>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <script>
        function keepFocus() {
            const inputElement = document.getElementById('attendance-input');
            if (inputElement) {
                inputElement.focus();
            }
        }

        setInterval(keepFocus, 100);

        function toggleManualAttendanceForm() {
            const form = document.getElementById('manual-attendance-form');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }

        function closeErrorModal() {
            document.getElementById('error-modal').style.display = 'none';
        }
    </script>


    <!-- error session modal -->
    <?php if(session('error')): ?>
        <div id="error-modal" tabindex="-1"
            class="overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center">
            <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>

            <div class="relative p-4 w-full max-w-md max-h-full z-10">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button onclick="closeErrorModal()" type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-red-500 dark:text-red-400">
                            <?php echo e(session('error')); ?>

                        </h3>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <!-- error modal -->
    <?php if($errors->any()): ?>
        <div id="error-modal" tabindex="-1"
            class="overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center">
            <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>

            <div class="relative p-4 w-full max-w-md max-h-full z-10">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button onclick="closeErrorModal()" type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-red-500 dark:text-red-400">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($error); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <script>
        function openModal(userId) {
            fetch(`/admin/users/${userId}/edit`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    document.getElementById('user_id').value = data.id;
                    document.getElementById('profile_image').src = `<?php echo e(asset('storage/')); ?>/${data.profile_image}`;
                    document.getElementById('rf_id').value = data.rf_id;
                    document.getElementById('student_id').value = data.student_id;
                    document.getElementById('name').value = data.name;
                    document.getElementById('course').value = data.course;
                    document.getElementById('section').value = data.section;
                    document.getElementById('section1').value = data.section1;
                    document.getElementById('time_preference').value = data.time_preference;
                    document.getElementById('editModal').classList.remove('hidden');
                });
        }

        function openPromoteModal(userId) {
            fetch(`/admin/users/${userId}/promote`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('promote_user_id').value = data.id;
                    document.getElementById('usertype').value = data.usertype;
                    document.getElementById('promoteModal').classList.remove('hidden');
                });
        }

        function openNewStudentModal() {
            document.getElementById('newStudentModal').classList.remove('hidden');
        }

        function openDeleteModal(userId) {
            const form = document.getElementById('DeleteForm');
            form.action = `/admin/users/${userId}/delete`; // Dynamically set the form action
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }


        function closeNewStudentModal() {
            document.getElementById('newStudentModal').classList.add('hidden');

        }

        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');

        }

        function closePromoteModal() {
            document.getElementById('promoteModal').classList.add('hidden');
        }

        function closeErrorModal() {
            document.getElementById('error-modal').classList.add('hidden');
        }
    </script>


    <!-- modal for new student -->
    <div id="newStudentModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen">
            <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>

            <div
                class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="editForm" method="POST" action="<?php echo e(route('users.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="user_id" id="user_id">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200 mb-6 text-center"
                        id="modal-title">Edit User</h3>

                    <div class="flex items-center mb-4">
                        <div class="w-24 h-24 overflow-hidden rounded-full mr-4">
                            <img class="w-full h-full object-cover"
                                src="<?php echo e(asset('storage/profile_images/default.jpg  ')); ?>" id="profile_image"
                                alt="">
                        </div>
                        <div class="flex-1">
                            <label
                                class="block uppercase tracking-wide text-black dark:text-white text-xs font-bold mb-2"
                                for="name">
                                Name
                            </label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Empty" required>
                        </div>
                    </div>

                    <label class="block uppercase tracking-wide text-black dark:text-white text-xs font-bold mb-2"
                        for="email">
                        Email
                    </label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Empty" required>

                    <div class="flex flex-wrap -mx-3 mb-3 mt-3">
                        <div class="w-full md:w-1/2 px-3">
                            <label
                                class="block uppercase tracking-wide text-black dark:text-white text-xs font-bold mb-2"
                                for="student_id">
                                Student ID
                            </label>
                            <input type="text" name="student_id" id="student_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Enter Student ID" required>


                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label
                                class="block uppercase tracking-wide text-black dark:text-white text-xs font-bold mb-2"
                                for="grid-last-name">
                                RFID
                            </label>
                            <input type="text" name="rf_id" id="rf_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                id="grid-last-name" type="text" placeholder="Empty" required>
                        </div>
                    </div>



                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-2">
                            <label
                                class="block uppercase tracking-wide text-black dark:text-white text-xs font-bold mb-2"
                                for="grid-state">
                                Course
                            </label>
                            <div class="relative">
                                <select name="course" id="course"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    id="grid-state" required>
                                    <option value="">Course</option>
                                    <option value="BIT COMPUTER">BIT COMPUTER</option>
                                    <option value="BIT DRAFTING">BIT DRAFTING</option>
                                    <option value="BIT ELECTRICAL">BIT ELECTRICAL</option>
                                    <option value="BIT ELECTRONICS">BIT ELECTRONICS</option>
                                    <option value="BSIT">BSIT</option>
                                    <option value="BSMX">BSMX</option>
                                </select>
                            </div>
                        </div>

                        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-2">
                            <label
                                class="block uppercase tracking-wide text-black dark:text-white text-xs font-bold mb-2"
                                for="grid-state">
                                Year
                            </label>
                            <div class="relative">
                                <select name="section" id="section"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    id="grid-state" required>
                                    <option value="">Year</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>

                        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-2">
                            <label
                                class="block uppercase tracking-wide text-black dark:text-white text-xs font-bold mb-2"
                                for="grid-state">
                                Section
                            </label>
                            <div class="relative">
                                <select name="section1" id="section1"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    id="grid-state" required>
                                    <option value="">Section</option>
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
                        </div>

                        <div class="w-full md:w-full px-3 mb-6 md:mb-2">
                            <label
                                class="block uppercase tracking-wide text-black dark:text-white text-xs font-bold mb-2"
                                for="grid-state">
                                Class Schedule
                            </label>
                            <div class="relative">
                                <select name="time_preference" id="time_preference"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    id="grid-state" required>
                                    <option value="">Schedule</option>
                                    <option value="Day">Day</option>
                                    <option value="Night">Night</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="mt-5 sm:mt-6">
                        <button type="submit"
                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:text-sm">Save</button>
                        <button type="button" onclick="closeNewStudentModal()"
                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-700 focus:outline-none sm:text-sm mt-2">Cancel</button>
                    </div>
                </form>
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
<?php /**PATH C:\xampp\htdocs\LARAVEL\MSOS_ATTENDANCE\resources\views/admin/users.blade.php ENDPATH**/ ?>