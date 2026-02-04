<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-[#0B0B0B] via-[#111111] to-[#0B0B0B] relative overflow-hidden">

        <!-- Background Decoration -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-yellow-600/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-yellow-400/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10">
            <a href="/" class="flex flex-col items-center group">
                <!-- Custom Logo -->
                <div class="relative w-24 h-24 flex items-center justify-center transform group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-yellow-500 rounded-full opacity-10 group-hover:opacity-20 blur-xl transition-opacity"></div>

                    <svg class="w-20 h-20 drop-shadow-2xl" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Outer Circle -->
                        <circle cx="24" cy="24" r="22" stroke="url(#logo-gradient-guest)" stroke-width="2" />

                        <!-- Hammer Handle -->
                        <path d="M14 28L24 18" stroke="url(#logo-gradient-guest)" stroke-width="3" stroke-linecap="round" />
                        <!-- Hammer Head -->
                        <path d="M20 16L22 14L28 20L26 22L20 16Z" fill="url(#logo-gradient-guest)" />
                        <path d="M18 18L19 19" stroke="url(#logo-gradient-guest)" stroke-width="1" />

                        <!-- Rising Graph Arrow -->
                        <path d="M28 24L32 20L38 20" stroke="url(#logo-gradient-guest)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M36 17L39 20L36 23" stroke="url(#logo-gradient-guest)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />

                        <!-- Dollar Sign -->
                        <text x="28" y="16" fill="url(#logo-gradient-guest)" font-family="sans-serif" font-weight="bold" font-size="8">$</text>

                        <!-- Nest/Basket Swooshes -->
                        <path d="M14 30C14 30 18 36 24 36C30 36 34 30 34 30" stroke="url(#logo-gradient-guest)" stroke-width="2" stroke-linecap="round" />
                        <path d="M16 28C16 28 20 32 24 32C28 32 32 28 32 28" stroke="url(#logo-gradient-guest)" stroke-width="1.5" stroke-linecap="round" />

                        <defs>
                            <linearGradient id="logo-gradient-guest" x1="0" y1="0" x2="48" y2="48" gradientUnits="userSpaceOnUse">
                                <stop offset="0.1" stop-color="#FCD34D" />
                                <stop offset="0.4" stop-color="#F59E0B" />
                                <stop offset="0.7" stop-color="#FCD34D" />
                                <stop offset="1.0" stop-color="#B45309" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="mt-6 flex flex-col items-center">
                    <span class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-yellow-500 to-yellow-600 tracking-tight leading-none filter drop-shadow-sm">BIDDING</span>
                    <span class="text-xs text-yellow-500 tracking-[0.4em] uppercase font-bold mt-2">Online Auctions</span>
                </div>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white/5 backdrop-blur-xl border border-white/10 shadow-2xl overflow-hidden sm:rounded-3xl relative z-10 transition-all hover:bg-white/[0.07] hover:border-white/20 hover:shadow-yellow-500/10">
            {{ $slot }}
        </div>

        <!-- Footer Links -->
        <div class="mt-8 text-center text-sm text-gray-500 relative z-10">
            <p>&copy; 2026 Bidding. Premium Auction Marketplace.</p>
        </div>
    </div>
</body>

</html>