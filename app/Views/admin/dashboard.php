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
    <title>Admin Dashboard - Unity Care</title>
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
                    <i class="fa-solid fa-house"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="index.php?action=doctors" class="flex items-center gap-4 px-5 py-3 text-graytext hover:text-primary hover:bg-gray-50 rounded-xl transition-all">
                    <i class="fa-solid fa-user-doctor"></i>
                    <span class="font-medium">Doctors</span>
                </a>
                
                <a href="index.php?action=patients" class="flex items-center gap-4 px-5 py-3 text-graytext hover:text-primary hover:bg-gray-50 rounded-xl transition-all">
                    <i class="fa-solid fa-hospital-user"></i>
                    <span class="font-medium">Patients</span>
                </a>

                <a href="index.php?action=appointments" class="flex items-center gap-4 px-5 py-3 text-graytext hover:text-primary hover:bg-gray-50 rounded-xl transition-all">
                    <i class="fa-regular fa-calendar-check"></i>
                    <span class="font-medium">Appointments</span>
                </a>

                <a href="index.php?action=medications" class="flex items-center gap-4 px-5 py-3 text-graytext hover:text-primary hover:bg-gray-50 rounded-xl transition-all">
                    <i class="fa-solid fa-pills"></i>
                    <span class="font-medium">Medications</span>
                </a>
            </nav>

            <div class="p-4">
                <a href="index.php?action=logout" class="flex items-center gap-3 px-5 py-3 text-red-500 hover:bg-red-50 rounded-xl transition-all font-medium">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Logout
                </a>
            </div>
        </aside>

        <main class="flex-1 flex flex-col h-screen overflow-hidden relative">
            
            <header class="h-20 flex items-center justify-between px-8 bg-secondary/50 backdrop-blur-sm z-10">
                <div>
                    <p class="text-xs text-graytext">Pages / Admin</p>
                    <h1 class="text-3xl font-bold text-dark">Main Dashboard</h1>
                </div>

                <div class="bg-white rounded-full p-2 pl-4 pr-2 shadow-sm flex items-center gap-4">
                    <div class="relative hidden md:block">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-graytext text-sm"></i>
                        <input type="text" placeholder="Search..." class="bg-secondary rounded-full pl-10 pr-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary/50 w-64">
                    </div>
                    
                    <div class="h-10 w-10 rounded-full bg-primary text-white flex items-center justify-center font-bold text-lg cursor-pointer">
                        <?php echo strtoupper(substr($_SESSION['user_name'] ?? 'A', 0, 1)); ?>
                    </div>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto p-8">
                
                <div class="mb-8 flex justify-between items-end">
                    <div>
                        <h2 class="text-dark font-bold text-xl">Welcome back, <?php echo $_SESSION['user_name'] ?? 'Admin'; ?>! 👋</h2>
                        <p class="text-graytext text-sm">Here is the clinic overview for today.</p>
                    </div>
                    <button class="bg-primary hover:bg-indigo-700 text-white px-5 py-2 rounded-xl text-sm font-bold shadow-lg shadow-purple-200 transition-all">
                        <i class="fa-solid fa-plus mr-2"></i> Add New User
                    </button>
                </div>

                <h3 class="text-dark font-bold text-lg mb-4">Quick Actions</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    
                    <a href="index.php?action=doctors" class="group bg-white p-5 rounded-[20px] shadow-sm hover:shadow-md transition-all border border-transparent hover:border-primary/20">
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 text-xl group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                <i class="fa-solid fa-user-doctor"></i>
                            </div>
                            <i class="fa-solid fa-arrow-right text-graytext group-hover:text-primary"></i>
                        </div>
                        <h3 class="text-lg font-bold text-dark">Manage Doctors</h3>
                        <p class="text-graytext text-xs mt-1">Add, edit or remove staff</p>
                    </a>

                    <a href="index.php?action=patients" class="group bg-white p-5 rounded-[20px] shadow-sm hover:shadow-md transition-all border border-transparent hover:border-primary/20">
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 rounded-full bg-green-50 flex items-center justify-center text-green-600 text-xl group-hover:bg-green-600 group-hover:text-white transition-colors">
                                <i class="fa-solid fa-hospital-user"></i>
                            </div>
                            <i class="fa-solid fa-arrow-right text-graytext group-hover:text-primary"></i>
                        </div>
                        <h3 class="text-lg font-bold text-dark">Manage Patients</h3>
                        <p class="text-graytext text-xs mt-1">View patient records</p>
                    </a>

                    <a href="index.php?action=appointments" class="group bg-white p-5 rounded-[20px] shadow-sm hover:shadow-md transition-all border border-transparent hover:border-primary/20">
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 rounded-full bg-orange-50 flex items-center justify-center text-orange-600 text-xl group-hover:bg-orange-600 group-hover:text-white transition-colors">
                                <i class="fa-regular fa-calendar-check"></i>
                            </div>
                            <i class="fa-solid fa-arrow-right text-graytext group-hover:text-primary"></i>
                        </div>
                        <h3 class="text-lg font-bold text-dark">Appointments</h3>
                        <p class="text-graytext text-xs mt-1">View & schedule visits</p>
                    </a>

                    <a href="index.php?action=medications" class="group bg-white p-5 rounded-[20px] shadow-sm hover:shadow-md transition-all border border-transparent hover:border-primary/20">
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 rounded-full bg-purple-50 flex items-center justify-center text-primary text-xl group-hover:bg-primary group-hover:text-white transition-colors">
                                <i class="fa-solid fa-pills"></i>
                            </div>
                            <i class="fa-solid fa-arrow-right text-graytext group-hover:text-primary"></i>
                        </div>
                        <h3 class="text-lg font-bold text-dark">Medications</h3>
                        <p class="text-graytext text-xs mt-1">Pharmacy inventory</p>
                    </a>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    
                    <div class="bg-white p-6 rounded-[20px] shadow-sm">
                        <h3 class="font-bold text-lg text-dark mb-4">Clinic Growth</h3>
                        <div class="flex items-end space-x-2 h-48">
                            <div class="w-1/6 bg-secondary rounded-t-lg h-[40%]"></div>
                            <div class="w-1/6 bg-secondary rounded-t-lg h-[60%]"></div>
                            <div class="w-1/6 bg-secondary rounded-t-lg h-[30%]"></div>
                            <div class="w-1/6 bg-primary rounded-t-lg h-[80%] shadow-lg shadow-purple-200 relative group">
                                <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-dark text-white text-xs py-1 px-2 rounded opacity-0 group-hover:opacity-100 transition">Current</div>
                            </div>
                            <div class="w-1/6 bg-secondary rounded-t-lg h-[50%]"></div>
                            <div class="w-1/6 bg-secondary rounded-t-lg h-[70%]"></div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-[20px] shadow-sm overflow-hidden">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold text-lg text-dark">Recent Logs</h3>
                            <button class="text-primary text-sm font-bold">See All</button>
                        </div>
                        <table class="w-full">
                            <thead class="text-graytext text-xs uppercase text-left">
                                <tr>
                                    <th class="pb-2">User</th>
                                    <th class="pb-2">Role</th>
                                    <th class="pb-2 text-right">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm font-bold text-dark">
                                <tr class="border-b border-gray-50 last:border-0">
                                    <td class="py-3 flex items-center gap-2">
                                        <div class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs">J</div>
                                        John Doe
                                    </td>
                                    <td class="text-graytext text-xs font-normal">Doctor</td>
                                    <td class="text-right"><span class="text-green-500">Active</span></td>
                                </tr>
                                <tr class="border-b border-gray-50 last:border-0">
                                    <td class="py-3 flex items-center gap-2">
                                        <div class="w-6 h-6 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-xs">S</div>
                                        Sarah Smith
                                    </td>
                                    <td class="text-graytext text-xs font-normal">Patient</td>
                                    <td class="text-right"><span class="text-blue-500">Checked In</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>
    </div>

</body>
</html>