<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card Container -->
            <div class="bg-gray-800 text-white shadow-md rounded-lg p-8 flex flex-row sm:flex-row items-center sm:items-start">
                <!-- Profile Image -->
                <div class="flex-shrink-0 sm:mb-0 sm:mr-8">
                    <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" 
                         alt="{{ Auth::user()->name }}" 
                         class="rounded-lg object-cover shadow-md" style="width: 300px;">
                </div>

                <!-- User Details -->
                <div style="line-height: 1.2;">
                    <h1 class="font-bold ml-2" style="font-size:70px;">{{ Auth::user()->name }}</h1>
                    <p class="ml-2" style="font-size:50px;">
                        {{ Auth::user()->course }} {{ Auth::user()->section }}{{ Auth::user()->section1 }} {{ Auth::user()->time_preference }}
                    </p>
                    <p class="ml-2" style="font-size:20px;">{{ Auth::user()->email }}</p>
                    <p class="ml-2" style="font-size:100px;">{{ Auth::user()->student_id }}</p>
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
