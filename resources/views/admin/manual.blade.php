<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Admin
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <p class="text-lg text-gray-900 dark:text-gray-200">Manual Attendance</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">for temporary IDs.</p>

                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="timeInCheckbox" class="mr-2">
                            <span class="text-gray-700 dark:text-gray-400">Time-In</span>
                        </label>
                        <label class="inline-flex items-center ml-4">
                            <input type="checkbox" id="timeOutCheckbox" class="mr-2">
                            <span class="text-gray-700 dark:text-gray-400">Time-Out</span>
                        </label>
                    </div>


                    <div class="time-in hidden">
                        <form method="POST" action="{{ route('attendance.store') }}">
                            @csrf
                            <div class="mb-4">

                                <label for="id" class="block text-gray-700 dark:text-gray-400">Time-In</label>
                                <input type="number" id="id" name="id" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                            </div>
                            <button type="submit"
                                class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                        </form>

                        @if (session('userDetails'))
                            <div id="student-details"
                                class="mt-5 p-4 border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="text-5xl font-semibold text-gray-800 dark:text-gray-100">
                                    {{ session('userDetails')->name }}</h3>
                                <h4 class="text-2xl text-gray-700 dark:text-gray-300">
                                    {{ session('userDetails')->course }}
                                    {{ session('userDetails')->section }}{{ session('userDetails')->section1 }}
                                    {{ session('userDetails')->time_preference }}</h4>

                                @if (session('timeinsuccess'))
                                    <p class="mb-5 text-lg font-normal text-green-500 dark:text-green-400">
                                        {{ session('timeinsuccess') }}
                                    </p>
                                @endif
                                @if (session('timeinerror'))
                                    <p class="mb-5 text-lg font-normal text-red-500 dark:text-red-400">
                                        {{ session('timeinerror') }}
                                    </p>
                                @endif
                            </div>
                        @else
                            <div id="student-details"
                                class="mt-5 p-4 border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="text-5xl font-semibold text-gray-800 dark:text-gray-100">Not found</h3>
                                @if (session('timeinerror'))
                                    <p class="mb-5 text-lg font-normal text-red-500 dark:text-red-400">
                                        {{ session('timeinerror') }}
                                    </p>
                                @endif
                            </div>
                        @endif
                        <script>
                            setTimeout(() => {
                                const studentDetails = document.getElementById('student-details');
                                if (studentDetails) {
                                    studentDetails.style.display = 'none';
                                }
                            }, 5000);
                        </script>
                        <script>
                            function keepFocus() {
                                const inputElement = document.getElementById('id');
                                if (inputElement) {
                                    inputElement.focus();
                                }
                            }
                            setInterval(keepFocus, 100);
                        </script>
                    </div>






                    <div class="time-out hidden">
                        <form method="POST" action="{{ route('logAttendance.store') }}" class="mt-6">
                            @csrf
                            <div class="mb-4">

                                <label for="id1" class="block text-gray-700 dark:text-gray-400">Time-Out</label>
                                <input type="number" id="id1" name="id1" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                            </div>
                            <button type="submit"
                                class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                        </form>

                        @if (session('logoutDetails'))
                            <div id="student-logout"
                                class="mt-5 p-4 border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="text-5xl font-semibold text-gray-800 dark:text-gray-100">
                                    {{ session('logoutDetails')->name }}</h3>
                                <h4 class="text-2xl text-gray-700 dark:text-gray-300">
                                    {{ session('logoutDetails')->course }}
                                    {{ session('logoutDetails')->section }}{{ session('logoutDetails')->section1 }}
                                    {{ session('logoutDetails')->time_preference }}</h4>

                                @if (session('status'))
                                    <p class="mb-5 text-lg font-normal text-green-500 dark:text-green-400">
                                        {{ session('status') }}</p>
                                @endif
                        @else
                            <div id="student-logout"
                                class="mt-5 p-4 border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="text-5xl font-semibold text-gray-800 dark:text-gray-100">Not found</h3>
                                @if (session('status'))
                                    <p class="mb-5 text-lg font-normal text-red-500 dark:text-red-400">
                                        {{ session('status') }}
                                    </p>
                                @endif
                            </div>

                        </div>

                        @endif
                        <script>
                            setTimeout(() => {
                                const studentDetails = document.getElementById('student-logout');
                                if (studentDetails) {
                                    studentDetails.style.display = 'none';
                                }
                            }, 5000);
                        </script>
                        <script>
                            function keepFocus() {
                                const inputElement = document.getElementById('id1');
                                if (inputElement) {
                                    inputElement.focus();
                                }
                            }
                            setInterval(keepFocus, 100);
                        </script>
                    </div>



                    
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const timeInCheckbox = document.getElementById('timeInCheckbox');
                            const timeOutCheckbox = document.getElementById('timeOutCheckbox');
                            const timeInDiv = document.querySelector('.time-in');
                            const timeOutDiv = document.querySelector('.time-out');
                    
                            if (localStorage.getItem('timeInCheckbox') === 'true') {
                                timeInCheckbox.checked = true;
                                timeInDiv.classList.remove('hidden');
                            } else if (localStorage.getItem('timeOutCheckbox') === 'true') {
                                timeOutCheckbox.checked = true;
                                timeOutDiv.classList.remove('hidden');
                            }
                    
                            timeInCheckbox.addEventListener('change', function() {
                                if (this.checked) {
                                    timeOutCheckbox.checked = false;
                                    timeOutDiv.classList.add('hidden');
                                    localStorage.setItem('timeOutCheckbox', false);
                                    localStorage.setItem('timeInCheckbox', true);
                                    timeInDiv.classList.remove('hidden');
                                } else {
                                    localStorage.setItem('timeInCheckbox', false);
                                    timeInDiv.classList.add('hidden');
                                }
                            });
                    
                            timeOutCheckbox.addEventListener('change', function() {
                                if (this.checked) {
                                    timeInCheckbox.checked = false;
                                    timeInDiv.classList.add('hidden');
                                    localStorage.setItem('timeInCheckbox', false);
                                    localStorage.setItem('timeOutCheckbox', true);
                                    timeOutDiv.classList.remove('hidden');
                                } else {
                                    localStorage.setItem('timeOutCheckbox', false);
                                    timeOutDiv.classList.add('hidden');
                                }
                            });
                        });
                    </script>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
