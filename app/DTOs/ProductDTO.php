<?php

namespace App\DTOs;

class ProductDTO
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public float $price,
        public float $rating,
        public string $thumbnail,
        public string $category,
        public int $stock,
        // Properti tambahan untuk UI logic
        public string $formattedPrice,
        public int $bidders,
        public string $endTime,
        public bool $isLive = false,
        public bool $isExclusive = false,
        // Properti untuk Dashboard User
        public ?string $userBidStatus = null,
        public ?float $userMaxBid = null
    ) {}

    /**
     * Factory method untuk membuat DTO dari response API DummyJSON
     */
    public static function fromApi(array $data): self
    {
        // Simulasi data untuk bidding system (karena API aslinya e-commerce biasa)
        $simulatedBidders = rand(100, 500);
        $simulatedEndTime = '2d 4h 12m'; // Static duration for demo

        return new self(
            id: $data['id'],
            title: $data['title'],
            description: $data['description'],
            price: (float) $data['price'],
            rating: (float) ($data['rating'] ?? 0),
            thumbnail: $data['thumbnail'],
            category: $data['category'],
            stock: $data['stock'],
            formattedPrice: '$' . number_format($data['price'], 2),
            bidders: $simulatedBidders,
            endTime: $simulatedEndTime,
            isLive: false, // Akan diset dinamis di service
            isExclusive: false // Akan diset dinamis di service
        );
    }
}
