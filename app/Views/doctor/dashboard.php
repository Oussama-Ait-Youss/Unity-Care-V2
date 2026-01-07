<?php
// Ensure session is started if not already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard - Unity Care</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['DM Sans', 'sans-serif'],
                    },
                    colors: {
                        primary: '#4318FF',     // The deep purple from the image
                        secondary: '#F4F7FE',   // The light gray background
                        dark: '#2B3674',        // Dark text
                        graytext: '#A3AED0',    // Light text
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-secondary text-dark font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-72 bg-white flex flex-col transition-all duration-300 ease-in-out hidden lg:flex">
            <div class="h-24 flex items-center px-8 border-b-0">
                <div class="flex items-center gap-3 font-bold text-2xl tracking-tight text-primary">
                    <i class="fa-solid fa-rhombus"></i>
                    <span class="text-dark">Unity Care</span>
                </div>
            </div>

            <nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto">
                <a href="#" class="flex items-center gap-4 px-5 py-3 bg-primary text-white rounded-xl shadow-lg shadow-purple-200 transition-all">
                    <i class="fa-solid fa-table-columns"></i>
                    <span class="font-medium">Overview</span>
                </a>

                <a href="#" class="flex items-center gap-4 px-5 py-3 text-graytext hover:text-primary transition-colors">
                    <i class="fa-solid fa-user-doctor"></i>
                    <span class="font-medium">My Schedule</span>
                </a>
                
                <a href="#" class="flex items-center gap-4 px-5 py-3 text-graytext hover:text-primary transition-colors">
                    <i class="fa-solid fa-users"></i>
                    <span class="font-medium">Patients</span>
                </a>

                <a href="#" class="flex items-center gap-4 px-5 py-3 text-graytext hover:text-primary transition-colors">
                    <i class="fa-solid fa-file-medical"></i>
                    <span class="font-medium">Reports</span>
                </a>

                <div class="pt-4 pb-2 px-5 text-xs font-bold text-graytext uppercase tracking-wider">
                    Settings
                </div>
                
                <a href="#" class="flex items-center gap-4 px-5 py-3 text-graytext hover:text-primary transition-colors">
                    <i class="fa-solid fa-gear"></i>
                    <span class="font-medium">Account</span>
                </a>
            </nav>

            <div class="p-4">
                <div class="bg-gradient-to-br from-[#868CFF] to-[#4318FF] rounded-2xl p-5 text-white text-center relative overflow-hidden">
                    <div class="w-20 h-20 bg-white opacity-20 rounded-full absolute -top-5 -left-5"></div>
                    <div class="relative z-10">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-primary mx-auto mb-3 text-lg font-bold">?</div>
                        <h4 class="font-bold text-sm">Need Help?</h4>
                        <p class="text-xs text-white/80 mb-3">Check our docs</p>
                        <button class="bg-white text-primary text-xs font-bold py-2 px-4 rounded-lg w-full">Documentation</button>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
            
            <header class="h-20 flex items-center justify-between px-8 bg-secondary/50 backdrop-blur-sm z-10">
                
                <div>
                    <p class="text-xs text-graytext">Pages / Dashboard</p>
                    <h1 class="text-3xl font-bold text-dark">Main Dashboard</h1>
                </div>

                <div class="bg-white rounded-full p-2 pl-4 pr-2 shadow-sm flex items-center gap-4">
                    <div class="relative hidden md:block">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-graytext text-sm"></i>
                        <input type="text" placeholder="Search..." class="bg-secondary rounded-full pl-10 pr-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary/50 w-48 text-dark">
                    </div>

                    <i class="fa-regular fa-bell text-graytext hover:text-primary cursor-pointer px-1"></i>
                    <i class="fa-solid fa-moon text-graytext hover:text-primary cursor-pointer px-1"></i>

                    <div class="h-10 w-10 rounded-full bg-primary text-white flex items-center justify-center font-bold text-lg relative group cursor-pointer">
                        <?php echo substr($_SESSION['user_name'] ?? 'D', 0, 1); ?>
                        
                        <div class="absolute right-0 top-12 w-48 bg-white rounded-xl shadow-xl border border-gray-100 hidden group-hover:block p-2">
                            <div class="px-4 py-2 border-b border-gray-50 mb-1">
                                <p class="text-xs text-graytext">Signed in as</p>
                                <p class="text-sm font-bold text-dark truncate"><?php echo $_SESSION['user_name']; ?></p>
                            </div>
                            <a href="index.php?action=logout" class="block px-4 py-2 text-sm text-red-500 hover:bg-red-50 rounded-lg">
                                <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto p-8">
                
                <div class="mb-8">
                    <h2 class="text-dark font-bold text-xl">Hi Dr. <?php echo $_SESSION['user_name']; ?> 👋</h2>
                    <p class="text-graytext text-sm">Here is what is happening with your patients today.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    
                    <div class="bg-white p-4 rounded-[20px] shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-secondary flex items-center justify-center text-primary text-xl">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                        <div>
                            <p class="text-graytext text-xs font-medium">Appointments</p>
                            <h3 class="text-2xl font-bold text-dark">12</h3>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-[20px] shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-secondary flex items-center justify-center text-blue-500 text-xl">
                            <i class="fa-solid fa-hospital-user"></i>
                        </div>
                        <div>
                            <p class="text-graytext text-xs font-medium">Total Patients</p>
                            <h3 class="text-2xl font-bold text-dark">842</h3>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-[20px] shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-secondary flex items-center justify-center text-green-500 text-xl">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <div>
                            <p class="text-graytext text-xs font-medium">Activity</p>
                            <h3 class="text-2xl font-bold text-dark">+24%</h3>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-[20px] shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-secondary flex items-center justify-center text-orange-500 text-xl">
                            <i class="fa-solid fa-clipboard-list"></i>
                        </div>
                        <div>
                            <p class="text-graytext text-xs font-medium">Pending Tasks</p>
                            <h3 class="text-2xl font-bold text-dark">7</h3>
                        </div>
                    </div>

                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    
                    <div class="bg-white p-6 rounded-[20px] shadow-sm">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-bold text-lg text-dark">Patient Demographics</h3>
                            <div class="w-8 h-8 bg-secondary rounded-lg flex items-center justify-center text-primary cursor-pointer">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-8 justify-center">
                            <div class="w-48 h-48 rounded-full relative" 
                                 style="background: conic-gradient(#4318FF 0% 65%, #6AD2FF 65% 85%, #EFF4FB 85% 100%);">
                                 <div class="absolute inset-4 bg-white rounded-full flex items-center justify-center flex-col">
                                     <span class="text-graytext text-xs">Total</span>
                                     <span class="text-2xl font-bold text-dark">842</span>
                                 </div>
                            </div>
                            
                            <div class="space-y-3">
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-[#4318FF]"></span>
                                    <span class="text-graytext text-sm">Returning (65%)</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-[#6AD2FF]"></span>
                                    <span class="text-graytext text-sm">New (20%)</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-[#EFF4FB]"></span>
                                    <span class="text-graytext text-sm">Other (15%)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-[20px] shadow-sm">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-bold text-lg text-dark">Weekly Consultations</h3>
                            <button class="bg-secondary text-primary px-3 py-1 rounded-lg text-xs font-bold">
                                <i class="fa-solid fa-chart-simple mr-1"></i> Report
                            </button>
                        </div>

                        <div class="h-48 flex items-end justify-between gap-2 px-2">
                            <div class="w-full bg-secondary rounded-t-lg relative group h-[40%]">
                                <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-dark text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition">12</div>
                            </div>
                            <div class="w-full bg-secondary rounded-t-lg relative group h-[60%]"></div>
                            <div class="w-full bg-secondary rounded-t-lg relative group h-[30%]"></div>
                            <div class="w-full bg-secondary rounded-t-lg relative group h-[80%]"></div>
                            <div class="w-full bg-primary rounded-t-lg relative group h-[95%] shadow-lg shadow-purple-200">
                                <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-dark text-white text-xs py-1 px-2 rounded">28</div>
                            </div>
                            <div class="w-full bg-secondary rounded-t-lg relative group h-[50%]"></div>
                            <div class="w-full bg-secondary rounded-t-lg relative group h-[40%]"></div>
                        </div>
                        <div class="flex justify-between mt-2 text-xs text-graytext uppercase font-bold">
                            <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
                        </div>
                    </div>

                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <div class="lg:col-span-2 bg-white p-6 rounded-[20px] shadow-sm">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-bold text-lg text-dark">Upcoming Appointments</h3>
                            <i class="fa-solid fa-ellipsis text-primary bg-secondary w-8 h-8 flex items-center justify-center rounded-lg cursor-pointer"></i>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="text-left text-graytext text-xs uppercase border-b border-gray-100">
                                        <th class="pb-3 pl-2">Patient</th>
                                        <th class="pb-3">Diagnosis</th>
                                        <th class="pb-3">Date</th>
                                        <th class="pb-3 text-right pr-2">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm text-dark font-medium">
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="py-4 pl-2 flex items-center gap-3">
                                            <div class="h-8 w-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-xs font-bold">JD</div>
                                            John Doe
                                        </td>
                                        <td class="py-4 text-graytext">Hypertension</td>
                                        <td class="py-4">Today, 10:00 AM</td>
                                        <td class="py-4 text-right pr-2">
                                            <i class="fa-solid fa-circle-check text-green-500 text-lg"></i>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="py-4 pl-2 flex items-center gap-3">
                                            <div class="h-8 w-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold">AS</div>
                                            Alice Smith
                                        </td>
                                        <td class="py-4 text-graytext">Routine Checkup</td>
                                        <td class="py-4">Today, 11:30 AM</td>
                                        <td class="py-4 text-right pr-2">
                                            <i class="fa-regular fa-clock text-orange-400 text-lg"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-[20px] shadow-sm">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-bold text-lg text-dark">Tasks</h3>
                            <div class="w-8 h-8 bg-green-100 text-green-600 rounded-lg flex items-center justify-center cursor-pointer hover:bg-green-200">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <input type="checkbox" class="w-4 h-4 text-primary rounded border-gray-300 focus:ring-primary">
                                <label class="text-sm font-medium text-dark flex-1">Review Lab Results (John)</label>
                            </div>
                            <div class="flex items-center gap-3">
                                <input type="checkbox" checked class="w-4 h-4 text-primary rounded border-gray-300 focus:ring-primary">
                                <label class="text-sm font-medium text-graytext line-through flex-1">Update Patient Records</label>
                            </div>
                             <div class="flex items-center gap-3">
                                <input type="checkbox" class="w-4 h-4 text-primary rounded border-gray-300 focus:ring-primary">
                                <label class="text-sm font-medium text-dark flex-1">Team Meeting at 2pm</label>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </main>
    </div>

</body>
</html>