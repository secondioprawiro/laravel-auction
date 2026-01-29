<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class AuctionList extends Component
{
    public function render()
    {
        // Ambil barang yang statusnya 'active', urutkan dari yang terbaru
        $items = Item::where('status', 'active')->latest()->get();

        return view('livewire.auction-list', [
            'items' => $items
        ]);
    }
}