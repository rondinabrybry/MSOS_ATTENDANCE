<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}"> 
    <title>MSOS | Download</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <div class="container mx-auto px-4 py-8">
        <header class="flex flex-col md:flex-row justify-between items-center mb-8">
            <a href="{{ url('/') }}">
            <div class="flex flex-row justify-center content-center text-4xl font-bold mb-4 md:mb-0">
                <img class="w-24" src="{{ asset('logo.png') }}">
                <div class="flex flex-col">
                    <span class="text-yellow-500">MORE<span class="text-black"> MSOS</span></span>
                    <span class="text-black" style="font-size: .70rem; line-height:.5rem;">Multi-functional Student Organizational System</span>
                </div>
            </div>
        </a> 
            <nav class="hidden md:flex space-x-4 text-gray-600 mb-4 md:mb-0">
                <a class="hover:text-black transition duration-300" href="{{ url('/') }}">Home</a>
            </nav>
        </header>
        <main class="flex items-center justify-center" style="margin-top:200px;">
            <div class="flex flex-col md:flex-row justify-center items-center">
                <div class="w-full md:pl-8 text-center md:text-left">
                    <h1 class="text-5xl font-bold text-yellow-500 mb-4">DOWNLOAD OUR APP NOW</h1>
                    <div class="flex flex-col space-y-4 mb-4">
                        <button class="bg-black text-white px-6 py-3 text-5xl rounded-full flex items-center justify-center shadow-lg hover:bg-gray-800 transition duration-300">
                            <i class="fab fa-apple mr-2"></i> iOS
                        </button>
                        <button class="bg-black text-white px-6 py-3 text-5xl rounded-full flex items-center justify-center shadow-lg hover:bg-gray-800 transition duration-300">
                            <i class="fab fa-android mr-2"></i> Android
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>