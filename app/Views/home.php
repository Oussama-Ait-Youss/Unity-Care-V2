<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unity Care - Modern Healthcare Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['DM Sans', 'sans-serif'] },
                    colors: {
                        primary: '#4318FF',
                        secondary: '#F4F7FE',
                        dark: '#2B3674',
                        graytext: '#A3AED0',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-white text-dark font-sans antialiased">

    <nav class="max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">
        <div class="flex items-center gap-3 font-bold text-2xl tracking-tight text-primary">
            <i class="fa-solid fa-rhombus"></i>
            <span class="text-dark">Unity Care</span>
        </div>

        <div class="hidden md:flex items-center gap-8 font-medium text-graytext">
            <a href="#" class="hover:text-primary transition-colors">Home</a>
            <a href="#services" class="hover:text-primary transition-colors">Services</a>
            <a href="#doctors" class="hover:text-primary transition-colors">Doctors</a>
        </div>

        <div class="flex items-center gap-4">
            <a href="index.php?action=login_form" class="text-dark font-bold hover:text-primary transition-colors hidden sm:block">Log In</a>
            <a href="index.php?action=login_form" class="bg-primary hover:bg-indigo-700 text-white px-6 py-3 rounded-full font-bold shadow-lg shadow-purple-200 transition-all">
                Get Started
            </a>
        </div>
    </nav>

    <section class="max-w-7xl mx-auto px-6 py-12 lg:py-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        
        <div class="space-y-6">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary text-primary text-xs font-bold uppercase tracking-wider">
                <span class="w-2 h-2 rounded-full bg-primary"></span>
                v2.0 Now Live
            </div>
            
            <h1 class="text-5xl lg:text-7xl font-bold text-dark leading-tight">
                Healthcare <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-blue-400">Simplified.</span>
            </h1>
            
            <p class="text-graytext text-lg max-w-lg leading-relaxed">
                Experience the future of medical management. Book appointments, track prescriptions, and manage patient records in one beautiful interface.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <a href="index.php?action=login_form" class="bg-primary text-white px-8 py-4 rounded-full font-bold text-center shadow-xl shadow-purple-200 hover:-translate-y-1 transition-transform">
                    Book Appointment
                </a>
                <button class="px-8 py-4 rounded-full font-bold text-dark border border-gray-100 hover:bg-secondary transition-colors flex items-center justify-center gap-2">
                    <i class="fa-solid fa-play-circle text-primary"></i> Watch Demo
                </button>
            </div>

            <div class="pt-8 flex items-center gap-4 text-sm font-medium text-graytext">
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 rounded-full bg-gray-200 border-2 border-white"></div>
                    <div class="w-8 h-8 rounded-full bg-gray-300 border-2 border-white"></div>
                    <div class="w-8 h-8 rounded-full bg-gray-400 border-2 border-white"></div>
                </div>
                <p>Trusted by <span class="text-dark font-bold">1,000+</span> patients</p>
            </div>
        </div>

        <div class="relative">
            <div class="absolute top-0 right-0 w-96 h-96 bg-purple-100 rounded-full filter blur-3xl opacity-50 -z-10"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-blue-100 rounded-full filter blur-3xl opacity-50 -z-10"></div>
            
            <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                 alt="Medical Team" 
                 class="rounded-[30px] shadow-2xl border-4 border-white rotate-1 hover:rotate-0 transition-all duration-500 w-full object-cover h-[500px]">
                 
            <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-[20px] shadow-xl animate-bounce duration-[3000ms]">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div>
                        <p class="text-xs text-graytext">Status</p>
                        <p class="font-bold text-dark">System Online</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="bg-secondary py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-dark mb-4">Why choose Unity Care?</h2>
                <p class="text-graytext">We bring doctors and patients together on a platform built for speed, security, and ease of use.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-[30px] shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-500 text-2xl mb-6">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3">Expert Doctors</h3>
                    <p class="text-graytext leading-relaxed">Access a network of top-tier specialists across cardiology, neurology, and pediatrics.</p>
                </div>

                <div class="bg-white p-8 rounded-[30px] shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <div class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center text-primary text-2xl mb-6">
                        <i class="fa-regular fa-calendar-check"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3">Easy Scheduling</h3>
                    <p class="text-graytext leading-relaxed">Book, reschedule, or cancel appointments instantly with our real-time calendar system.</p>
                </div>

                <div class="bg-white p-8 rounded-[30px] shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-500 text-2xl mb-6">
                        <i class="fa-solid fa-shield-heart"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3">Secure Records</h3>
                    <p class="text-graytext leading-relaxed">Your medical history and prescriptions are stored securely and accessible only by you.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white py-12 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-3 font-bold text-xl text-dark">
                <i class="fa-solid fa-rhombus text-primary"></i>
                Unity Care
            </div>
            <div class="text-graytext text-sm">
                &copy; 2024 Unity Care Clinic. All rights reserved.
            </div>
            <div class="flex gap-4 text-graytext">
                <a href="#" class="hover:text-primary"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" class="hover:text-primary"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="hover:text-primary"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </footer>

</body>
</html>