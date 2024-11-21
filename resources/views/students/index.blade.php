
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Students') }}

        </h2>
    </x-slot>
    
    @if (Auth::check() && Auth::user()->isAdmin())
    <div class="pt-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                <form action="" method="GET" class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4 w-full">
                <p class="flex items-center">Sort</p>
                    <div class="flex flex-col lg:flex-row lg:space-x-4 w-full">
                    
                        <div class="flex flex-col w-full lg:w-auto">
                            @php
                            $uniqueCourses = $students->pluck('course')->unique();
                        @endphp
                            
                            <select name="course" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                <option value="">-- Course --</option>
                                @foreach ($uniqueCourses as $course)
                                    <option value="{{ $course }}">{{ $course }}</option>
                                @endforeach
                            </select>
                        </div>
                        @php
                            $uniqueSections = $students->pluck('section')->unique();
                        @endphp
                        <div class="flex flex-col w-full lg:w-auto">
                            <select name="section" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                <option value="">-- Section --</option>
                                @foreach ($uniqueSections as $section)
                                    <option value="{{ $section }}">{{ $section }}</option>
                                @endforeach
                            </select>
                        </div>

                        @php
                            $uniqueSections1 = $students->pluck('section1')->unique();
                        @endphp
                        <div class="flex flex-col w-full lg:w-auto">
                            <select name="section1" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                <option value="">-- Section --</option>
                                @foreach ($uniqueSections1 as $section1)
                                    <option value="{{ $section1 }}">{{ $section1 }}</option>
                                @endforeach
                            </select>
                        </div>


                        @php
                            $uniqueTimePreferences = $students->pluck('time_preference')->unique();
                        @endphp
                        <div class="flex flex-col w-full lg:w-auto">
                            <select name="time_preference" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                <option value="">-- Time Preference --</option>
                                @foreach ($uniqueTimePreferences as $timePreference)
                                    <option value="{{ $timePreference }}">{{ $timePreference }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col w-full lg:flex-row lg:items-center lg:space-x-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full lg:w-auto">
                            Filter
                        </button>
                        <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full lg:w-auto mt-4 lg:mt-0" onclick="window.location='{{ route('students.index') }}'">
                            Reset
                        </button>
                    </div>
                </form>

                <div class="flex flex-col w-full lg:flex-row justify-end space-y-4 lg:space-y-0 lg:space-x-4 mt-6">
                    <button onclick="printTable()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full lg:w-auto">
                        🖨️ Print
                    {{-- </button>
                    <button onclick="window.location='{{ route('students.exportPdf') }}'" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full lg:w-auto">
                        📄 PDF
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function printTable() {
        var content = document.querySelector('.student-tables').innerHTML;
        var printWindow = window.open('', '', 'height=500, width=800');
        printWindow.document.write('<html><head><title>Print Table</title>');
        printWindow.document.write('<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">');
        printWindow.document.write('</head><body class="bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-100">');
        
        printWindow.document.write('<div class="text-center my-4">');
        printWindow.document.write('<div class="flex justify-center items-center mb-2">');
        
        printWindow.document.write('<img class="w-24" src="{{ asset('storage/logo.png') }}" alt="MSOS">');
        
        printWindow.document.write('<h1 class="text-4xl font-bold ml-4">M-SOS</h1>');
        printWindow.document.write('</div>');
        printWindow.document.write('<p class="text-xs font-semibold">Multi-Functional Student Organizational System</p>');
        
        printWindow.document.write('<p class="text-xl font-semibold">Student Attendance Report</p>');
        printWindow.document.write('</div>');
        
        printWindow.document.write('<div class="p-4">');
        printWindow.document.write(content);
        printWindow.document.write('</div>');

        printWindow.document.write('<br><br>');

        printWindow.document.write('<div class="text-center my-8">');
        printWindow.document.write('<hr class="border-t-1 border-gray-900 dark:border-gray-100 w-64 mx-auto my-4">');
        printWindow.document.write('<p class="text-sm font-semibold">Class Mayor Name & Signature</p>');
        printWindow.document.write('</div>');
        
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>





   
    @endif

    <div class="student-tables py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Course
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    In
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Out
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($students as $student)
                                @foreach ($student->attendances as $attendance)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">
                                            {{ $student->student_id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            {{ $student->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            {{ $student->course }}&nbsp;&nbsp;{{ $student->section }}{{ $student->section1 }}&nbsp;&nbsp;{{ $student->time_preference }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            @if ($attendance->logged_in_at)
                                                {{ \Carbon\Carbon::parse($attendance->logged_in_at)->format('M j, Y - g:i A') }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            @if ($attendance->logged_out_at)
                                                {{ \Carbon\Carbon::parse($attendance->logged_out_at)->format('M j, Y - g:i A') }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>