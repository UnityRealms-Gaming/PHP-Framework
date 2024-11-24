<?php
/* Smarty version 5.4.2, created on 2024-11-23 17:22:54
  from 'file:auth/register.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_6742015e290de7_11919907',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '342a1f27936739760887f443b81790b740784ab6' => 
    array (
      0 => 'auth/register.tpl',
      1 => 1732378966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6742015e290de7_11919907 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\xampp\\htdocs\\resources\\views\\auth';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php echo '<script'; ?>
 src="https://cdn.tailwindcss.com"><?php echo '</script'; ?>
>
    <style>
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(30, 30, 47, 0.9);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .preloader.active {
            display: flex !important;
        }

        .preloader .spinner {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top: 4px solid white;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .alert-badge {
            position: fixed;
            top: 20px;
            right: 20px;
            background: red;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            display: none;
        }

        .alert-badge.active {
            display: flex !important;
        }
    </style>
    <?php echo '<script'; ?>
>
        function showPreloader() {
            document.querySelector('.preloader').classList.add('active');
        }

        function hidePreloader() {
            document.querySelector('.preloader').classList.remove('active');
        }

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            form.addEventListener('submit', function (event) {
                showPreloader(); // Zeigt den Preloader an
            });
        });
    <?php echo '</script'; ?>
>
</head>

<body class="bg-gray-900 text-white flex justify-center items-center h-screen m-0">
<!-- Preloader -->
<div class="preloader">
    <div class="spinner"></div>
</div>

<!-- Registrierungsformular -->
<form method="POST" action="/auth/register" class="flex flex-col p-8 bg-gray-800 rounded-xl shadow-2xl space-y-6">
    <!-- Name Input -->
    <label for="name" class="text-sm font-semibold text-gray-400">Name:</label>
    <div class="relative">
        <input type="text" name="name" id="name" required
               class="w-full p-4 pl-12 border border-gray-700 rounded-lg bg-gray-900 text-white focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300 ease-in-out transform hover:scale-105">
        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" width="24" height="24"
             fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2a10 10 0 100 20 10 10 0 000-20z"></path>
        </svg>
    </div>

    <!-- Email Input -->
    <label for="email" class="text-sm font-semibold text-gray-400">Email:</label>
    <div class="relative">
        <input type="email" name="email" id="email" required
               class="w-full p-4 pl-12 border border-gray-700 rounded-lg bg-gray-900 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-105">
        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" width="24" height="24"
             fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14c-2.97 0-9 1.43-9 4.29V20h18v-1.71C21 15.43 14.97 14 12 14z"></path>
        </svg>
    </div>

    <!-- Password Input -->
    <label for="password" class="text-sm font-semibold text-gray-400">Password:</label>
    <div class="relative">
        <input type="password" name="password" id="password" required
               class="w-full p-4 pl-12 border border-gray-700 rounded-lg bg-gray-900 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300 ease-in-out transform hover:scale-105">
        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" width="24" height="24"
             fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 17a2 2 0 100-4 2 2 0 000 4zm6-8h-1V7a5 5 0 00-10 0v2H6c-1.1 0-1.99.9-1.99 2L4 18a2 2 0 002 2h12a2 2 0 002-2v-7c0-1.1-.9-2-2-2zm-6 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3-6H9V7a3 3 0 016 0v2z"></path>
        </svg>
    </div>

    <!-- Submit Button -->
    <button type="submit"
            class="relative p-4 rounded-lg bg-gradient-to-r from-green-400 to-blue-600 text-white font-extrabold transition duration-300 ease-in-out transform hover:scale-105 overflow-hidden">
        <span class="absolute inset-0 bg-gradient-to-r from-green-300 to-blue-500 opacity-20"></span>
        <span class="relative z-10">Register</span>
    </button>
</form>
</body>
</html>
<?php }
}
