<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Bidding - Premium Auction Marketplace')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-[#0B0B0B] via-[#111111] to-[#0B0B0B] text-white font-inter antialiased">

    <!-- Header Navigation -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-black/40 backdrop-blur-xl border-b border-white/5">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="flex items-center space-x-3 group">
                        <!-- Custom Logo: Golden Hammer, Graph & Nest -->
                        <div class="relative w-14 h-14 flex items-center justify-center transform group-hover:scale-105 transition-transform duration-300">
                            <!-- Glow -->
                            <div class="absolute inset-0 bg-yellow-500 rounded-full opacity-10 group-hover:opacity-20 blur-md transition-opacity"></div>

                            <svg class="w-12 h-12 drop-shadow-lg" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <!-- Outer Circle -->
                                <circle cx="24" cy="24" r="22" stroke="url(#logo-gradient)" stroke-width="2" />

                                <!-- Hammer Handle -->
                                <path d="M14 28L24 18" stroke="url(#logo-gradient)" stroke-width="3" stroke-linecap="round" />
                                <!-- Hammer Head -->
                                <path d="M20 16L22 14L28 20L26 22L20 16Z" fill="url(#logo-gradient)" />
                                <path d="M18 18L19 19" stroke="url(#logo-gradient)" stroke-width="1" />

                                <!-- Rising Graph Arrow -->
                                <path d="M28 24L32 20L38 20" stroke="url(#logo-gradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M36 17L39 20L36 23" stroke="url(#logo-gradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />

                                <!-- Dollar Sign -->
                                <text x="28" y="16" fill="url(#logo-gradient)" font-family="sans-serif" font-weight="bold" font-size="8">$</text>

                                <!-- Nest/Basket Swooshes -->
                                <path d="M14 30C14 30 18 36 24 36C30 36 34 30 34 30" stroke="url(#logo-gradient)" stroke-width="2" stroke-linecap="round" />
                                <path d="M16 28C16 28 20 32 24 32C28 32 32 28 32 28" stroke="url(#logo-gradient)" stroke-width="1.5" stroke-linecap="round" />

                                <defs>
                                    <linearGradient id="logo-gradient" x1="0" y1="0" x2="48" y2="48" gradientUnits="userSpaceOnUse">
                                        <stop offset="0.1" stop-color="#FCD34D" />
                                        <stop offset="0.4" stop-color="#F59E0B" />
                                        <stop offset="0.7" stop-color="#FCD34D" />
                                        <stop offset="1.0" stop-color="#B45309" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <div class="flex flex-col -ml-1">
                            <span class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-500 to-yellow-600 tracking-tight leading-none filter drop-shadow-sm">BIDDING</span>
                            <span class="text-[0.6rem] text-yellow-500 tracking-[0.2em] uppercase font-bold ml-0.5">Online Auctions</span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Menu -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="#auctions" class="text-sm font-medium text-gray-300 hover:text-yellow-400 transition-colors duration-200">Auctions</a>
                    <a href="#history" class="text-sm font-medium text-gray-300 hover:text-yellow-400 transition-colors duration-200">History</a>
                    <a href="#faqs" class="text-sm font-medium text-gray-300 hover:text-yellow-400 transition-colors duration-200">FAQs</a>
                    <a href="#help" class="text-sm font-medium text-gray-300 hover:text-yellow-400 transition-colors duration-200 flex items-center">
                        Help
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </nav>

                <!-- Authentication State -->
                <div class="flex items-center space-x-4">
                    @auth
                    <!-- AUTHENTICATED STATE -->

                    <!-- Balance -->
                    <div class="hidden lg:flex items-center space-x-2 bg-white/5 backdrop-blur-sm px-4 py-2 rounded-xl border border-white/10 hover:border-yellow-400/50 transition-all duration-300">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-semibold text-yellow-400">$2,450.00</span>
                    </div>

                    <!-- User Dropdown -->
                    <div class="relative group" x-data="{ open: false }">
                        <button @click="open = !open" @click.away="open = false" class="flex items-center space-x-3 bg-white/5 backdrop-blur-sm px-3 py-2 rounded-xl border border-white/10 hover:border-yellow-400/50 transition-all duration-300">
                            <div class="w-8 h-8 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-lg flex items-center justify-center">
                                <span class="text-sm font-bold text-black">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <span class="hidden lg:block text-sm font-medium">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-yellow-400 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 top-full mt-1 w-48 bg-[#111111] border border-white/10 rounded-xl shadow-xl overflow-hidden z-[100]"
                            style="display: none;">
                            <a href="{{ route('dashboard') }}" class="block px-4 py-3 text-sm text-gray-300 hover:bg-white/5 hover:text-yellow-400">Dashboard</a>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-sm text-gray-300 hover:bg-white/5 hover:text-yellow-400">Profile</a>
                            <div class="border-t border-white/5"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-3 text-sm text-red-400 hover:bg-white/5 hover:text-red-300">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Cart Icon -->
                    <button class="relative p-2 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10 hover:border-yellow-400/50 transition-all duration-300">
                        <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="absolute -top-1 -right-1 w-5 h-5 bg-yellow-400 text-black text-xs font-bold rounded-full flex items-center justify-center">2</span>
                    </button>
                    @endauth

                    @guest
                    <!-- GUEST STATE -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-300 hover:text-white transition-colors">
                            Log in
                        </a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-5 py-2.5 bg-gradient-to-r from-yellow-400 to-yellow-600 text-black text-sm font-bold rounded-xl hover:shadow-lg hover:shadow-yellow-500/20 transform hover:scale-105 transition-all duration-300">
                            Sign up
                        </a>
                        @endif
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-black/40 backdrop-blur-xl border-t border-white/5 mt-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-white mb-4">About Us</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm text-gray-400 hover:text-yellow-400 transition-colors">Company</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-yellow-400 transition-colors">Careers</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-white mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm text-gray-400 hover:text-yellow-400 transition-colors">Help Center</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-yellow-400 transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-white mb-4">Terms</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm text-gray-400 hover:text-yellow-400 transition-colors">Privacy</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-yellow-400 transition-colors">Terms of Service</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-white mb-4">Learn Uy</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm text-gray-400 hover:text-yellow-400 transition-colors">Blog</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-yellow-400 transition-colors">Guides</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-white/5 text-center">
                <p class="text-sm text-gray-500">© 2026 Bidding. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>

</html>