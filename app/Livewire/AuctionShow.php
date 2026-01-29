<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Services\PlaceBidService;
use Livewire\Component;
use Livewire\Attributes\Layout;
class AuctionShow extends Component
{
    public Item $item;
    public $amount;

    public function mount(Item $item)
    {
        $this->item = $item;
    }

    // Fungsi ini dipanggil saat tombol "Tawar" diklik
    public function placeBid(PlaceBidService $service)
    {
        // Validasi dasar input
        $this->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        try {
            $service->placeBid(Auth::user(), $this->item, $this->amount);

            session()->flash('message', 'Tawaran berhasil! Anda memimpin sekarang. 👑');

            return $this->redirect(route('dashboard'), navigate: true);

        } catch (\Exception $e) {
            $this->addError('amount', $e->getMessage());
        }
    }

    public function getListeners()
    {
        return [
            "echo:item.{$this->item->id},BidPlaced" => 'updateAuctionData',
        ];
    }

    public function updateAuctionData($event)
    {
        $this->item->refresh();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.auction-show');
    }
}