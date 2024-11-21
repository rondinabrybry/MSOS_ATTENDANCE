<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo e(asset('favicon.png')); ?>"> 
    <title>Welcome to MSOS!</title>
    <script src="https://cdn.tailwindcss.com">
  </script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }

        ul {
            list-style-type: none;
        }

        /* Global Styles */
        body {
            background-color: #6d6d6d;
            font-family: sans-serif;
            line-height: 1.5;
            letter-spacing: 0.02em;
            overflow-x: hidden;
        }

        /* Header Section */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(38, 50, 56, 0.5);
            color: white;
            padding: 1rem;
            z-index: 10;
            transition: all 0.5s ease-in-out;
        }

        header.fixed-to-top {
            background: rgba(38, 50, 56, 1);
        }

        .wrapHead {
            width: 90%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.5s ease-in-out;
        }

        .wrapHead.fixed-to-top {
            width: 96%;
        }

        nav ul {
            display: flex;
            gap: 1rem;
        }

        nav li {
            display: inline-block;
        }

        nav li a {
            padding: 0.5rem 0;
            text-decoration: none;
            color: #e1e1e1;
            transition: all 0.5s ease-in-out;
        }

        nav li a:hover {
            color: white;
        }

        .brand-logo {
            width: 70px;
        }

        nav .alter{
            display: none;
        }

        @media (max-width: 1001px) {
            nav .navs {
                display: none;
            }
            nav .alter {
                display: block;
            }
        }
        /* Hero Section */
        .hero {
            height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .hero-header {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .logo {
            width: auto;
            height: 16rem;
            object-fit: cover;
            margin-right: 1.5rem;
            margin-bottom: 1rem;
        }

        .hero-title {
            font-size: 5rem;
            font-weight: bold;
            color: white;
            margin-top: 1rem;
        }

        .hero-text {
            color: white;
            margin-top: 1.5rem;
            text-align: center;
        }

        .sub-title {
            font-size: 2.25rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .description {
            font-size: 1.125rem;
            margin-bottom: 2rem;
        }

        .scroll-button {
            background-color: #2563EB;
            padding: 0.75rem 1.5rem;
            font-size: 1.125rem;
            border-radius: 0.375rem;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s;
        }

        .scroll-button:hover {
            background-color: #1D4ED8;
        }

        /* Section Styles */
        .section {
            scroll-snap-align: start;
            height: 100vh;
        }

        .snap {
            height: 100vh;
            overflow-y: scroll;
            scroll-snap-type: y mandatory;
            scroll-behavior: smooth;
        }

        .stay-tuned {
            margin-top: 90px;
        }

        /* Hover Effect for Grow */
        .hover-grow {
            transition: transform 0.3s ease-in-out;
        }

        .hover-grow:hover {
            transform: scale(1.3);
        }

        /* Features Section */
        .features-section {
            height: 100vh; /* Ensure the section takes full viewport height */
            background-color: #798f72;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem 0;
            overflow: hidden; /* Prevent overflow */
        }

        .features-section .container {
            width: 100%;
            max-width: 1200px;
            color: white;
            padding: 0 1rem; /* Add some padding to prevent edge touch */
        }

        .features-section h3 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 2rem;
        }

        .features-section .flex {
            display: flex;
            gap: 2rem;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap; /* Allow the items to wrap on smaller screens */
            width: 100%; /* Ensure the flex container takes up full width */
        }

        .feature-item {
            width: 30%; /* Default width for large screens */
            padding: 1rem;
            text-align: center;
            transition: transform 0.3s ease-in-out;
            box-sizing: border-box; /* Ensure padding doesn't add extra width */
        }

        .feature-item img {
            width: 100%;
            margin-bottom: 1rem;
        }

        .feature-item h4 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .feature-item p {
            color: #ffffff;
        }

        .stay-tuned {
            font-size: 1rem;
            font-weight: bold;
            margin-top: 3rem;
        }

        /* Media Queries */
        @media (max-width: 672px) {
            .features-section .flex {
                flex-direction: column; /* Stack items vertically on smaller screens */
                gap: 1px; /* Adjust gap between items */
            }

            .feature-item {
                width: 70%; /* Full width on smaller screens */
            }
            
            .feature-item p {
                display: none;
            }

            #features .container .explore {
                display: none;
            }

            .stay-tuned {
                margin-top: 3px;
            }
        }



        /* Testimonials Section */
        .testimonials-section {
            height: 100vh;
            background-color: #edf2f7;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem 0;
        }

        .testimonials-section .container {
            width: 100%;
            max-width: 1200px;
        }

        .testimonials-section h3 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 2rem;
        }

        .testimonial-item {
            margin-bottom: 2rem;
            padding: 1rem;
            background-color: white;
            border-radius: 0.375rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .testimonial-item p {
            font-style: italic;
            color: #4a5568;
            margin-bottom: 1rem;
        }

        .testimonial-item p:last-child {
            font-weight: bold;
            color: #2d3748;
        }

        /* Call to Action Section */
        .cta-section {
        height: 100vh;
        background-color: #2b6cb0;
        color: white;
        display: flex;
        flex-direction: column; /* Allow vertical stacking */
        justify-content: center; /* Center content vertically */
        align-items: center; /* Center content horizontally */
        text-align: center;
        padding: 2rem 0;
    }

        .cta-section h3 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .cta-section p {
            margin-bottom: 1.5rem;
        }

        .cta-button {
            background-color: white;
            color: #2b6cb0;
            padding: 1rem 2rem;
            border-radius: 0.375rem;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            background-color: #edf2f7;
        }

        .download-section {
            margin-top: auto; /* Pushes the download section to the bottom */
            padding-top: 2rem; /* Optional: adds some space above the download section */
        }

        .download-section h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .download-buttons img {
            width: 700px;
            padding: 10px
        }

        /* Footer */
        footer {
            background-color: #2d3748;
            color: white;
            text-align: center;
            padding: 1rem;
        }

        /* Media Queries */
        @media (max-width: 640px) {
            .hero-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .logo {
                height: 12rem;
                margin-right: 0;
            }

            .hero-title {
                display: none;
            }

            .sub-title {
                font-size: 1.75rem;
            }

            .description {
                font-size: 1rem;
            }

            .scroll-button {
                padding: 0.5rem 1rem;
                font-size: 1rem;
            }
        }

        @media (min-width: 641px) and (max-width: 1024px) {
            .hero-header {
                flex-direction: row;
                justify-content: center;
            }

            .logo {
                height: 14rem;
            }

            .hero-title {
                font-size: 4rem;
            }

            .sub-title {
                font-size: 2rem;
            }

            .description {
                font-size: 1.125rem;
            }

            .scroll-button {
                padding: 0.75rem 1.5rem;
                font-size: 1.125rem;
            }
        }

        @media (min-width: 1025px) {
            .hero-header {
                flex-direction: row;
                justify-content: center;
            }

            .logo {
                height: 16rem;
            }

            .hero-title {
                font-size: 5rem;
            }

            .sub-title {
                font-size: 2.25rem;
            }

            .description {
                font-size: 1.125rem;
            }

            .scroll-button {
                padding: 0.75rem 1.5rem;
                font-size: 1.125rem;
            }
        }

        span{
            color: rgb(207, 55, 55);
        }
    </style>
</head>
<body>
    <header>
        <div class="wrapHead">
            <img src="<?php echo e(asset('public/storage/logo.png')); ?>" alt="MSOS" class="brand-logo">
            <nav>
                <ul>
                    <li class="navs"><a href="#hero" class="scroll">Home</a></li>
                    <li class="navs"><a href="#features" class="scroll">Features</a></li>
                    <li class="navs"><a href="#testimonials" class="scroll">Developers</a></li>
                    <li class="navs"><a href="#cta" class="scroll">Get Started</a></li>
                    <li class="alter"><a href="" class="scroll">MSOS</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="snap">
        <!-- Hero Section -->
        <section id="hero" class="section hero" style="background-image: url('<?php echo e(asset('images/bg.png')); ?>'); background-size: cover; background-position: center;">
            <div class="adjust">
                <div class="hero-header">
                    <img src="<?php echo e(asset('storage/logo.png')); ?>" alt="MSOS" class="logo">
                    <h1 class="hero-title">MSOS</h1>
                </div>
        
                <div class="hero-text p-5">
                    <h2 class="sub-title"><span>M</span>ulti-functional <span>S</span>tudent <span>O</span>rganizational <span>S</span>ystem</h2>
                    <p class="description">A Crucial Solution for Student Management</p>
                    <a href="#features" class="scroll scroll-button">Get Started</a>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="section features-section" style="background-image: url('<?php echo e(asset('images/bg.png')); ?>'); background-size: cover; background-position: center;">
            <div class="container">
                <h3 class="explore">Explore More!</h3>
                <div class="flex">
                        <div class="feature-item hover-grow">
                            <a href="<?php echo e(url('/')); ?>" target="_blank">
                                <img src="<?php echo e(asset('images/attendance.png')); ?>" alt="Attendance">
                            </a>
                            <h4>Attendance System</h4>
                            <p>Streamlined and efficient way to manage attendance.</p>
                        </div>
                    <div class="feature-item hover-grow">
                        <a href="<?php echo e(url('/')); ?>" target="_blank">
                            <img src="<?php echo e(asset('images/shop.png')); ?>" alt="Shop">
                        </a>
                        <h4>Organization Shop</h4>
                        <p>All in One Merch Shop from your Favorite Org.</p>
                    </div>
                    <div class="feature-item hover-grow">
                        <a href="<?php echo e(url('/')); ?>" target="_blank">
                            <img src="<?php echo e(asset('images/online2.png')); ?>" alt="Online Bulletin">
                        </a>
                        <h4>Online Bulletin</h4>
                        <p>Touch Base for public information, events.</p>
                    </div>
                </div>
                <h4 class="stay-tuned">More coming soon! Stay tuned.</h4>
            </div>
        </section>

        <style>
        .image-slice {
            position: relative;
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
        }
        .image-slice img {
            filter: grayscale(100%);
            transition: filter 0.3s ease, opacity 0.3s ease;
        }
        .image-slice:hover img {
            filter: grayscale(0%);
            opacity: 0.9;   
        }
        .image-slice:hover .overlay-text {
            opacity: 1;
        }
        .overlay-text {
            position: absolute;
            top: 85%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 1.5rem;  
            font-weight: bold;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .role-text {
            position: absolute;
            width: 100%;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 0.75rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .image-slice:hover .role-text {
            opacity: 1;
        }
        .divider {
            width: 2px;
            background: linear-gradient(to bottom, transparent, white, transparent);
            height: 100%;
            width: 2px;
        }
        @media (max-width: 600px) {
            .overlay-text {
                font-size: 15px; 
            }
            .image-slice img {
                width: auto;
                justify-content: center;
                align-items: center;
            }
        }
            </style>

        <!-- Testimonials Sectionz -->
        <section id="testimonials" class="section testimonials-section bg-black flex flex-col items-center justify-center min-h-screen" style="background-image: url('<?php echo e(asset('images/bg.png')); ?>'); background-size: cover; background-position: center;">
            <div class="text-center mb-8 p-5">
                <h1 class="text-white text-4xl font-bold">Developers</h1>
                <p class="text-gray-400 mt-2">This section showcases the creativity and skills of developers in creating dynamic and interactive web apps.</p>
               </div>
               <div class="relative flex space-x-0">
                <div class="image-slice">
                 <img alt="First slice of a man's face with transparent background" class="w-48 h-72 object-cover" height="200" src="<?php echo e(asset('dev/mark.png')); ?>" width="100"/>
                 <div class="overlay-text">Mark</div>
                 <div class="role-text">Full-Stack Dev</div>
                </div>
                <div class="divider"></div>
                <div class="image-slice">
                 <img alt="Second slice of a man's face with transparent background" class="w-48 h-72 object-cover" height="200" src="<?php echo e(asset('dev/bry.png')); ?>" width="100"/>
                 <div class="overlay-text">Ken</div>
                 <div class="role-text">Full-Stack Dev</div>
                </div>                
                <div class="divider"></div>
                <div class="image-slice">
                 <img alt="Fourth slice of a man's face with transparent background" class="w-48 h-72 object-cover" height="200" src="<?php echo e(asset('dev/nat.png')); ?>" width="100"/>
                 <div class="overlay-text">Nathan</div>
                 <div class="role-text">Manager</div>
                </div>
                <div class="divider"></div>
                <div class="image-slice">
                 <img alt="Third slice of a man's face with transparent background" class="w-48 h-72 object-cover" height="200" src="<?php echo e(asset('dev/john.png')); ?>" width="100"/>
                 <div class="overlay-text">John</div>
                 <div class="role-text">Docs</div>
                </div>
                <div class="divider"></div>
                <div class="image-slice">
                 <img alt="Fifth slice of a man's face with transparent background" class="w-48 h-72 object-cover" height="200" src="<?php echo e(asset('dev/vin.png')); ?>" width="100"/>
                 <div class="overlay-text">Vin</div>
                 <div class="role-text">Docs</div>
                </div>
                <div class="divider"></div>
                <div class="image-slice">
                 <img alt="Fifth slice of a man's face with transparent background" class="w-48 h-72 object-cover" height="200" src="<?php echo e(asset('dev/scot.png')); ?>" width="100"/>
                 <div class="overlay-text">Scott</div>
                 <div class="role-text">Docs</div>
                </div>
               </div>
               <div class="text-center mt-12 p-5">
                <h1 class="text-white text-xl font-bold">We know what you're thinking, but</h1>
                <p class="text-gray-400 mt-2">We are not Dead!</p>
               </div>
        </section>

        <!-- Call to Action Section -->
        <section id="cta" class="section cta-section" style="background-image: url('<?php echo e(asset('images/bg.png')); ?>'); background-size: cover; background-position: center;">
            <div class="content-container">
                <div class="text-center">
                    <h3>Ready to get started?</h3>
                    <p>Join us today and experience the difference.</p>
                    <a href="https://msoshub.com/register" target="_blank" class="cta-button">Sign Up Now</a>
                </div>
                <br><br><br><br><br><br><br><br><br><br>
                <!-- New Download Section -->
                <div class="download-section">
                    <h3>Catch the app, it’s lit.</h3>
                    <div class="download-buttons">
                        <a href="<?php echo e(url('/download')); ?>">
                        <img src="<?php echo e(asset('images/download.png')); ?>" alt="download app" >
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; <?php echo e(date('Y')); ?> MSOS. All rights reserved.</p>
    </footer>

    <script>
        document.querySelectorAll('.scroll').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                target.scrollIntoView({ behavior: 'smooth' });
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\LARAVEL\MSOS_ATTENDANCE\resources\views/landing.blade.php ENDPATH**/ ?>