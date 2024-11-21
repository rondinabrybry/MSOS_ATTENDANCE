<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Past Event Attendance Records
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <p class="text-lg text-gray-900 dark:text-gray-200">Display past events attendance by date.</p>

                    
{{-- 

                    <button id="showAttendance">View Attendance</button>
                    <div id="attendanceContainer"></div>
                    
                    <script>
                        document.getElementById('showAttendance').addEventListener('click', function(e) {
                            e.preventDefault();
                            
                            fetch('/attendance-data')
                                .then(response => response.json())
                                .then(data => {
                                    console.log(data); // Debugging line to verify data output
                                    let container = document.getElementById('attendanceContainer');
                                    container.innerHTML = '';
                    
                                    data.forEach(group => {
                                        let groupDiv = document.createElement('div');
                                        groupDiv.innerHTML = `<h3>${group.course} ${group.section} ${group.section1} ${group.time_preference}</h3>`;
                                        
                                        let table = document.createElement('table');
                                        table.innerHTML = `<tr>
                                            <th>Student ID</th><th>Name</th><th>Course</th>
                                            <th>Logged In At</th><th>Logged Out At</th>
                                        </tr>`;
                    
                                        group.records.forEach(record => {
                                            table.innerHTML += `<tr>
                                                <td>${record.student_id}</td><td>${record.name}</td>
                                                <td>${record.course} ${record.section}${record.section1} ${record.time_preference}</td>
                                                <td>${record.logged_in_at}</td><td>${record.logged_out_at}</td>
                                            </tr>`;
                                        });
                    
                                        groupDiv.appendChild(table);
                                        container.appendChild(groupDiv);
                                    });
                                });
                        });
                    </script>
                    
 --}}




                    
                    <div class="pt-6 flex">
                        <div class="w-full mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                                    <form action="" method="GET" class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4 w-full">
                                    <p class="flex items-center">Sort</p>
                                        <div class="flex flex-col lg:flex-row lg:space-x-4 w-full">
                                        
                                            <div class="flex flex-col w-full lg:w-auto">
                                                
                                                <select name="course" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                                    <option value="">Select Course</option>
                                                    <option value="BIT COMPUTER">BIT COMPUTER</option>
                                                    <option value="BIT DRAFTING">BIT DRAFTING</option>
                                                    <option value="BIT ELECTRICAL">BIT ELECTRICAL</option>
                                                    <option value="BIT ELECTRONICS">BIT ELECTRONICS</option>
                                                    <option value="BSIT">BSIT</option>
                                                    <option value="BSMX">BSMX</option>
                                                </select>
                                            </div>
                                            <div class="flex flex-col w-full lg:w-auto">
                                                <select name="section" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                                    <option value="">Select Year</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                    
                                            <div class="flex flex-col w-full lg:w-auto">
                                                <select name="section1" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                                    <option value="">Select Section</option>
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
                    
                                            <div class="flex flex-col w-full lg:w-auto">
                                                <select name="time_preference" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full lg:w-auto">
                                                    <option value="">Select Schedule</option>
                                                    <option value="Day">Day</option>
                                                    <option value="Night">Night</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="flex flex-col w-full lg:flex-row lg:items-center lg:space-x-4">
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full lg:w-auto">
                                                Filter
                                            </button>
                                            <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full lg:w-auto mt-4 lg:mt-0" onclick="window.location='{{ route('admin.history') }}'">
                                                Reset
                                            </button>
                                        </div>
                                    </form>
                    
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- @foreach($attendanceHistory as $date => $attendances)
                        <div x-data="{ open: false }" class="mt-4">
                            <div class="flex">
                            <button @click="open = !open" class="flex-1 w-64 text-left bg-gray-200 dark:bg-gray-700 p-4 rounded-lg focus:outline-none">
                                <span class="text-lg font-semibold text-gray-700 dark:text-gray-300">
                                    {{ $date }} ({{ count($attendances) }} records)
                                </span>
                            </button>
                            <button onclick="printTable('{{ $date }}')" class="flex-none w-14 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded lg:w-auto" style="margin-left:15px;">
                                🖨️ Print    
                            </button>
                        </div>
                            <div x-show="open" class="attendance-history mt-2 p-4 bg-gray-100 dark:bg-gray-600 rounded-lg overflow-x-auto" id="attendance-{{ $date }}">
                                
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-300 dark:bg-gray-800">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">ID</th>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</th>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Course</th>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">In</th>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Out</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach($attendances as $attendance)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">{{ $attendance->student_id }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">{{ $attendance->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">{{ $attendance->course }}&nbsp;&nbsp;{{ $attendance->section }}{{ $attendance->section1 }}&nbsp;&nbsp;{{ $attendance->time_preference }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">@if ($attendance->logged_in_at) {{ \Carbon\Carbon::parse($attendance->logged_in_at)->format('M j, Y - g:i A') }} @endif</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">@if ($attendance->logged_out_at) {{ \Carbon\Carbon::parse($attendance->logged_out_at)->format('M j, Y - g:i A') }} @endif</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
    <script>
        function printTable(date) {
            var content = document.querySelector('#attendance-' + date).innerHTML;
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
    </script> --}}
<br>
@foreach ($attendanceHistory as $date => $courseGroups)
    <div class="mb-6">
        @php
            $formattedDate = \Carbon\Carbon::parse($date)->format('M j, Y');
        @endphp
        
        <button type="button" class="collapsible w-full text-left text-white text-xl bg-gray-200 dark:bg-gray-700 p-4 rounded-lg focus:outline-none">{{ $formattedDate }} ({{ count($courseGroups) }} Sections)</button>

        
        <div class="content" style="display:none;">
            <br>
            @foreach ($courseGroups as $group => $records)
                <div class="mb-6">
                    
                    <button type="button" class="collapsible w-auto text-left text-white text-sm bg-gray-200 dark:bg-gray-900 p-4 rounded-lg focus:outline-none">{{ $group }} ({{ count($records) }} Records)</button>
                    <div class="content" style="display:none;">
                        
                        <button onclick="printGroup('{{ $formattedDate }}', '{{ $group }}')" class="mt-2 mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                            Print {{ $group }} on {{ $formattedDate }}
                        </button>

                        
                        <div id="print-content-{{ $formattedDate }}-{{ $group }}" class="print-content">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 mt-2">
                                <thead class="bg-gray-300 dark:bg-gray-800">
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Student ID</th>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Course</th>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Time-In</th>
                                        <th class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Time-Out</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($records as $record)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">{{ $record->student_id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">{{ $record->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">{{ $record->course }} {{ $record->section }}{{ $record->section1 }} {{ $record->time_preference }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">
                                                <span style="color: {{ $record->logged_in_at ? '' : 'red' }}">
                                                    @if ($record->logged_in_at)
                                                        {{ \Carbon\Carbon::parse($record->logged_in_at)->format('g:i A') }}
                                                    @else
                                                        No record
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">
                                                <span style="color: {{ $record->logged_out_at ? '' : 'red' }}">
                                                    @if ($record->logged_out_at)
                                                        {{ \Carbon\Carbon::parse($record->logged_out_at)->format('g:i A') }}
                                                    @else
                                                        No record
                                                    @endif
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach

<script>
    document.querySelectorAll('.collapsible').forEach(button => {
        button.addEventListener('click', function() {
            this.classList.toggle('active');
            let content = this.nextElementSibling;
            content.style.display = content.style.display === 'block' ? 'none' : 'block';
        });
    });
</script>

<script>
    function printGroup(formattedDate, group) {
        const elementId = `print-content-${formattedDate}-${group}`;
        const printContent = document.getElementById(elementId).innerHTML;

        const printWindow = window.open('', '', 'height=500, width=800');
        printWindow.document.write(`<html><head><title>${group}</title>`);
        printWindow.document.write('<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">');
        printWindow.document.write('</head><body class="bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-100">');

        printWindow.document.write('<div class="text-center my-4">');
        printWindow.document.write('<div class="flex justify-center items-center mb-2">');
        printWindow.document.write('<img class="w-24" src="{{ asset('storage/logo.png') }}" alt="MSOS">');
        printWindow.document.write('<h1 class="text-4xl font-bold ml-4">M-SOS</h1>');
        printWindow.document.write('</div>');
        printWindow.document.write('<p class="text-xs font-semibold">Multi-Functional Student Organizational System</p>');
        printWindow.document.write('<p class="text-xl font-semibold">Student Attendance Report</p>');
        printWindow.document.write(`<p class="text-sm font-semibold my-2">${group}</p>`);
        printWindow.document.write(`<p class="text-lg font-bold my-2">${formattedDate}</p>`);
        printWindow.document.write('</div>');

        printWindow.document.write('<div class="p-4">');
        printWindow.document.write(printContent);
        printWindow.document.write('</div>');

        printWindow.document.write('<div class="text-center my-8">');
        printWindow.document.write('<p class="text-sm text-gray-400">MSOS © {{ date('Y') }}</p>');
        printWindow.document.write('</div>');

        printWindow.document.write('</body></html>');
        printWindow.document.close();

        printWindow.onload = function() {
            printWindow.print();
        };

        printWindow.addEventListener('afterprint', () => {
            printWindow.close();
        });
    }
</script>



</x-app-layout>
