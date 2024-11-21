<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-12">

        <div class="max-w-7xl p-12 mx-auto">
        <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover w-1/2 rounded-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h1 class="mb-2 text-6xl font-bold tracking-tight text-gray-900 dark:text-white">{{ Auth::user()->name }}</h1>
                <p class="mb-3 text-5xl font-normal text-gray-700 dark:text-gray-400">{{ Auth::user()->course }} {{ Auth::user()->section }}{{ Auth::user()->section1 }} {{ Auth::user()->time_preference }}</p>
                <p class="mb-3 text-2xl font-normal text-gray-700 dark:text-gray-400">{{ Auth::user()->email }}</p>
                <p class="mb-3 text-7xl font-normal text-gray-700 dark:text-gray-400">{{ Auth::user()->student_id }}</p>
            </div>
        </div>



            <!-- Button Section -->
            <div class="mt-8">
                @auth
                    @php
                        $enabledLogin = \App\Models\enable_login::first();
                    @endphp

                    @if ($enabledLogin && $enabledLogin->is_enabled == 1)
                        @if (Auth::user()->attendances->isEmpty())
                            <form method="POST" action="{{ route('user-attendance.store') }}">
                                @csrf
                                <button type="submit" 
                                        class="bg-blue-500 w-full text-center hover:bg-blue-700 text-white font-bold text-xl py-3 px-6 rounded">
                                    Time-In
                                </button>
                            </form>
                        @endif
                    @endif

                    @if (Auth::user()->attendances->isNotEmpty())
                        <form method="POST" action="{{ route('user-logout-attendance.store') }}">
                            @csrf
                            @if (Auth::user()->canLogout())
                                <button type="submit"
                                        class="bg-red-600 w-full text-center hover:bg-red-700 text-white font-bold text-xl py-3 px-6 rounded">
                                    Time-Out
                                </button>
                            @endif
                        </form>
                    @endif
                @endauth
            </div>
        </div> 

                @php
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
                @endphp
                @if (count($incompleteFields) > 0)
                    <div id="incompleteProfileModal"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-auto">
                            <h2 class="text-xl font-semibold text-gray-800">Complete Your Student Profile</h2>
                            <p class="mb-4 text-gray-600">Please complete the following fields:</p>
                            <ul class="list-disc list-inside text-gray-600 mb-4">
                                @foreach ($incompleteFields as $field)
                                    <li>{{ $field }}</li>
                                @endforeach
                            </ul>
                            <button onclick="window.location='{{ url('profile') }}'" id="closeModalButton"
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
                @endif
            </div>
        </div> 
    </div>
</x-app-layout>
