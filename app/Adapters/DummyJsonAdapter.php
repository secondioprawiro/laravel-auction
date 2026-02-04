<?php

namespace App\Adapters;

use App\DTOs\ProductDTO;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DummyJsonAdapter
{
    private const BASE_URL = 'https://dummyjson.com';

    /**
     * Get products from external API
     * 
     * @param int $limit
     * @return array<ProductDTO>
     */
    public function getProducts(int $limit = 10): array
    {
        try {
            $response = Http::get(self::BASE_URL . '/products', [
                'limit' => $limit,
                'select' => 'id,title,description,price,rating,thumbnail,category,stock'
            ]);

            if ($response->successful()) {
                $data = $response->json('products');

                return array_map(function ($item) {
                    return ProductDTO::fromApi($item);
                }, $data);
            }

            Log::error('Failed to fetch products from DummyJSON: ' . $response->status());
            return [];
        } catch (\Exception $e) {
            Log::error('Exception in DummyJsonAdapter: ' . $e->getMessage());
            return [];
        }
    }
}
