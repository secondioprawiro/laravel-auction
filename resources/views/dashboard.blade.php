@extends('layouts.app')

@section('title', 'My Dashboard - Bidding')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 space-y-8">

        <!-- Welcome Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-black text-white">My <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-600">Activity</span></h1>
                <p class="text-gray-400 mt-1">Manage your bids and watch your winnings.</p>
            </div>
            <button class="px-6 py-2 bg-white/5 border border-white/10 rounded-xl text-sm font-medium hover:bg-white/10 transition-colors">
                Wallet Settings
            </button>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Spent -->
            <div class="p-6 bg-gradient-to-br from-[#1A1A1A] to-black border border-white/10 rounded-2xl relative overflow-hidden group hover:border-yellow-500/30 transition-all">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-16 h-16 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                        <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="relative z-10">
                    <div class="text-sm text-gray-400 font-medium uppercase tracking-wider">Total Spent</div>
                    <div class="text-3xl font-bold text-white mt-2">{{ $stats['total_spent'] }}</div>
                    <div class="text-xs text-green-400 mt-2 flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        +12% from last month
                    </div>
                </div>
            </div>

            <!-- Active Bids -->
            <div class="p-6 bg-gradient-to-br from-[#1A1A1A] to-black border border-white/10 rounded-2xl relative overflow-hidden group hover:border-yellow-500/30 transition-all">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-16 h-16 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                </div>
                <div class="relative z-10">
                    <div class="text-sm text-gray-400 font-medium uppercase tracking-wider">Active Bids</div>
                    <div class="text-3xl font-bold text-white mt-2">{{ $stats['active_bids_count'] }}</div>
                    <div class="text-xs text-gray-500 mt-2">Currently participating</div>
                </div>
            </div>

            <!-- Won Auctions -->
            <div class="p-6 bg-gradient-to-br from-[#1A1A1A] to-black border border-white/10 rounded-2xl relative overflow-hidden group hover:border-yellow-500/30 transition-all">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-16 h-16 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="relative z-10">
                    <div class="text-sm text-gray-400 font-medium uppercase tracking-wider">Won Items</div>
                    <div class="text-3xl font-bold text-white mt-2">{{ $stats['won_count'] }}</div>
                    <div class="text-xs text-gray-500 mt-2">Lifetime winnings</div>
                </div>
            </div>
        </div>

        <!-- Active Bids Section -->
        <div class="space-y-6">
            <h2 class="text-xl font-bold text-white flex items-center">
                <span class="w-2 h-8 bg-yellow-500 rounded-full mr-3"></span>
                Current Active Bids
            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @forelse($activeBids as $bid)
                <div class="bg-gradient-to-br from-[#151515] to-[#0B0B0B] border hover:border-yellow-500/30 transition-all rounded-2xl p-4 flex gap-6 group {{ $bid->userBidStatus === 'winning' ? 'border-green-900/50' : 'border-red-900/50' }}">
                    <!-- Thumbnail -->
                    <div class="w-32 h-32 bg-white/5 rounded-xl flex-shrink-0 flex items-center justify-center overflow-hidden p-2">
                        <img src="{{ $bid->thumbnail }}" class="object-contain w-full h-full group-hover:scale-110 transition-transform duration-500">
                    </div>

                    <!-- Content -->
                    <div class="flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start">
                                <h3 class="text-lg font-bold text-white line-clamp-1">{{ $bid->title }}</h3>
                                <!-- Status Badge -->
                                @if($bid->userBidStatus === 'winning')
                                <span class="px-2 py-1 bg-green-500/10 border border-green-500/20 text-green-500 text-xs font-bold rounded-lg whitespace-nowrap">
                                    Winning
                                </span>
                                @else
                                <span class="px-2 py-1 bg-red-500/10 border border-red-500/20 text-red-500 text-xs font-bold rounded-lg whitespace-nowrap animate-pulse">
                                    Outbid ⚠️
                                </span>
                                @endif
                            </div>
                            <div class="text-xs text-gray-500 mt-1">Ends in {{ $bid->endTime }}</div>
                        </div>

                        <div class="flex items-end justify-between mt-4">
                            <div>
                                <div class="text-xs text-gray-500">Your Max Bid</div>
                                <div class="text-lg font-bold text-white">${{ number_format($bid->userMaxBid, 2) }}</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500 text-right">Current Price</div>
                                <div class="text-lg font-bold text-yellow-400">{{ $bid->formattedPrice }}</div>
                            </div>
                        </div>

                        @if($bid->userBidStatus === 'outbid')
                        <button class="mt-3 w-full py-2 bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white border border-red-500/30 rounded-lg text-sm font-bold transition-all uppercase">
                            Increase Bid
                        </button>
                        @else
                        <button class="mt-3 w-full py-2 bg-white/5 border border-white/10 rounded-lg text-gray-400 text-sm font-medium hover:bg-white/10 transition-colors">
                            View Details
                        </button>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-span-2 text-center py-12 bg-white/5 rounded-2xl border border-white/5">
                    <p class="text-gray-500">You don't have any active bids.</p>
                    <button class="mt-4 text-yellow-500 hover:underline">Start Exploring</button>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Won History Section -->
        <div class="pt-8 border-t border-white/10">
            <h2 class="text-xl font-bold text-white flex items-center mb-6">
                <span class="w-2 h-8 bg-green-500 rounded-full mr-3"></span>
                Recent Wins
            </h2>

            <div class="bg-[#111111] border border-white/5 rounded-2xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-white/5 text-gray-400 text-xs uppercase font-medium">
                            <tr>
                                <th class="px-6 py-4">Item</th>
                                <th class="px-6 py-4">Date Won</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4 text-right">Final Price</th>
                                <th class="px-6 py-4 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-sm text-gray-300">
                            @foreach($wonAuctions as $item)
                            <tr class="hover:bg-white/5 transition-colors">
                                <td class="px-6 py-4 flex items-center gap-4">
                                    <div class="w-10 h-10 bg-white/5 rounded-lg p-1 flex-shrink-0">
                                        <img src="{{ $item->thumbnail }}" class="w-full h-full object-contain">
                                    </div>
                                    <span class="font-medium text-white line-clamp-1 max-w-[200px]">{{ $item->title }}</span>
                                </td>
                                <td class="px-6 py-4">Feb 14, 2026</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-500/10 text-green-500 border border-green-500/20">
                                        Delivered
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right font-bold text-white">{{ $item->formattedPrice }}</td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-yellow-400 hover:text-yellow-300 text-xs font-bold uppercase">Invoice</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection