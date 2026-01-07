<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Portal - Unity Care</title>
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
<body class="bg-secondary text-dark font-sans antialiased">

    <div class="flex h-screen overflow-hidden">

        <aside class="w-72 bg-white hidden lg:flex flex-col transition-all duration-300 border-r border-gray-100">
            <div class="h-24 flex items-center px-8 text-primary font-bold text-2xl tracking-tight">
                <i class="fa-solid fa-rhombus mr-3"></i> Unity Care
            </div>

            <nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto">
                <a href="#" class="flex items-center gap-4 px-5 py-3 bg-primary text-white rounded-xl shadow-lg shadow-purple-200">
                    <i class="fa-solid fa-house-medical"></i>
                    <span class="font-medium">Overview</span>
                </a>
                
                <a href="#" class="flex items-center gap-4 px-5 py-3 text-graytext hover:text-primary hover:bg-gray-50 rounded-xl transition-all">
                    <i class="fa-regular fa-calendar"></i>
                    <span class="font-medium">My Appointments</span>
                </a>

                <a href="#" class="flex items-center gap-4 px-5 py-3 text-graytext hover:text-primary hover:bg-gray-50 rounded-xl transition-all">
                    <i class="fa-solid fa-prescription-bottle-medical"></i>
                    <span class="font-medium">Prescriptions</span>
                </a>

                <a href="#" class="flex items-center gap-4 px-5 py-3 text-graytext hover:text-primary hover:bg-gray-50 rounded-xl transition-all">
                    <i class="fa-solid fa-file-medical"></i>
                    <span class="font-medium">Medical History</span>
                </a>
            </nav>

            <div class="p-4">
                <a href="index.php?action=logout" class="flex items-center gap-3 px-5 py-3 text-red-500 hover:bg-red-50 rounded-xl transition-all font-medium">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                </a>
            </div>
        </aside>

        <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
            
            <header class="h-20 flex items-center justify-between px-8 bg-secondary/50 backdrop-blur-sm z-10">
                <div>
                    <p class="text-xs text-graytext">Pages / Patient</p>
                    <h1 class="text-3xl font-bold text-dark">My Health Portal</h1>
                </div>

                <div class="bg-white rounded-full p-2 pl-4 pr-2 shadow-sm flex items-center gap-4">
                    <div class="h-10 w-10 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold text-lg">
                        <?php echo strtoupper(substr($_SESSION['user_name'] ?? 'P', 0, 1)); ?>
                    </div>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto p-8">
                
                <div class="mb-8">
                    <h2 class="text-dark font-bold text-xl">Hello, <?php echo $_SESSION['user_name'] ?? 'Patient'; ?>! 👋</h2>
                    <p class="text-graytext text-sm">Here is your daily health summary.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    
                    <div class="bg-white p-6 rounded-[20px] shadow-sm text-center border border-gray-50">
                        <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center text-primary text-2xl mx-auto mb-3">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <h3 class="font-bold text-lg text-dark"><?php echo $_SESSION['user_name']; ?></h3>
                        <p class="text-graytext text-xs">ID: #84923</p>

                        <div class="flex justify-center gap-4 mt-6 border-t border-gray-100 pt-4">
                            <div>
                                <span class="block text-lg font-bold text-dark">28</span>
                                <span class="text-xs text-graytext">Age</span>
                            </div>
                            <div class="w-px bg-gray-100"></div>
                            <div>
                                <span class="block text-lg font-bold text-dark">A+</span>
                                <span class="text-xs text-graytext">Blood</span>
                            </div>
                            <div class="w-px bg-gray-100"></div>
                            <div>
                                <span class="block text-lg font-bold text-dark">75kg</span>
                                <span class="text-xs text-graytext">Weight</span>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="bg-white p-5 rounded-[20px] shadow-sm flex flex-col justify-between">
                            <div class="flex items-center gap-2 text-red-500 mb-2">
                                <div class="p-2 bg-red-50 rounded-full"><i class="fa-solid fa-heart-pulse"></i></div>
                                <span class="font-bold text-sm text-graytext">Heart Rate</span>
                            </div>
                            <div>
                                <span class="text-2xl font-bold text-dark">82</span> <span class="text-xs text-graytext">bpm</span>
                            </div>
                        </div>

                        <div class="bg-white p-5 rounded-[20px] shadow-sm flex flex-col justify-between">
                            <div class="flex items-center gap-2 text-blue-500 mb-2">
                                <div class="p-2 bg-blue-50 rounded-full"><i class="fa-solid fa-stethoscope"></i></div>
                                <span class="font-bold text-sm text-graytext">Pressure</span>
                            </div>
                            <div>
                                <span class="text-2xl font-bold text-dark">120/80</span> <span class="text-xs text-graytext">mmHg</span>
                            </div>
                        </div>

                        <div class="bg-white p-5 rounded-[20px] shadow-sm flex flex-col justify-between">
                            <div class="flex items-center gap-2 text-orange-500 mb-2">
                                <div class="p-2 bg-orange-50 rounded-full"><i class="fa-solid fa-droplet"></i></div>
                                <span class="font-bold text-sm text-graytext">Glucose</span>
                            </div>
                            <div>
                                <span class="text-2xl font-bold text-dark">92</span> <span class="text-xs text-graytext">mg/dL</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <div class="lg:col-span-2 bg-white p-6 rounded-[20px] shadow-sm">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-bold text-lg text-dark">Upcoming Visits</h3>
                            <button class="text-primary text-sm font-bold hover:underline">Request Appointment</button>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center p-4 bg-gray-50 rounded-xl border border-transparent hover:border-primary/20 transition-all">
                                <div class="bg-white p-3 rounded-lg text-center shadow-sm min-w-[60px] mr-4">
                                    <span class="block text-red-500 font-bold text-xs uppercase">OCT</span>
                                    <span class="block text-xl font-bold text-dark">24</span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-dark">Dr. House</h4>
                                    <p class="text-xs text-graytext">Cardiology Dept. • 09:00 AM</p>
                                </div>
                                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">Confirmed</span>
                            </div>

                            <div class="flex items-center p-4 bg-gray-50 rounded-xl border border-transparent hover:border-primary/20 transition-all">
                                <div class="bg-white p-3 rounded-lg text-center shadow-sm min-w-[60px] mr-4">
                                    <span class="block text-blue-500 font-bold text-xs uppercase">NOV</span>
                                    <span class="block text-xl font-bold text-dark">02</span>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-dark">Dr. Strange</h4>
                                    <p class="text-xs text-graytext">Neurology Dept. • 11:30 AM</p>
                                </div>
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-bold rounded-full">Pending</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-[20px] shadow-sm">
                        <h3 class="font-bold text-lg text-dark mb-6">Current Medications</h3>
                        
                        <div class="space-y-3">
                            <label class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition cursor-pointer">
                                <input type="checkbox" class="w-5 h-5 text-primary rounded border-gray-300 focus:ring-primary">
                                <div>
                                    <span class="block text-sm font-bold text-dark">Amoxicillin</span>
                                    <span class="text-xs text-graytext">500mg - After lunch</span>
                                </div>
                            </label>

                            <label class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition cursor-pointer">
                                <input type="checkbox" checked class="w-5 h-5 text-primary rounded border-gray-300 focus:ring-primary">
                                <div>
                                    <span class="block text-sm font-bold text-dark line-through opacity-50">Vitamin D</span>
                                    <span class="text-xs text-graytext line-through opacity-50">1 Tablet - Morning</span>
                                </div>
                            </label>

                            <label class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition cursor-pointer">
                                <input type="checkbox" class="w-5 h-5 text-primary rounded border-gray-300 focus:ring-primary">
                                <div>
                                    <span class="block text-sm font-bold text-dark">Paracetamol</span>
                                    <span class="text-xs text-graytext">As needed for pain</span>
                                </div>
                            </label>
                        </div>
                        
                        <button class="w-full mt-6 py-2 rounded-xl border border-primary text-primary text-sm font-bold hover:bg-primary hover:text-white transition-all">
                            Refill Request
                        </button>
                    </div>

                </div>

            </div>
        </main>
    </div>

</body>
</html>