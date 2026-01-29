<?php

namespace App\Events;

use App\Models\Bid;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BidPlaced implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Data publik ini akan otomatis terkirim ke Javascript (Frontend)
     */
    public $itemId;
    public $amount;
    public $userId;
    public $newPriceFormatted;

    /**
     * Create a new event instance.
     */
    public function __construct(Bid $bid)
    {
        $this->itemId = $bid->item_id;
        $this->amount = $bid->amount;
        $this->userId = $bid->user_id;
        
        // Kita format harganya sekalian biar Frontend tinggal tampilkan
        $this->newPriceFormatted = 'Rp ' . number_format($bid->amount, 0, ',', '.');
    }

    /**
     * Tentukan di channel mana event ini disiarkan.
     * Contoh: 'item.1', 'item.5'
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('item.' . $this->itemId),
        ];
    }
}