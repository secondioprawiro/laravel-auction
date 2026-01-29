<?php

use App\Models\Item;
use App\Models\User;
use App\Services\PlaceBidService;
use Illuminate\Foundation\Testing\RefreshDatabase;

// Fitur ini mereset database setiap kali test selesai (agar bersih)
uses(RefreshDatabase::class);

test('user bisa melakukan bid yang valid', function () {
    // 1. Arrange (Siapkan Data)
    $service = new PlaceBidService();
    $user = User::factory()->create(); // Penawar
    $item = Item::factory()->create([ // Barang
        'start_price' => 100000,
        'current_price' => null,
    ]);

    // 2. Act (Lakukan Aksi)
    // User menawar 150.000 (Valid karena > 100.000)
    $bid = $service->placeBid($user, $item, 150000);

    // 3. Assert (Cek Hasil)
    // Pastikan bid tercatat di database
    expect($bid->amount)->toBe(150000.00);
    expect($bid->user_id)->toBe($user->id);
    
    // Pastikan harga barang di tabel items ikut naik
    expect($item->refresh()->current_price)->toEqual(150000.00);
});

test('user tidak bisa bid lebih rendah dari harga sekarang', function () {
    $service = new PlaceBidService();
    $user = User::factory()->create();
    $item = Item::factory()->create([
        'start_price' => 100000,
        'current_price' => 200000, // Harga sekarang sudah 200rb
    ]);

    // Harusnya Error karena nawar cuma 150rb
    $service->placeBid($user, $item, 150000);

})->throws(Exception::class, 'Tawaran harus lebih tinggi');

test('pemilik barang tidak boleh bid barang sendiri', function () {
    $service = new PlaceBidService();
    $owner = User::factory()->create();
    $item = Item::factory()->create([
        'user_id' => $owner->id, // Barang milik si owner
    ]);

    // Owner mencoba ngebid barangnya sendiri -> Harusnya Error
    $service->placeBid($owner, $item, 200000);

})->throws(Exception::class, 'Anda tidak bisa menawar barang sendiri');

test('tidak bisa bid di lelang yang sudah berakhir', function () {
    $service = new PlaceBidService();
    $user = User::factory()->create();
    $item = Item::factory()->create([
        'end_time' => now()->subMinute(), // Sudah lewat 1 menit yang lalu
    ]);

    $service->placeBid($user, $item, 200000);

})->throws(Exception::class, 'Waktu lelang sudah habis');