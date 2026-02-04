@extends('layouts.app')

@section('title', 'Bidding - Premium Auction Marketplace')

@section('content')

<!-- Hero Section - 16:9 Desktop Layout -->
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <!-- Background Gradient -->
    <div class="absolute inset-0 bg-gradient-to-r from-yellow-600/20 via-transparent to-transparent pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 w-full py-12">
        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <!-- Left Column - Text Content -->
            <div class="space-y-8 z-10 transition-all duration-700 ease-out transform translate-x-0">
                <div class="inline-block">
                    <span class="text-sm font-semibold text-yellow-400 tracking-wider uppercase">Hello, User!</span>
                </div>

                <div class="space-y-4">
                    <h1 class="text-6xl lg:text-7xl font-black leading-tight">
                        The Next Big<br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600">
                            Drop Is Here.
                        </span>
                    </h1>

                    <p class="text-xl text-gray-400 max-w-xl leading-relaxed">
                        Join the most exclusive bidding wars for premium collectibles.
                    </p>
                </div>

                <div class="flex items-center space-x-4">
                    <button class="px-8 py-4 bg-gradient-to-r from-yellow-400 to-yellow-600 text-black font-bold rounded-xl hover:shadow-2xl hover:shadow-yellow-500/50 transform hover:scale-105 transition-all duration-300">
                        Explore Auctions
                    </button>
                    <button class="px-8 py-4 bg-white/5 backdrop-blur-sm text-white font-semibold rounded-xl border border-white/10 hover:border-yellow-400/50 transition-all duration-300">
                        Learn More
                    </button>
                </div>

                <!-- Stats -->
                <div class="flex items-center space-x-8 pt-8">
                    <div>
                        <div class="text-3xl font-bold text-white">24K+</div>
                        <div class="text-sm text-gray-500">Active Bidders</div>
                    </div>
                    <div class="w-px h-12 bg-white/10"></div>
                    <div>
                        <div class="text-3xl font-bold text-white">1.2M+</div>
                        <div class="text-sm text-gray-500">Items Sold</div>
                    </div>
                    <div class="w-px h-12 bg-white/10"></div>
                    <div>
                        <div class="text-3xl font-bold text-yellow-400">$45M+</div>
                        <div class="text-sm text-gray-500">Total Volume</div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Featured Product Card -->
            <div class="relative z-10">
                @if($featuredProduct)
                <div class="relative bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-xl rounded-3xl border border-white/20 overflow-hidden shadow-2xl hover:shadow-yellow-500/20 transition-all duration-500 group">

                    <!-- Live Badge -->
                    <div class="absolute top-6 left-6 z-20">
                        <span class="px-4 py-2 bg-red-500 text-white text-xs font-bold rounded-full flex items-center space-x-2 animate-pulse">
                            <span class="w-2 h-2 bg-white rounded-full"></span>
                            <span>LIVE NOW</span>
                        </span>
                    </div>

                    <!-- Exclusive Badge -->
                    <div class="absolute top-6 right-6 z-20">
                        <span class="px-4 py-2 bg-yellow-400/20 backdrop-blur-sm text-yellow-400 text-xs font-bold rounded-full border border-yellow-400/30">
                            EXCLUSIVE ✨
                        </span>
                    </div>

                    <!-- Product Image -->
                    <div class="relative h-80 bg-gradient-to-br from-gray-900 to-black flex items-center justify-center overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>

                        <!-- Dynamic Image from Thumbnail -->
                        <div class="relative z-10 w-full h-full flex items-center justify-center transform group-hover:scale-110 transition-all duration-500">
                            <img src="{{ $featuredProduct->thumbnail }}" alt="{{ $featuredProduct->title }}" class="object-contain h-64 w-64 drop-shadow-2xl">
                        </div>

                        <!-- Timer Badge -->
                        <div class="absolute bottom-4 left-4 px-4 py-2 bg-black/60 backdrop-blur-md rounded-xl border border-white/10">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm font-bold text-white">{{ $featuredProduct->endTime }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="p-6 space-y-4">
                        <div>
                            <div class="text-xs text-gray-500 uppercase tracking-wider mb-1">{{ $featuredProduct->category }}</div>
                            <h3 class="text-2xl font-bold text-white leading-tight line-clamp-1">{{ $featuredProduct->title }}</h3>
                        </div>

                        <!-- Bid Info -->
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs text-gray-500 mb-1">Current Bid</div>
                                <div class="text-2xl font-bold text-yellow-400">{{ $featuredProduct->formattedPrice }}</div>
                            </div>
                            <div class="text-right">
                                <div class="text-xs text-gray-500 mb-1">Total Bids</div>
                                <div class="text-lg font-semibold text-white flex items-center justify-end space-x-1">
                                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                    </svg>
                                    <span>{{ $featuredProduct->bidders }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <button class="w-full py-4 bg-gradient-to-r from-yellow-400 to-yellow-600 text-black font-bold rounded-xl hover:shadow-2xl hover:shadow-yellow-500/50 transform hover:scale-[1.02] transition-all duration-300">
                            Place Bid Now
                        </button>

                        <!-- Quick Stats -->
                        <div class="flex items-center justify-between pt-4 border-t border-white/10">
                            <div class="flex items-center space-x-2 text-sm text-gray-400">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                </svg>
                                <span>{{ $featuredProduct->rating }} Rating</span>
                            </div>
                            <!-- Stock Removed -->
                        </div>
                    </div>
                </div>
                @else
                <!-- Fallback Loading State -->
                <div class="h-96 w-full rounded-3xl bg-white/5 animate-pulse flex items-center justify-center border border-white/10">
                    <span class="text-gray-500">Loading Featured Drop...</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Trending Drops Section -->
<section class="py-20 relative">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <!-- Section Header -->
        <div class="flex items-center justify-between mb-12">
            <div>
                <h2 class="text-5xl font-black">
                    Trending <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-600">Drops</span>
                </h2>
            </div>
            <a href="#" class="flex items-center space-x-2 text-gray-400 hover:text-yellow-400 transition-colors group">
                <span class="font-semibold">View All</span>
                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <!-- Products Grid - 3 Columns Desktop -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($trendingDrops as $drop)
            <!-- Dynamic Product Card -->
            <div class="group relative bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-xl rounded-2xl border border-white/10 overflow-hidden hover:border-yellow-400/50 transition-all duration-500 hover:shadow-2xl hover:shadow-yellow-500/20">

                <!-- Badges (Dynamic Logic) -->
                @if($drop->isExclusive)
                <div class="absolute top-4 left-4 z-10">
                    <span class="px-3 py-1 bg-purple-500/90 backdrop-blur-sm text-white text-xs font-bold rounded-full border border-white/10">
                        EXCLUSIVE ✨
                    </span>
                </div>
                @endif

                @if($drop->isLive)
                <div class="absolute top-4 right-4 z-10">
                    <span class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full flex items-center space-x-1 animate-pulse">
                        <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
                        <span>LIVE NOW</span>
                    </span>
                </div>
                @endif

                <!-- Image -->
                <div class="relative h-64 bg-gradient-to-br from-gray-800 to-gray-900 flex items-center justify-center overflow-hidden p-6">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="relative transform group-hover:scale-110 group-hover:rotate-0 transition-all duration-500 w-full h-full flex items-center justify-center">
                        <!-- Using img tag instead of svg for real data -->
                        <img src="{{ $drop->thumbnail }}" alt="{{ $drop->title }}" class="object-contain max-h-full max-w-full drop-shadow-xl">
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6 space-y-4">
                    <div>
                        <div class="text-xs text-gray-500 uppercase tracking-wider mb-1">{{ $drop->category }}</div>
                        <h3 class="text-xl font-bold text-white line-clamp-1" title="{{ $drop->title }}">{{ $drop->title }}</h3>
                    </div>

                    <!-- Bid Stats -->
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center space-x-1 text-gray-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                            </svg>
                            <span>{{ $drop->bidders }}</span>
                        </div>
                        <div class="flex items-center space-x-1 text-gray-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                            </svg>
                            <span>{{ $drop->endTime }}</span>
                        </div>
                        <!-- Rating as extra stat -->
                        <div class="flex items-center space-x-1 text-gray-400">
                            <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span>{{ $drop->rating }}</span>
                        </div>
                    </div>

                    <!-- Price & Action -->
                    <div class="flex items-center justify-between pt-4 border-t border-white/10">
                        <div>
                            <div class="text-xs text-gray-500">Current Bid</div>
                            <div class="text-xl font-bold text-yellow-400">{{ $drop->formattedPrice }}</div>
                        </div>
                        <button class="px-6 py-3 bg-gradient-to-r from-yellow-400 to-yellow-600 text-black font-bold rounded-xl hover:shadow-xl hover:shadow-yellow-500/50 transform hover:scale-105 transition-all duration-300 text-sm whitespace-nowrap">
                            Place Bid
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12 text-gray-500">
                <p>No trending drops available at the moment.</p>
            </div>
            @endforelse

        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-yellow-600/10 via-yellow-500/5 to-transparent pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="relative bg-gradient-to-br from-yellow-400/10 to-yellow-600/5 backdrop-blur-xl rounded-3xl border border-yellow-400/20 p-12 lg:p-16 overflow-hidden">

            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-5">
                <div class="absolute top-0 left-0 w-64 h-64 bg-yellow-400 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-600 rounded-full blur-3xl"></div>
            </div>

            <div class="relative z-10 text-center space-y-6">
                <h2 class="text-5xl lg:text-6xl font-black">
                    Ready to Start <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-600">Bidding?</span>
                </h2>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                    Join thousands of collectors and enthusiasts. Discover exclusive drops and rare items.
                </p>
                <div class="flex items-center justify-center space-x-4 pt-4">
                    <button class="px-8 py-4 bg-gradient-to-r from-yellow-400 to-yellow-600 text-black font-bold rounded-xl hover:shadow-2xl hover:shadow-yellow-500/50 transform hover:scale-105 transition-all duration-300">
                        Get Started Now
                    </button>
                    <button class="px-8 py-4 bg-white/5 backdrop-blur-sm text-white font-semibold rounded-xl border border-white/10 hover:border-yellow-400/50 transition-all duration-300">
                        Learn How It Works
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection