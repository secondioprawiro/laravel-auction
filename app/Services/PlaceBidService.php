<?php

namespace App\Services;

use App\Events\BidPlaced;
use App\Models\Bid;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Exception;

class PlaceBidService
{
    public function placeBid(User $bidder, Item $item, float $amount)
    {
        // 1. Mulai Transaksi Database (Semua sukses atau batal semua)
        return DB::transaction(function () use ($bidder, $item, $amount) {
            
            // 2. KUNCI DATA BARANG (Pessimistic Locking)
            // Sistem akan "menahan" baris data ini. User lain harus antre 
            // sampai proses bid user ini selesai.
            $item = Item::where('id', $item->id)->lockForUpdate()->first();

            // Cek 1: Apakah lelang aktif?
            if ($item->status !== 'active') {
                throw new Exception("Lelang sedang tidak aktif.");
            }

            // Cek 2: Apakah waktu sudah habis?
            if (now()->greaterThan($item->end_time)) {
                throw new Exception("Waktu lelang sudah habis.");
            }

            // Cek 3: Apakah harga tawaran lebih tinggi dari harga sekarang?
            $currentPrice = $item->current_price ?? $item->start_price;
            
            if ($amount <= $currentPrice) {
                throw new Exception("Tawaran harus lebih tinggi dari Rp " . number_format($currentPrice));
            }

            // Cek 4: Pemilik barang tidak boleh ngebid barang sendiri
            if ($item->user_id === $bidder->id) {
                throw new Exception("Anda tidak bisa menawar barang sendiri.");
            }

            // 3. Catat Tawaran Baru
            $bid = Bid::create([
                'user_id' => $bidder->id,
                'item_id' => $item->id,
                'amount' => $amount,
            ]);

            // 4. Update Harga Barang
            $item->update([
                'current_price' => $amount,
                'end_time' => now()->diffInSeconds($item->end_time) < 60 ? $item->end_time->addMinutes(5) : $item->end_time,
            ]);

            BidPlaced::dispatch($bid);

            return $bid;
        });
    }
}