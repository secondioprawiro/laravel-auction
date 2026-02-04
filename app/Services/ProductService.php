<?php

namespace App\Services;

use App\Adapters\DummyJsonAdapter;
use App\DTOs\ProductDTO;

class ProductService
{
    public function __construct(
        protected DummyJsonAdapter $adapter
    ) {}

    /**
     * Prepare data specifically for the Home Page UI
     */
    public function getHomePageData(): array
    {
        // Fetch enough products to cover featured + trending list
        // Requesting 4 items (1 featured + 3 trending grid)
        $products = $this->adapter->getProducts(4);

        if (empty($products)) {
            return [
                'featured' => null,
                'trending' => []
            ];
        }

        // --- Logic UI Enrichment ---

        // 1. Featured Data (Item pertama)
        $featured = $products[0];
        $featured->isLive = true;
        // Kita modifikasi sedikit deskripsi atau title untuk featured agar terlihat premium
        // (Opsional, tapi bagus untuk demo)

        // 2. Trending Data (Sisa item)
        $trending = array_slice($products, 1);

        // Decorate trending items with random badges for variety UI
        foreach ($trending as $index => $item) {
            // Logic random untuk demo visual
            $item->isExclusive = ($index % 2 === 0); // Item genap jadi exclusive
            $item->isLive = ($index % 2 !== 0);     // Item ganjil jadi live
        }

        return [
            'featuredProduct' => $featured,
            'trendingDrops' => $trending
        ];
    }

    /**
     * Get simulated data for User Dashboard
     */
    public function getUserDashboardData(): array
    {
        // Try fetch products from API
        $products = $this->adapter->getProducts(12);

        // FALLBACK: If API fails or returns empty, create Mock Data manually
        if (empty($products)) {
            // Kita buat object dummy ProductDTO secara manual untuk fallback
            $mockProduct = new \App\DTOs\ProductDTO(
                id: 1,
                title: 'Rolex Submariner (Simulation)',
                description: 'Fallback data when API is down',
                price: 12500,
                thumbnail: 'https://cdn.dummyjson.com/products/images/mens-watches/Rolex%20Submariner%20Watch/thumbnail.png',
                category: 'Luxury',
                rating: 4.8,
                stock: 5,
                formattedPrice: '$12,500',
                bidders: 42,
                endTime: '5h 30m',
                isLive: true,
                userBidStatus: 'outbid',
                userMaxBid: 12000
            );

            // Duplicate mock product for list
            $products = array_fill(0, 10, $mockProduct);
        }

        // Simulate Active Bids (Items 0-3)
        $activeBids = array_slice($products, 0, 4);
        foreach ($activeBids as $index => $item) {
            // Randomly assign status: Winning (Green) or Outbid (Red)
            $item->userBidStatus = ($index % 2 === 0) ? 'winning' : 'outbid';
            $item->userMaxBid = $item->price * 1.1;
            $item->endTime = '2h 15m';
        }

        // Simulate Won Auctions (Items 4-6)
        $wonAuctions = array_slice($products, 4, 3);

        // Simulate Watchlist (Items 7-10)
        $watchlist = array_slice($products, 7, 3);

        return [
            'stats' => [
                'total_spent' => '$12,450',
                'active_bids_count' => count($activeBids),
                'won_count' => count($wonAuctions) + 15, // Historical count
            ],
            'activeBids' => $activeBids,
            'wonAuctions' => $wonAuctions,
            'watchlist' => $watchlist
        ];
    }
}
