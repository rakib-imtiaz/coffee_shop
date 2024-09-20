<!-- includes/templates/header.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Little Avenue Coffee</title>
    
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Cormorant+Garamond:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- AOS Library for Animations -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    
    <!-- Swiper.js for Sliders -->
    <link href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" rel="stylesheet">
    
    <!-- Custom CSS (Optional) -->
    <link rel="stylesheet" href="/assets/css/custom.css">
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js" defer></script>
    <script src="/assets/js/script.js" defer></script>
</head>

<body class="font-playfair bg-gray-100">

    <!-- Header -->
    <header class="bg-white shadow-md fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="text-lg font-bold text-brown-700">
                <a href="/">
                    <!-- <img src="/assets/images/logo_new.png" alt="Little Avenue Coffee Logo" class="h-12 transition-transform duration-300 transform hover:scale-110"> -->
                </a>
            </div>

            <!-- Navigation Links (Desktop) -->
            <nav class="hidden lg:flex space-x-6 items-center">
                <a href="#shopping_cart" class="text-gray-700 hover:text-brown-500 transition">Bean Shopping Cart</a>
                <a href="#" class="text-gray-700 hover:text-brown-500 transition">Catering</a>
                <a href="#aboutus" class="text-gray-700 hover:text-brown-500 transition">About Us</a>
                <a href="#review" class="text-gray-700 hover:text-brown-500 transition">Review</a>
                <a href="#contact_us" class="text-gray-700 hover:text-brown-500 transition">Contact Us</a>
                <?php if(!isset($_SESSION['user'])): ?>
                <button id="loginBtn" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 transition">Login</button>
                <button class="bg-brown-500 text-white px-4 py-2 rounded hover:bg-brown-600 transition">Signup</button>
                <?php endif; ?>
            </nav>

            <!-- Hamburger Menu (Mobile) -->
            <div class="lg:hidden">
                <button id="menu-btn" class="text-gray-600 focus:outline-none">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden bg-gray-100">
            <nav class="flex flex-col items-center space-y-4 py-4">
                <a href="#shopping_cart" class="text-gray-700 hover:text-brown-500 transition">Bean Shopping Cart</a>
                <a href="#" class="text-gray-700 hover:text-brown-500 transition">Catering</a>
                <a href="#aboutus" class="text-gray-700 hover:text-brown-500 transition">About Us</a>
                <a href="#review" class="text-gray-700 hover:text-brown-500 transition">Review</a>
                <a href="#contact_us" class="text-gray-700 hover:text-brown-500 transition">Contact Us</a>
                <button class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 transition">Login</button>
                <button class="bg-brown-500 text-white px-4 py-2 rounded hover:bg-brown-600 transition">Signup</button>
            </nav>
        </div>
    </header>
