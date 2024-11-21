<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-500 text-white p-4 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="flex flex-col items-center mb-8">
                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="{{ Auth::user()->name }}"
                             class="w-48 h-48 sm:w-48 sm:h-48 rounded-full object-cover mb-4">
                        
                        <div class="text-center">
                            <div class="font-bold text-5xl sm:text-5xl mb-2">
                                {{ Auth::user()->name }}
                            </div>

                            <div class="font-bold text-3xl sm:text-3xl mb-2">
                                {{ Auth::user()->course }} {{ Auth::user()->section }}{{ Auth::user()->section1 }} {{ Auth::user()->time_preference }}
                            </div>
                            
                            <div class="text-base sm:text-xl">
                                {{ Auth::user()->email }}
                            </div>
                            
                            <div class="text-sm sm:text-lg">
                                {{ Auth::user()->student_id }}
                            </div>
                        </div>
                    </div>

                    

                </div>

                <div class="p-6">
                    @auth
                        @php
                            $enabledLogin = \App\Models\enable_login::first();
                        @endphp
                
                        @if ($enabledLogin && $enabledLogin->is_enabled == 1)
                            @if (Auth::user()->attendances->isEmpty())
                                <form id="hide_me" method="POST" action="{{ route('user-attendance.store') }}">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 w-full text-center hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Time-In
                                    </button>
                                </form>
                            @endif
                        @endif
                
                        @if (Auth::user()->attendances->isNotEmpty())
                            <form id="logoutForm" method="POST" action="{{ route('user-logout-attendance.store') }}">
                                @csrf
                                @if (Auth::user()->canLogout())
                                    <button type="submit"
                                        class="bg-red-600 w-full text-center hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Time-out
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
