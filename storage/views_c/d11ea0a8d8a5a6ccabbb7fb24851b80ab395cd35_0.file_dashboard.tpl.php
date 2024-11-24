<?php
/* Smarty version 5.4.2, created on 2024-11-24 10:59:05
  from 'file:admin/dashboard.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_6742f8e904f625_95644192',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd11ea0a8d8a5a6ccabbb7fb24851b80ab395cd35' => 
    array (
      0 => 'admin/dashboard.tpl',
      1 => 1732394843,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6742f8e904f625_95644192 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\xampp\\htdocs\\resources\\views\\admin';
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php echo '<script'; ?>
 src="https://cdn.tailwindcss.com"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-900 text-gray-100" x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 1000)">
<!-- Preloader -->
<div class="fixed inset-0 bg-gray-900 flex items-center justify-center z-50" x-show="loading">
    <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-500"></div>
</div>

<!-- Main Layout -->
<div class="flex h-screen" x-show="!loading" x-cloak>
    <!-- Sidebar -->
    <aside class="bg-gray-800 w-64 space-y-6 py-7 px-4 hidden lg:block">
        <div class="text-center text-xl font-bold text-blue-400">Dashboard</div>
        <nav>
            <ul>
                <li class="py-2 px-3">
                    <a href="#" class="block rounded-md hover:bg-blue-500 flex items-center">
                        <i class="fas fa-tachometer-alt mr-2 text-gray-400"></i>
                        Dashboard
                    </a>
                </li>

                <hr class="border-gray-600">

                <li class="py-2 px-3">
                    <a href="#" class="block rounded-md hover:bg-blue-500 flex items-center">
                        <i class="fas fa-user mr-2 text-gray-400"></i>
                        Profile
                    </a>
                </li>

                <li class="py-2 px-3" x-data="{ open: false }">
                    <a @click="open = !open" href="#"
                       class="block rounded-md hover:bg-blue-500 flex items-center justify-between">
                        <span class="flex items-center">
                            <i class="fas fa-cog mr-2 text-gray-400"></i>
                            Einstellungen
                        </span>
                        <i class="fas" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="text-gray-400"></i>
                    </a>
                    <div x-show="open" class="pl-8 mt-2">
                        <a href="#" class="block py-1 px-3 rounded-md hover:bg-blue-500">General</a>
                        <a href="#" class="block py-1 px-3 rounded-md hover:bg-blue-500">Security</a>
                        <a href="#" class="block py-1 px-3 rounded-md hover:bg-blue-500">Notifications</a>
                    </div>
                </li>

                <hr class="border-gray-600">

                <li class="py-2 px-3">
                    <a href="#" class="block rounded-md hover:bg-blue-500 flex items-center">
                        <i class="fas fa-sign-out-alt mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Content Area -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Bar -->
        <header class="bg-gray-800 shadow p-4 flex items-center justify-between">
            <input type="text" placeholder="Suche..."
                   class="bg-gray-700 text-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-500 w-64">
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-500">
                Benachrichtigungen
            </button>
        </header><!-- Main Content -->
        <main class="flex-1 bg-gray-900 p-6 overflow-y-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Cards -->
                <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <div class="flex items-center space-x-4">
                        <div class="bg-blue-500 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 10h11m4 0h3m-4 0a4 4 0 10-4-4v4z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold">Lizenzen</h2>
                            <p><?php echo $_smarty_tpl->getValue('activeLicenses');?>
 aktive</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <div class="flex items-center space-x-4">
                        <div class="bg-green-500 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 10h11m4 0h3m-4 0a4 4 0 10-4-4v4z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold">Lizenzstatus</h2>
                            <p><?php echo $_smarty_tpl->getValue('licenseStatus');?>
</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <div class="flex items-center space-x-4">
                        <div class="bg-yellow-500 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 20h9m-9 0v-7m0 7H3m9-14a4 4 0 100 8 4 4 0 000-8z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold">Ablaufdatum</h2>
                            <p><?php echo $_smarty_tpl->getValue('licenseExpiry');?>
</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <div class="flex items-center space-x-4">
                        <div class="bg-red-500 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8c1.657 0 3 1.343 3 3H9c0-1.657 1.343-3 3-3z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold">Warnungen</h2>
                            <p>2 offene Warnungen</p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Additional Section -->
            <div class="mt-6 bg-gray-800 p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold text-blue-400 mb-4">Dashboard</h2>
                <p>Aktueller Lizenzstatus: <span class="font-bold"><?php echo $_smarty_tpl->getValue('licenseStatus');?>
</span></p>
                <p>Lizenzen laufen am: <span class="font-bold"><?php echo $_smarty_tpl->getValue('licenseExpiry');?>
</span></p>
                <p>Anzahl aktiver Lizenzen: <span class="font-bold"><?php echo $_smarty_tpl->getValue('activeLicenses');?>
</span></p>
            </div>

            <!-- Chart.js Section -->
            <div class="mt-6 bg-gray-800 p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold text-blue-400 mb-4">Lizenzstatistik</h2>
                <canvas id="licenseChart"></canvas>
            </div>
            <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
>
                const ctx = document.getElementById('licenseChart').getContext('2d');
                const licenseChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: 'Aktive Lizenzen',
                            data: [12, 19, 3, 5, 2, 3, 15, 25, 22, 30, 18, 24],
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            <?php echo '</script'; ?>
>
        </main>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-center py-4 text-gray-400 text-sm custom-footer">
    <div class="flex flex-col md:flex-row justify-between items-center">
        <div class="mb-4 md:mb-0">
            <br>
            <span class="text-xs text-gray-500">Entwickelt von <a href="#" class="text-blue-400 hover:underline">Dein Entwicklerteam</a></span><br>
            <span>   © 2024 Dashboard. Alle  vorbehalten.</span>
        </div>
        <div class="flex space-x-4 pr-6">
            <a href="#" class="text-blue-400 hover:underline flex items-center">
                <i class="fas fa-shield-alt mr-2"></i>Datenschutz
            </a>
            <a href="#" class="text-blue-400 hover:underline flex items-center">
                <i class="fas fa-file-alt mr-2"></i>Impressum
            </a>
            <a href="#" class="text-blue-400 hover:underline flex items-center">
                <i class="fas fa-envelope mr-2"></i>Kontakt
            </a>
        </div>
    </div>
</footer>
<style>
    .custom-footer a {
        transition: color 0.3s, text-decoration 0.3s;
    }

    .custom-footer a:hover {
        color: #1E90FF; /* Slightly different shade of blue for hover */
        text-decoration: underline;
    }

    .custom-footer div {
        transition: color 0.3s;
    }

    .custom-footer div span {
        font-family: 'Arial', sans-serif; /* Custom font, can be adjusted */
    }
</style>
</body>

</html>
<?php }
}
