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
                    <p class="text-lg text-gray-900 dark:text-gray-200">Log-out Button Master Switch.</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Allows the student to Log-out after the event.</p>
                    <form method="POST" action="{{ route('admin.toggleLoggedIn') }}">
                        @csrf
                        <button type="submit"
                        class="{{ $setting->is_logged_in ? 'bg-blue-500 hover:bg-blue-700' : 'bg-red-600 hover:bg-red-700' }} text-white font-bold py-2 px-4 rounded mt-4">
                        {{ $setting->is_logged_in ? 'Time-out DISPLAYED 🔓' : 'Time-out HIDDEN 🔒' }}
                    </button>
                    
                    </form>
                    <form action="{{ route('update.boolean', $timein->id) }}" method="POST">
                        @csrf
                        <button type="submit" 
                        class="{{ $timein->is_enabled ? 'bg-blue-500 hover:bg-blue-700' : 'bg-red-600 hover:bg-red-700' }} text-white font-bold py-2 px-4 rounded mt-4">
                            {{ $timein->is_enabled ? 'Time-IN DISPLAYED 🔓' : 'Time-IN HIDDEN 🔒' }}
                        </button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>


    <div class="pt-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <p class="text-lg text-gray-900 dark:text-gray-200">Barcode Scanning Attendance</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Scan barcode from ID to Log-in or Log-out.</p>

                    <div class="flex">
                        <div class="mt-4 mr-4">
                            <button id="openQRButton" type="button" data-route="{{ route('createSession') }}" data-csrf="{{ csrf_token() }}"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Open Barcode Scan Login
                            </button>
                        </div>

                        <div class="mt-4">
                            <button id="openQRLogout" type="button" data-route="{{ route('createSessionLogout') }}" data-csrf="{{ csrf_token() }}"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Open Barcode Scan Logout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </x-app-layout>